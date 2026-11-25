# Styles

All styles live in one hand-written file, `assets/css/style.css` (about 6 KB),
loaded by both layouts through `templates/partials/head.php`.

The design is the one Miles generated for the original WordPress theme
`mattryanxyz`. The CSS that WordPress printed into each page was replaced by
this file, and the result was checked pixel-for-pixel against the WordPress
version (home page at 1440/580/390/360 px wide, button hover and keyboard
focus; 404 page at the same widths). No WordPress class names remain.

## Sections of `style.css`

| Section | What it covers |
|---------|----------------|
| Fonts | `@font-face` for the self-hosted fonts in `assets/fonts/` |
| `:root` | Design tokens (colours and font stacks) |
| Base | Box sizing, `body`, headings, paragraphs, links |
| Home page | `.hero` and its `.hero-*` parts: background, card, logo, title, divider, link buttons, plus breakpoints at 600, 480 and 360 px |
| Inner pages | `.page` and `.page-title`: the centred 560px column used by the `page` layout |

## Design tokens

| Token | Value | Use |
|-------|-------|-----|
| `--color-bg` | `#0B121B` | Page background |
| `--color-card` | `#142030` | Home card background |
| `--color-text` | `#FFFFFF` | Text |
| `--color-muted` | `#94A3B8` | Muted text (tagline, description, footer line) |
| `--color-steel` | `#546E91` | Logo box, divider highlight |
| `--color-line` | `#2C3E55` | Card border, divider |
| `--color-accent` | `#FF5000` | Orange link buttons |
| `--color-accent-hover` | `#FF6A22` | Button hover / focus border |
| `--color-subheading` | `#88A0C0` | "Links" heading |
| `--font-heading` | Chakra Petch | Headings |
| `--font-body` | JetBrains Mono | Everything else |

To change a colour site-wide, change its token.

## Fonts

| File | Family / weight |
|------|-----------------|
| `assets/fonts/chakra-petch-600.woff2` | Chakra Petch 600 ("Links" heading) |
| `assets/fonts/chakra-petch-700.woff2` | Chakra Petch 700 (titles) |
| `assets/fonts/jetbrains-mono.woff2` | JetBrains Mono, variable font covering 400–700 |

## Home page markup

```
main.hero                 full-screen background image + overlay (::before)
├── div.hero-grid         faint 40px grid
└── div.hero-frame        the card
    ├── header.hero-header
    │   ├── div.hero-logo         icon drawn by ::before (CSS mask)
    │   ├── h1.hero-title         size scales with the header width (cqi)
    │   ├── p.hero-tagline
    │   └── p.hero-description
    ├── hr.hero-divider
    ├── h2.hero-links-heading
    ├── ul.hero-links > li > a.hero-button
    └── p.hero-footer
```

## Notes

- Gradient colours use the legacy `rgba(r, g, b, a)` syntax on purpose.
  Chrome interpolates gradients with modern `rgb(r g b / a)` colours in a
  different colour space, which shifts the background by a shade.
- Image and font URLs in `style.css` are relative (`../images/…`), so they
  work under any base path.
