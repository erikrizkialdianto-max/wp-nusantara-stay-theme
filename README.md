# Nusantara Stay — Modern WordPress Block Theme (FSE)

A bespoke WordPress Full Site Editing (FSE) block theme engineered for luxury boutique stays, villas, and hospitality brands. Built with native WordPress block architecture, centralized `theme.json` design tokens, modular PHP block patterns, and self-hosted variable typography for high Core Web Vitals performance.

**Developer Profile:** [github.com/erikrizkialdianto-max](https://github.com/erikrizkialdianto-max)

**Live Demo:** https://nusantarastay.perabatlla.com/

## Key Architectural Highlights

* **Full Site Editing (FSE) & `theme.json`:** Centralized design system managing color palettes, fluid typography scales, spacing presets, and layout constraints natively within the WordPress Site Editor.
* **Custom Hospitality Block Patterns (`patterns/`):** Includes 18+ modular PHP patterns tailored for accommodations and editorial storytelling, including `booking-card.php`, `room-cards.php`, `hero-photo.php`, `chapter-house.php`, and `journal-cards.php`.
* **Global Style Variations (`styles/`):** Supports 8 distinct visual color variations alongside curated typography pairings (`styles/typography/`).
* **Performance-First Asset Loading:** Self-hosted `.woff2` variable fonts (Bodoni Moda, Hanken Grotesk, Instrument Serif, Lexend) to eliminate external font requests, prevent layout shifts (CLS), and achieve optimal Core Web Vitals scores.
* **Clean Modular Templates (`templates/` & `parts/`):** Semantic HTML block templates for front page, single posts, journal archives, and sidebar layouts.

## Tech Stack
* **CMS & Core:** WordPress 6.x Full Site Editing (Block Theme API)
* **Backend:** PHP 8.x (`functions.php`, modular `patterns/*.php`)
* **Frontend:** HTML5 Block Markup, CSS3 (`style.css`), Vanilla JavaScript, `theme.json`

## Theme Structure
```text
nusantara-stay/
├── assets/
│   ├── fonts/          # Self-hosted WOFF2 variable fonts & pairings
│   ├── images/         # Optimized hospitality & architectural imagery
│   ├── js/             # Lightweight vanilla JS interactions
│   └── patterns/       # SVG decorative assets
├── parts/              # Reusable template parts (header, footer, sidebar)
├── patterns/           # Custom PHP block patterns (booking, rooms, journal)
├── styles/             # Global style & typography JSON variations
├── templates/          # FSE HTML templates (front-page, single, archive)
├── functions.php       # Theme setup, pattern registration & asset enqueuing
├── style.css           # Theme metadata & custom styles
└── theme.json          # Global settings, styles & design tokens
```

## Installation
1. Clone or download this repository into your WordPress `/wp-content/themes/` directory.
2. Log in to your WordPress Admin Dashboard and navigate to **Appearance > Themes**.
3. Activate **Nusantara Stay** and customize layouts via **Appearance > Editor**.

## Author
**Erik Rizki Aldianto**  
WordPress Web Developer | PHP, JavaScript & Web Performance Specialist  
Email: erikrizkialdianto@gmail.com | Phone: +62 851-7501-9595
