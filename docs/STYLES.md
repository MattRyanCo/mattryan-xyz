# Styles

The visual design is the one Miles generated for the WordPress theme
`mattryanxyz`. To reproduce it exactly, the CSS that WordPress printed into each
page was extracted (on 2026-11-23, WordPress 7.1.5) and split into files.

## Files (`assets/css/`)

| File | Origin | Edit? |
|------|--------|-------|
| `fonts.css` | `@font-face` rules for the self-hosted fonts | Rarely |
| `wp/blocks.css` | Core block styles (group, heading, paragraph, separator, button(s), site title/logo, post title/content, navigation) | **Avoid** — treat as vendor CSS |
| `wp/global-landing.css` | `theme.json` output for the home page: colour/font/spacing presets (`--wp--preset--*`), element styles, layout rules (`.wp-container-core-…`) | **Avoid** |
| `wp/global-page.css` | Same, for inner pages | **Avoid** |
| `wp/library.css` | Block-library base rules + skip-link styles | **Avoid** |
| `header.css` | The Miles header block (site title, nav, mobile overlay) | Yes, carefully |
| `landing.css` | Home-page hero / link-tree design (card, logo symbol, orange buttons) | Yes |
| `theme.css` | Theme-wide rules + local fixes | **Yes — put new rules here** |

`wp/global-*` differ only because WordPress prints rules just for the blocks a
page uses. They're kept separate so each layout gets exactly the CSS it had on
WordPress.

## Load order

The order matches the WordPress `<head>`, which matters for the cascade.

| `landing` layout (home) | `page` layout (inner pages) |
|---|---|
| fonts.css | fonts.css |
| wp/blocks.css | wp/blocks.css |
| wp/global-landing.css | header.css |
| landing.css | wp/global-page.css |
| wp/library.css | wp/library.css |
| theme.css | theme.css |

Lists live at the top of `templates/layouts/landing.php` and `page.php`.

## Design tokens

Defined in `wp/global-*.css` as CSS custom properties. The useful ones:

| Token | Value | Use |
|-------|-------|-----|
| `--wp--preset--color--base` | `#0B121B` | Page background |
| `--wp--preset--color--base-2` | `#142030` | Home card background (`.hero-frame`) |
| `--wp--preset--color--contrast` | `#FFFFFF` | Text |
| `--wp--preset--color--contrast-2` | `#94A3B8` | Muted text (tagline, footer line) |
| `--wp--preset--color--accent-1` | `#546E91` | Logo box, divider highlight |
| `--wp--preset--color--accent-2` | `#2C3E55` | Card border, divider |
| `--wp--preset--color--accent-3` | `#FF5000` | Orange link buttons |
| `--wp--preset--color--accent-4` | `#FF6A22` | Button hover |
| `--wp--preset--color--accent-5` | `#88A0C0` | "Links" heading |

| Token | Use |
|-------|-----|
| `--wp--preset--font-family--chakra-petch` | Headings |
| `--wp--preset--font-family--jetbrains-mono` | Body / UI |
| `--wp--preset--font-size--small` … `--display` | Type scale |
| `--wp--preset--spacing--20` … `--80` | Spacing scale |

To change a colour site-wide, override the token in `theme.css`:

```css
:root { --wp--preset--color--accent-3: #e64800; }
```

The "Use" column lists where `landing.css` uses each token; WordPress utility
classes (below) can use them anywhere.

## Utility classes

Content markup uses WordPress utility classes that map to the tokens, e.g.
`has-contrast-color`, `has-base-background-color`, `has-small-font-size`,
`has-jetbrains-mono-font-family`, `has-text-align-center`. They're defined in
`wp/global-*.css`.

## Local fixes

Changes made on top of the extracted CSS (search for "static build"):

- `header.css`: open mobile menu was positioned at `left: -16px`, leaving a
  strip of page visible on the right. Now `left: 0`.

## Simplifying later

If you ever restyle the site, the cleanest path is to replace the `wp/` files
with your own stylesheet and drop the `wp-block-*` classes from templates.
Until then, leave `wp/` alone and override in `theme.css`.
