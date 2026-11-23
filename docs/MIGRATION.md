# Migration notes (WordPress → static)

Source: https://mattryan.xyz, WordPress 7.1.5, theme `mattryanxyz` (generated
by Miles), crawled 2026-11-23. The site had four published pages and no posts.

## Carried over

| WordPress | Static site |
|-----------|-------------|
| Home (page 9, link tree) | `content/pages/index.php`, links in `config/site.php` |
| Friends & Feeds (page 84) | `content/pages/friends.php` |
| Privacy Policy (page 3) | `content/pages/privacy-policy.php` (Termageddon embed) |
| Terms of Service (page 272) | `content/pages/terms-of-service.php` (Termageddon embed) |
| Theme fonts, background image | `assets/fonts/`, `assets/images/geometric-bg.jpg` |
| Site icon (`uploads/2026/03/mr.png`) | `assets/images/favicon-*.png` |
| Custom logo (`uploads/2026/01/cropped-mrco-logo-96.webp`) | `assets/images/logo.webp` |
| Theme CSS + WordPress-generated CSS | `assets/css/` (see [STYLES.md](STYLES.md)) |
| Theme `script.js` | `assets/js/theme.js` |
| Navigation block (Interactivity API) | `assets/js/navigation.js` |
| URLs `/friends/`, `/privacy-policy/`, `/terms-of-service/` | Unchanged |

## Changed

- **Contact email.** Cloudflare's email obfuscation (`/cdn-cgi/l/email-protection`)
  only works behind Cloudflare. Links are now plain
  `mailto:contact@mattryan.xyz`.
- **Mobile menu offset.** The header CSS shifted the open mobile menu 16px to
  the left; fixed (`header.css`).
- **404 page.** New, since GitHub Pages serves `404.html` for unknown URLs.

## Dropped

| Feature | Why |
|---------|-----|
| Friends plugin "Follow this site" form | Needs a WordPress backend to receive requests. Replaced by a "Learn more about following" link. The page text still describes the WordPress/Friends setup; update it if that no longer applies. |
| "Hi Friend!" / `only-friends` content | The plugin showed it only to logged-in friends; on WordPress it was visible to everyone anyway (the hiding CSS wasn't loaded). Kept as-is for fidelity. |
| Independent Analytics | Server-side plugin. Add a static analytics snippet (e.g. Plausible, GoatCounter) to `templates/partials/scripts.php` if wanted. |
| RSS feeds, REST API, oEmbed, xmlrpc, comments | No dynamic backend; the site had no posts. |
| Speculation-rules prefetch | WordPress-specific; not needed for 5 pages. |

## Termageddon

The policy pages load their text from Termageddon's embed script, exactly as
on WordPress. The embed worked from `localhost` during testing. If the policy
text doesn't appear on `mattryanco.github.io`, Termageddon may be restricting
the embed to the registered domain; it will work again once the site is served
from `mattryan.xyz` (see [DEPLOYMENT.md](DEPLOYMENT.md)), and the fallback
"click here to view the policy" link always works.

## Placeholder links worth reviewing

These were copied exactly from the live site, but look like Miles defaults
rather than real destinations:

| Where | Label | URL |
|-------|-------|-----|
| Home | Development Projects | `https://github.com` |
| Header nav | Selected Projects | `https://github.com` |
| Header nav | Technical Essays | `https://substack.com` |
| Header nav | Direct Dispatch | `https://x.com` |

Edit them in `config/site.php`.
