# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.1.0] - 2026-05-19

### Added

- Zine/editorial design transplant with Tailwind CSS component layer
- Hero section with vol./title/polaroid/sticker layout
- Services grid with 6 polaroid cards and APPROVED stamps
- Pricing section with classified-ad-style cards
- Testimonials as "Letters to the Editor" cards
- Colophon footer with zine colophon/bottom bar
- Contact form phone field and database migration
- About page cleaning manifesto with dynamic stats
- Maintenance page zine "OUT OF OFFICE" card design
- Page view zine-styled prose container
- Scroll-reveal IntersectionObserver and confirm dialog in JS
- Admin zine-themed layout (newsprint body, black sidebar, zine-green accents)
- Auth (guest) pages with zine fonts and styling
- Zine-nav class with background and bottom border for visual separation
- Section-block utility (py-20) for consistent 80px vertical rhythm
- Zine color palette and fonts in Tailwind config

### Changed

- Rebrand from Jino Conklin portfolio to Clean Touch cleaning service
- app.name to "Clean Touch" in config/app.php
- HomeController to serve hardcoded cleaning content
- AboutController with cleaning business stats
- Body font-size to 14px (text-sm) and line-height 1.7 to match zine proportions
- Hero padding to pt-24 pb-20 (96px/80px), colophon to pt-16 pb-10 (64px/40px)
- Navigation restructured with proper zine__inner wrapper and zine-nav class
- Home/about/contact views: added section-block class to all sections
- Admin emails index and show views: added Phone column/cell

### Removed

- Old boilerplate CSS and Tailwind base overrides replaced by zine components
- Deleted stale build assets (app-34mOoJaZ.js, app-BQ_PGqMx.css)
- Portfolio query from HomeController (no longer displayed on home page)

## [1.0.0] - 2026-05-19

### Added

- Initial boilerplate release.
