/**
 * Nusantara Stay — small front-end enhancements.
 * Everything here is optional: without JavaScript the page still shows
 * the first slide, every menu section and the opening hours as written.
 */
( function () {
	'use strict';

	var reduceMotion = window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	/* ---------------------------------------------------------------
	 * Sticky header: slims down and turns solid after scrolling
	 * ------------------------------------------------------------- */
	function initHeader() {
		var headers = document.querySelectorAll( '.nusantara-stay-header--sticky, .nusantara-stay-header--overlay' );
		if ( ! headers.length ) return;
		var ticking = false;
		function update() {
			var scrolled = window.scrollY > 40;
			headers.forEach( function ( h ) { h.classList.toggle( 'is-scrolled', scrolled ); } );
			ticking = false;
		}
		window.addEventListener( 'scroll', function () {
			if ( ! ticking ) { window.requestAnimationFrame( update ); ticking = true; }
		}, { passive: true } );
		update();
	}

	function t( key, fallback ) {
		var s = window.nusantaraStay && window.nusantaraStay.i18n && window.nusantaraStay.i18n[ key ];
		return s || fallback;
	}

	/* ---------------------------------------------------------------
	 * Menu panel: the "Menu" link opens a split-screen panel (dialog).
	 * Works without JavaScript too (the link jumps to #nusantara-stay-menu).
	 * ------------------------------------------------------------- */
	function initMenuPanel() {
		var panel = document.querySelector( '.nusantara-stay-menu-panel' );
		if ( ! panel ) return;
		if ( ! panel.id ) panel.id = 'nusantara-stay-menu';
		var toggles = Array.prototype.slice.call( document.querySelectorAll( 'a.nusantara-stay-menu-toggle' ) );
		var closers = Array.prototype.slice.call( panel.querySelectorAll( 'a.nusantara-stay-menu-close' ) );
		var opener = null, closeTimer = null;
		panel.setAttribute( 'role', 'dialog' );
		panel.setAttribute( 'aria-modal', 'true' );
		panel.setAttribute( 'aria-label', t( 'explore', 'Explore' ) );
		panel.setAttribute( 'tabindex', '-1' );

		function focusables() {
			return Array.prototype.filter.call( panel.querySelectorAll( 'a[href], button:not([disabled]), [tabindex="0"]' ), function ( el ) {
				return el.offsetWidth || el.offsetHeight || el.getClientRects().length;
			} );
		}
		function setExpanded( v ) { toggles.forEach( function ( a ) { a.setAttribute( 'aria-expanded', v ? 'true' : 'false' ); } ); }
		function open( from ) {
			window.clearTimeout( closeTimer );
			opener = from || null;
			panel.classList.add( 'is-open' );
			document.documentElement.classList.add( 'nusantara-stay-menu-open' );
			setExpanded( true );
			window.requestAnimationFrame( function () {
				window.requestAnimationFrame( function () {
					panel.classList.add( 'is-visible' );
					window.dispatchEvent( new Event( 'resize' ) );
					panel.focus( { preventScroll: true } );
				} );
			} );
		}
		function close( restoreFocus ) {
			panel.classList.remove( 'is-visible' );
			document.documentElement.classList.remove( 'nusantara-stay-menu-open' );
			setExpanded( false );
			closeTimer = window.setTimeout( function () { panel.classList.remove( 'is-open' ); }, reduceMotion ? 0 : 400 );
			if ( window.location.hash === '#' + panel.id && window.history.replaceState ) {
				window.history.replaceState( null, '', window.location.pathname + window.location.search );
			}
			if ( restoreFocus !== false && opener ) {
				// Back on the Menu button. After a tap or click, hide the focus frame (Safari shows it on returned focus);
				// keyboard users keep it.
				if ( ! usedKeyboard ) {
					opener.classList.add( 'nusantara-stay-quiet-focus' );
					opener.addEventListener( 'blur', function quiet() { opener.classList.remove( 'nusantara-stay-quiet-focus' ); opener.removeEventListener( 'blur', quiet ); } );
				}
				opener.focus( { preventScroll: true, focusVisible: usedKeyboard } );
			}
		}
		var usedKeyboard = false;
		document.addEventListener( 'pointerdown', function () { usedKeyboard = false; }, true );
		document.addEventListener( 'keydown', function ( e ) { if ( e.key === 'Tab' || e.key === 'Enter' || e.key === ' ' || e.key === 'Escape' ) usedKeyboard = true; }, true );
		toggles.forEach( function ( a ) {
			a.setAttribute( 'role', 'button' );
			a.setAttribute( 'aria-controls', panel.id );
			a.setAttribute( 'aria-expanded', 'false' );
			a.setAttribute( 'aria-haspopup', 'dialog' );
			a.addEventListener( 'click', function ( e ) { e.preventDefault(); open( a ); } );
			a.addEventListener( 'keydown', function ( e ) { if ( e.key === ' ' ) { e.preventDefault(); open( a ); } } );
		} );
		closers.forEach( function ( a ) {
			a.setAttribute( 'role', 'button' );
			a.setAttribute( 'aria-label', t( 'closeMenu', 'Close menu' ) );
			a.addEventListener( 'click', function ( e ) { e.preventDefault(); close(); } );
			a.addEventListener( 'keydown', function ( e ) { if ( e.key === ' ' ) { e.preventDefault(); close(); } } );
		} );
		// A link to a section of this page closes the panel, then the page scrolls there.
		panel.addEventListener( 'click', function ( e ) {
			var a = e.target.closest && e.target.closest( 'a[href]' );
			if ( ! a || a.classList.contains( 'nusantara-stay-menu-close' ) ) return;
			var href = a.getAttribute( 'href' );
			if ( href.charAt( 0 ) === '#' && href.length > 1 ) close( false );
		} );
		document.addEventListener( 'keydown', function ( e ) {
			if ( ! panel.classList.contains( 'is-open' ) ) return;
			if ( e.key === 'Escape' ) { e.preventDefault(); close(); return; }
			if ( e.key !== 'Tab' ) return;
			var f = focusables();
			if ( ! f.length ) return;
			var first = f[ 0 ], last = f[ f.length - 1 ];
			if ( e.shiftKey && ( document.activeElement === first || document.activeElement === panel ) ) { e.preventDefault(); last.focus(); }
			else if ( ! e.shiftKey && document.activeElement === last ) { e.preventDefault(); first.focus(); }
		} );
		if ( window.location.hash === '#' + panel.id ) open( null );
	}

	/* Back to top: a small button that appears after one screen of scrolling. */
	function initToTop() {
		if ( ! window.nusantaraStay || ! window.nusantaraStay.totop ) return;
		var label = ( window.nusantaraStay.i18n && window.nusantaraStay.i18n.toTop ) || 'Back to top';
		var btn = document.createElement( 'button' );
		btn.type = 'button';
		btn.className = 'nusantara-stay-totop';
		btn.setAttribute( 'aria-label', label );
		btn.innerHTML = '<svg width="16" height="16" viewBox="0 0 16 16" aria-hidden="true" focusable="false"><path d="M8 13V3M3.5 7.5 8 3l4.5 4.5" fill="none" stroke="currentColor" stroke-width="1.4"/></svg>';
		document.body.appendChild( btn );
		btn.innerHTML = '<svg width="18" height="18" viewBox="0 0 18 18" aria-hidden="true" focusable="false"><path d="M4 11.5 9 6.5l5 5" fill="none" stroke="currentColor" stroke-width="1.3"/></svg>';
		// 3.15: shown once the visitor is past the first screen.
		var ticking = false;
		function update() {
			ticking = false;
			btn.classList.toggle( 'is-visible', window.scrollY > window.innerHeight );
		}
		window.addEventListener( 'scroll', function () { if ( ! ticking ) { ticking = true; window.requestAnimationFrame( update ); } }, { passive: true } );
		update();
		btn.addEventListener( 'click', function ( e ) {
			window.scrollTo( { top: 0, behavior: reduceMotion ? 'auto' : 'smooth' } );
			var target = document.querySelector( 'header .wp-block-site-title a' ) || document.querySelector( '.wp-site-blocks a, .wp-site-blocks button' );
			if ( ! target ) return;
			// 3.22.1 Focus moves to the top for keyboard users; after a tap or click the mark shows no ring.
			var tapped = e.detail > 0;
			if ( tapped ) {
				target.classList.add( 'nusantara-stay-quiet-focus' );
				target.addEventListener( 'blur', function quiet() { target.classList.remove( 'nusantara-stay-quiet-focus' ); target.removeEventListener( 'blur', quiet ); } );
			}
			target.focus( { preventScroll: true, focusVisible: ! tapped } );
		} );
	}

	function initMotion() {
		var body = document.body;
		if ( reduceMotion || ! body.classList.contains( 'nusantara-stay-motion' ) ) {
			body.classList.remove( 'nusantara-stay-motion' );
			return;
		}
		var fold = window.innerHeight;
		function belowFold( el ) { return el.getBoundingClientRect().top > fold * 0.92; }
		function inside( el, sel ) { return !! ( el.parentElement && el.parentElement.closest( sel ) ); }

		// 1. Image reveals
		var masks = Array.prototype.filter.call(
			document.querySelectorAll( 'main .wp-block-image.is-style-nusantara-stay-corner, main .wp-block-cover.is-style-nusantara-stay-corner' ),
			function ( el ) { return ! el.closest( '.nusantara-stay-slider' ); }
		);

		// 2. Rises (containers win over their children)
		var riseSel = 'main h2, main h3, main .wp-block-column > p, main .wp-block-buttons, main .nusantara-stay-chips, main .wp-block-quote, ' +
			'main .nusantara-stay-open-status, main .nusantara-stay-menu__nav, main .nusantara-stay-menu__panels, main .nusantara-stay-reserve__content, main .nusantara-stay-parallax p, footer .nusantara-stay-wordmark';
		var rises = Array.prototype.filter.call( document.querySelectorAll( riseSel ), function ( el ) {
			if ( el.closest( '.nusantara-stay-slider' ) ) return false;
			if ( el.closest( '.wp-block-cover' ) && ! el.closest( '.nusantara-stay-parallax' ) ) return false;
			if ( el.classList.contains( 'nusantara-stay-statement' ) ) return false;
			if ( el.parentElement && el.parentElement.classList.contains( 'wp-block-post-content' ) ) return false; // 5.4.8 plain text pages (privacy, terms, stories) never wait to appear
			if ( el.closest( '.wp-block-post-template, .nusantara-stay-card2, .nusantara-stay-drawer, .nusantara-stay-incl__item, .nusantara-stay-mcard' ) ) return false; // 3.15.2 card titles stay with their photo and date
			return true;
		} );
		var set = new Set( rises );
		rises = rises.filter( function ( el ) {
			for ( var a = el.parentElement; a; a = a.parentElement ) { if ( set.has( a ) ) return false; }
			return true;
		} );

		// Stagger: column position plus order inside the column, capped
		function stagger( el, list ) {
			var col = el.closest( '.wp-block-column' );
			var i = 0;
			if ( col && col.parentElement ) i += Array.prototype.indexOf.call( col.parentElement.children, col );
			var scope = col || el.parentElement;
			list.forEach( function ( other ) { if ( other !== el && scope.contains( other ) && ( other.compareDocumentPosition( el ) & 4 ) ) i++; } );
			el.style.setProperty( '--nusantara-stay-i', Math.min( i, 5 ) );
		}

		var io = new IntersectionObserver( function ( entries ) {
			entries.forEach( function ( e ) {
				if ( ! e.isIntersecting ) return;
				e.target.classList.add( 'is-in' );
				io.unobserve( e.target );
			} );
		}, { rootMargin: '0px 0px -10% 0px', threshold: 0.12 } );

		masks.forEach( function ( el ) {
			if ( belowFold( el ) ) { stagger( el, masks ); el.classList.add( 'nusantara-stay-mask' ); io.observe( el ); } else { el.classList.add( 'is-in' ); }
		} );
		rises.forEach( function ( el ) {
			if ( belowFold( el ) ) { stagger( el, rises ); el.classList.add( 'nusantara-stay-rise' ); io.observe( el ); }
		} );

		// 3. Statement words
		var statements = document.querySelectorAll( 'main p.nusantara-stay-statement' );
		var words = [];
		statements.forEach( function ( p ) {
			var walker = document.createTreeWalker( p, NodeFilter.SHOW_TEXT, null );
			var nodes = [], n;
			while ( ( n = walker.nextNode() ) ) nodes.push( n );
			var mine = [];
			nodes.forEach( function ( node ) {
				var frag = document.createDocumentFragment();
				node.nodeValue.split( /(\s+)/ ).forEach( function ( part ) {
					if ( ! part ) return;
					if ( /^\s+$/.test( part ) ) { frag.appendChild( document.createTextNode( part ) ); return; }
					var span = document.createElement( 'span' );
					span.className = 'nusantara-stay-w';
					span.textContent = part;
					frag.appendChild( span );
					mine.push( span );
				} );
				node.parentNode.replaceChild( frag, node );
			} );
			words.push( { el: p, spans: mine } );
		} );

		// 4. Parallax
		var layers = Array.prototype.slice.call( document.querySelectorAll( 'main .nusantara-stay-parallax' ) );

		var ticking = false;
		function frame() {
			ticking = false;
			var vh = window.innerHeight;
			layers.forEach( function ( el ) {
				var r = el.getBoundingClientRect();
				if ( r.bottom < -200 || r.top > vh + 200 ) return;
				var strength = Math.min( 70, r.height * 0.1 );
				var p = ( r.top + r.height / 2 - vh / 2 ) / ( vh / 2 + r.height / 2 );
				el.style.setProperty( '--nusantara-stay-py', ( p * strength ).toFixed( 1 ) + 'px' );
			} );
			words.forEach( function ( w ) {
				var r = w.el.getBoundingClientRect();
				var progress = Math.max( 0, Math.min( 1, ( vh * 0.85 - r.top ) / ( r.height + vh * 0.3 ) ) );
				var on = Math.round( progress * w.spans.length );
				w.spans.forEach( function ( s, i ) { s.classList.toggle( 'is-on', i < on ); } );
			} );
		}
		function request() { if ( ! ticking ) { ticking = true; window.requestAnimationFrame( frame ); } }
		window.addEventListener( 'scroll', request, { passive: true } );
		window.addEventListener( 'resize', request, { passive: true } );
		frame();
	}

	/* ---------------------------------------------------------------
	 * 3.13.0 Floating Book button: the header's Book button, centred at
	 * the bottom after the first screen; hidden at the booking section
	 * and the footer. Off with Settings › Reading or body.nusantara-stay-no-float.
	 * ------------------------------------------------------------- */
	function initFloatBook() {
		if ( document.body.classList.contains( 'nusantara-stay-no-float' ) || document.body.classList.contains( 'editor-styles-wrapper' ) ) return;
		var src = document.querySelector( '.nusantara-stay-header .nusantara-stay-book .wp-block-button__link' );
		if ( ! src || ! ( 'IntersectionObserver' in window ) ) return;
		var a = document.createElement( 'a' );
		a.className = 'nusantara-stay-float-book';
		a.href = src.getAttribute( 'href' );
		a.textContent = src.textContent.trim();
		a.setAttribute( 'tabindex', '-1' );
		a.setAttribute( 'aria-hidden', 'true' );
		document.body.appendChild( a );
		var past = false, hidden = 0;
		function update() {
			var on = past && hidden === 0;
			a.classList.toggle( 'is-on', on );
			a.setAttribute( 'tabindex', on ? '0' : '-1' );
			a.setAttribute( 'aria-hidden', on ? 'false' : 'true' );
		}
		function onScroll() {
			var now = window.scrollY > window.innerHeight * 0.7;
			if ( now !== past ) { past = now; update(); }
		}
		window.addEventListener( 'scroll', onScroll, { passive: true } );
		onScroll();
		var stops = document.querySelectorAll( '#reserve, .nusantara-stay-moment, footer.wp-block-template-part, .wp-site-blocks > footer' );
		var seen = new Set();
		var io = new IntersectionObserver( function ( es ) {
			es.forEach( function ( e ) { if ( e.isIntersecting ) seen.add( e.target ); else seen.delete( e.target ); } );
			hidden = seen.size;
			update();
		}, { threshold: 0.15 } );
		stops.forEach( function ( el ) { io.observe( el ); } );
	}


	/* ---------------------------------------------------------------
	 * 3.15 The calm edition: Book (a table or a room), the full menu
	 * panel, card dashes, the room gallery, the wide photo's drift,
	 * and the page you are on in the Explore panel.
	 * ------------------------------------------------------------- */
	function initCalm() {
		if ( document.body.classList.contains( 'editor-styles-wrapper' ) ) return;
		var data = window.nusantaraStay || {};
		var lang = ( document.documentElement.lang || 'en' ).slice( 0, 2 );
		calmCarte();
		calmCards();
		calmBleed();
		calmCurrent();
	}
	/* 4.2.7 The menu on the page: a Food | Drinks switch; "#menu-food" and "#menu-drinks" links pick the part and scroll to it. */
	function calmCarte() {
		var carte = document.querySelector( '.nusantara-stay-carte' );
		if ( ! carte ) return;
		var parts = Array.prototype.slice.call( carte.querySelectorAll( '.nusantara-stay-carte__part' ) );
		if ( parts.length < 2 ) return;
		var head = carte.querySelector( '.nusantara-stay-carte__head' ) || parts[ 0 ];
		var bar = document.createElement( 'div' );
		bar.className = 'nusantara-stay-carte__tabs';
		bar.setAttribute( 'role', 'tablist' );
		var tabs = parts.map( function ( part, i ) {
			var label = part.querySelector( '.nusantara-stay-carte__tab' );
			var b = document.createElement( 'button' );
			b.type = 'button';
			b.setAttribute( 'role', 'tab' );
			b.textContent = label ? label.textContent.trim() : String( i + 1 );
			if ( ! part.id ) part.id = 'nusantara-stay-carte-' + i;
			b.id = part.id + '-tab';
			b.setAttribute( 'aria-controls', part.id );
			part.setAttribute( 'role', 'tabpanel' );
			part.setAttribute( 'aria-labelledby', b.id );
			b.addEventListener( 'click', function () { show( i ); } );
			b.addEventListener( 'keydown', function ( e ) {
				if ( e.key === 'ArrowRight' || e.key === 'ArrowLeft' ) { e.preventDefault(); var n = ( i + ( e.key === 'ArrowRight' ? 1 : parts.length - 1 ) ) % parts.length; show( n ); tabs[ n ].focus(); }
			} );
			bar.appendChild( b );
			return b;
		} );
		head.appendChild( bar );
		carte.classList.add( 'is-ready' );
		function show( i ) {
			parts.forEach( function ( p, j ) { p.classList.toggle( 'is-on', j === i ); } );
			tabs.forEach( function ( b, j ) { b.setAttribute( 'aria-selected', j === i ? 'true' : 'false' ); b.tabIndex = j === i ? 0 : -1; } );
		}
		var ids = parts.map( function ( p ) { return p.id; } );
		function go( i ) {
			show( i );
			carte.scrollIntoView( { behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' } );
		}
		document.addEventListener( 'click', function ( e ) {
			var a = e.target.closest && e.target.closest( 'a[href^="#"]' );
			if ( ! a ) return;
			var i = ids.indexOf( a.getAttribute( 'href' ).slice( 1 ) );
			if ( i === -1 ) return;
			e.preventDefault();
			go( i );
		} );
		var h = window.location.hash.slice( 1 );
		var start = ids.indexOf( h );
		show( Math.max( 0, start ) );
		if ( start !== -1 ) window.setTimeout( function () { go( start ); }, 60 );
	}

	function calmCards() {
		document.querySelectorAll( '.nusantara-stay-cards:not(.nusantara-stay-cards--grid) .nusantara-stay-cards__track' ).forEach( function ( track ) {
			var cards = Array.prototype.slice.call( track.children );
			if ( cards.length < 2 ) return;
			var dots = document.createElement( 'div' );
			dots.className = 'nusantara-stay-cards__dots';
			var btns = cards.map( function ( c, i ) {
				var b = document.createElement( 'button' );
				b.type = 'button';
				var h = c.querySelector( 'h3' );
				b.setAttribute( 'aria-label', ( h ? h.textContent.trim() : '' ) + ' (' + ( i + 1 ) + ' / ' + cards.length + ')' );
				b.addEventListener( 'click', function () {
					track.scrollTo( { left: c.offsetLeft - cards[ 0 ].offsetLeft, behavior: reduceMotion ? 'auto' : 'smooth' } );
				} );
				dots.appendChild( b );
				return b;
			} );
			track.after( dots );
			function update() {
				var room = track.scrollWidth - track.clientWidth;
				dots.hidden = room < 4;
				var step = cards[ 1 ].offsetLeft - cards[ 0 ].offsetLeft || 1;
				// One dot per place the strip can stop, not per card.
				var stops = Math.max( 1, Math.min( cards.length, Math.ceil( ( room - 4 ) / step ) + 1 ) );
				var on = room > 0 && track.scrollLeft >= room - 4 ? stops - 1 : Math.min( stops - 1, Math.round( track.scrollLeft / step ) );
				btns.forEach( function ( b, i ) { b.hidden = i >= stops; b.classList.toggle( 'is-on', i === on ); } );
			}
			var tick = false;
			track.addEventListener( 'scroll', function () { if ( ! tick ) { tick = true; window.requestAnimationFrame( function () { tick = false; update(); } ); } }, { passive: true } );
			window.addEventListener( 'resize', update );
			update();
		} );
	}

	function calmBleed() {
		if ( reduceMotion ) return;
		var els = Array.prototype.slice.call( document.querySelectorAll( '.nusantara-stay-bleed' ) );
		if ( ! els.length ) return;
		var tick = false;
		function update() {
			tick = false;
			var vh = window.innerHeight;
			els.forEach( function ( el ) {
				var r = el.getBoundingClientRect();
				if ( r.bottom < 0 || r.top > vh ) return;
				var p = Math.min( 1, Math.max( 0, ( vh - r.top ) / ( vh + r.height ) ) );
				el.style.setProperty( '--nusantara-stay-py', ( -16 * p ).toFixed( 2 ) + '%' );
			} );
		}
		window.addEventListener( 'scroll', function () { if ( ! tick ) { tick = true; window.requestAnimationFrame( update ); } }, { passive: true } );
		window.addEventListener( 'resize', update );
		update();
	}

	function calmCurrent() {
		var here = window.location.pathname.replace( /\/+$/, '' );
		document.querySelectorAll( '.nusantara-stay-menu-panel .wp-block-navigation-item__content[href]' ).forEach( function ( a ) {
			var href = a.getAttribute( 'href' );
			if ( ! href || href.charAt( 0 ) === '#' ) return;
			var u;
			try { u = new URL( href, window.location.href ); } catch ( e ) { return; }
			if ( u.origin === window.location.origin && ! u.hash && u.pathname.replace( /\/+$/, '' ) === here ) a.setAttribute( 'aria-current', 'page' );
		} );
	}


	function initDropdowns() {
		var fine = window.matchMedia( '(hover: hover) and (pointer: fine)' );
		document.querySelectorAll( '.nusantara-stay-dd' ).forEach( function ( dd ) {
			var top = dd.querySelector( '.nusantara-stay-dd__top' ), panel = dd.querySelector( '.nusantara-stay-dd__panel' ), t;
			if ( ! top || ! panel ) return;
			function set( v ) { dd.classList.toggle( 'is-open', v ); top.setAttribute( 'aria-expanded', v ? 'true' : 'false' ); }
			dd.addEventListener( 'mouseenter', function () { if ( ! fine.matches ) return; window.clearTimeout( t ); set( true ); } );
			dd.addEventListener( 'mouseleave', function () { if ( ! fine.matches ) return; t = window.setTimeout( function () { set( false ); }, 220 ); } );
			top.addEventListener( 'click', function ( e ) {
				if ( fine.matches && dd.classList.contains( 'is-open' ) && e.detail ) return; // a mouse click on an open menu goes to the page
				if ( ! dd.classList.contains( 'is-open' ) ) { e.preventDefault(); set( true ); }
			} );
			top.addEventListener( 'keydown', function ( e ) { if ( e.key === 'ArrowDown' ) { e.preventDefault(); set( true ); panel.querySelector( 'a' ).focus(); } } );
			panel.addEventListener( 'keydown', function ( e ) {
				var l = [].slice.call( panel.querySelectorAll( 'a' ) ), i = l.indexOf( document.activeElement );
				if ( e.key === 'ArrowDown' ) { e.preventDefault(); l[ ( i + 1 ) % l.length ].focus(); }
				if ( e.key === 'ArrowUp' ) { e.preventDefault(); if ( i <= 0 ) top.focus(); else l[ i - 1 ].focus(); }
			} );
			dd.addEventListener( 'focusout', function ( e ) { if ( ! dd.contains( e.relatedTarget ) ) set( false ); } );
			document.addEventListener( 'keydown', function ( e ) { if ( e.key === 'Escape' && dd.classList.contains( 'is-open' ) ) { set( false ); top.focus(); } } );
			document.addEventListener( 'click', function ( e ) { if ( ! dd.contains( e.target ) ) set( false ); } );
		} );
		document.addEventListener( 'click', function ( e ) {
			var b = e.target.closest && e.target.closest( '.nusantara-stay-menu-panel .wp-block-navigation-submenu > .wp-block-navigation__submenu-icon' );
			if ( ! b ) return;
			e.preventDefault(); e.stopPropagation();
			var li = b.parentNode, v = ! li.classList.contains( 'is-open' );
			li.classList.toggle( 'is-open', v );
			b.setAttribute( 'aria-expanded', v ? 'true' : 'false' );
		}, true );
	}

	function ready( fn ) {
		if ( document.readyState !== 'loading' ) fn(); else document.addEventListener( 'DOMContentLoaded', fn );
	}

	ready( function () {
		initHeader();
		initMenuPanel();
		initToTop();
		initMotion();
		initFloatBook();
		initCalm();
		initDropdowns();
	} );
}() );
