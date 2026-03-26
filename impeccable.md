# Manhattan Appliance Site Notes

## Purpose

This file documents:

1. What has already been changed on the site.
2. What the desired visual direction is.
3. What should be preserved or improved in future edits.

The intent is to keep the site aligned with the current redesign direction and avoid drifting back to the older layout.

---

## Current Implementation Status

### Platform / structure

- The live routed site is PHP-based and served through `router.php`.
- Shared layout logic is in `includes/site.php`.
- The main routed pages have been rebuilt toward a Tailwind CDN approach instead of relying only on the old custom stylesheet.
- Tailwind is loaded through CDN in the shared PHP shell.
- The static `index.html` was also updated to match the current homepage top structure for visual consistency.

### Git / repo

- Git was initialized in this project.
- A first commit was created:
  - `31ac192` `Build homepage redesign and site styling updates`

### Homepage work already completed

- Hero section redesigned to match the provided references more closely.
- Hero uses background images supplied by the user.
- Hero headline is forced into:
  - `Premium Appliance Repair for`
  - `Homes & Businesses`
- Hero buttons:
  - `Book Online`
  - `Zip Codes We Service`
- Intro section updated to:
  - `We Go the Extra Mile`
- Service-area section restyled to a centered heading + four-card layout.
- Added a dedicated full-width banner for:
  - `Outside Our Service Area?`
- That banner now keeps the text fixed while the background image reveals different vertical portions on scroll.
- Testimonial section changed to:
  - `What Our Clients Say`
- Testimonials were changed from a static grid to a horizontal sliding presentation with animated dots.

### Footer work already completed

- Footer rebuilt into 3 visual bands:
  1. Blue title band
  2. White information section
  3. Black copyright strip
- Footer contains:
  - Logo
  - Contact block
  - Opening hours block
  - Social icons
- Mobile footer spacing, heading sizes, logo size, and copyright bar were tightened to better match the provided mobile reference.

### Mobile work already completed

- Mobile homepage top was adjusted multiple times based on screenshots.
- The current requested mobile top direction is:
  - visible logo
  - visible business name
  - visible phone and email
  - visible nav links
  - centered `Book Online` button
  - no separate hidden hamburger-only mobile menu pattern for the final desired version
- Hero mobile sizing was reduced and tightened so the title and buttons fit more like the supplied mockups.

---

## Desired Design Direction

This is the target direction the user wants the site to follow.

### Overall feel

- Clean
- Premium
- Service-business professional
- White background base
- Blue accent color
- Spacious but controlled
- Strong visual hierarchy
- Mobile-first polish matters

### Typography

- Use a clean sans-serif look.
- Typography should match the references closely:
  - lighter, cleaner section titles
  - balanced font sizes
  - tighter spacing on mobile
- Avoid oversized text blocks on mobile unless the mockup clearly shows them large.
- Footer and section headings should feel elegant, not heavy or bulky.

### Header / top area

Desired mobile top should match the reference image:

- Logo visible at top left.
- Business name visible.
- Phone and email visible under or beside the branding.
- Navigation links visible in rows.
- `Book Online` button centered below the nav.
- Spacing should be compact and balanced.
- Avoid the current over-expanded or awkward stacked menu feel.

### Hero

- Hero should visually match the supplied screenshots.
- The title must stay on 2 lines:
  - `Premium Appliance Repair for`
  - `Homes & Businesses`
- Text must remain readable over the image.
- Mobile hero should be compact enough to show the title and buttons clearly without feeling cramped.

### Service Area section

Desired structure:

- `Where We Service`
- `Manhattan, NY | Select counties in New Jersey`
- `Our Service Area Promise`
- Four white cards under that heading

The card section should look like the provided reference:

- clean white cards
- balanced spacing
- moderate blue headings
- centered section intro

### Outside Our Service Area banner

Desired behavior:

- The entire text block stays fixed in place.
- The background does not auto-slide on its own.
- As the user scrolls up or down, different vertical parts of the same background image should be revealed.
- The image to use for this effect is:
  - `shutterstock_2473408983.jpg`

### Testimonials

Desired structure:

- Section heading:
  - `What Our Clients Say`
- Subtitle:
  - `Trusted by homeowners and businesses across Manhattan and New Jersey`
- Three testimonial items visible in the slider presentation.

Desired behavior:

- Testimonials slide sideways.
- Dots move with the testimonial state.
- The slider should pause before moving to the next position.

Desired visual style:

- Text-only feel, not heavy cards
- Centered quote / author / source
- Font weights and sizes should resemble the reference screenshots

### Footer

Desired mobile footer should match the mobile reference:

- Blue banner with:
  - `Reliable Appliance Repair Starts Here`
- White section with:
  - centered logo
  - centered `Contact`
  - centered `Opening Hours`
  - social icons below
- Black copyright strip at bottom

Desired footer characteristics:

- Smaller logo on mobile
- Tighter vertical spacing
- Cleaner icon treatment
- Smaller copyright text
- Blue banner should not be too tall

---

## Important Behavioral Notes

### Tailwind direction

- The user asked whether Tailwind could be used.
- The broader rebuild direction chosen was:
  - use Tailwind via CDN
  - avoid introducing a full Node build step
  - keep this practical for the existing PHP site

### Live site vs static snapshots

- The live site uses the PHP routed pages.
- Static `.html` files may still exist as snapshots.
- If there is any visual mismatch, prioritize:
  1. routed PHP pages
  2. shared layout in `includes/site.php`
  3. then sync static `.html` snapshots if needed

---

## Files Most Relevant Going Forward

- `includes/site.php`
- `index.php`
- `index.html`
- `router.php`

Also relevant depending on section:

- `services.php`
- `clients.php`
- `service-areas.php`
- `why-manhattan-appliance.php`
- `resources.php`
- `contact.php`
- `brands-we-service.php`
- `faqs.php`

---

## What Future Changes Should Aim For

- Match supplied screenshots closely, especially on mobile.
- Prefer exact visual alignment over generic responsive patterns.
- Keep the design clean and premium.
- Keep sections centered and balanced.
- Avoid reverting to bulky spacing, oversized headers, or awkward mobile stacking.
- Continue refining toward the reference, section by section.
