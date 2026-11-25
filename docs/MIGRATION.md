# Migration notes (WordPress → static)

Source: https://mattryan.xyz, WordPress 7.1.5, theme `mattryanxyz` (generated
by Miles), crawled 2026-11-23. The site had four published pages and no posts.

## Carried over

| WordPress | Static site |
|-----------|-------------|
| Home (page 9, link tree) | `content/pages/index.php`, links in `config/site.php` |
| Theme fonts, background image | `assets/fonts/`, `assets/images/geometric-bg.jpg` |
| Site icon (`uploads/2026/03/mr.png`) | `assets/images/favicon-*.png` |
| Theme CSS + WordPress-generated CSS | `assets/css/`, pruned to the rules the site uses (see [STYLES.md](STYLES.md)) |

## Changed

- **Contact email.** Cloudflare's email obfuscation (`/cdn-cgi/l/email-protection`)
  only works behind Cloudflare. Links are now plain
  `mailto:contact@mattryan.xyz`.
- **404 page.** New, since GitHub Pages serves `404.html` for unknown URLs.

## Dropped

| Feature | Why |
|---------|-----|
| Friends & Feeds (page 84), Friends plugin | Not intended for the static site. The page, the header navigation menu that only it used (`header.css`, `navigation.js`), and the custom logo were removed. `/friends/` now 404s. |
| Privacy Policy (page 3), Terms of Service (page 272) | Termageddon embeds; not intended for the static site. `/privacy-policy/` and `/terms-of-service/` now 404. |
| Theme `script.js` (scroll-reveal animation) | The extracted CSS already forced the animated elements visible, so the script had no effect. The site now ships no JavaScript. |
| Independent Analytics | Server-side plugin. Add a static analytics snippet (e.g. Plausible, GoatCounter) before `</body>` in `templates/layouts/*.php` if wanted. |
| RSS feeds, REST API, oEmbed, xmlrpc, comments | No dynamic backend; the site had no posts. |
| Speculation-rules prefetch | WordPress-specific; not needed for 2 pages. |
