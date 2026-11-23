# Deployment (GitHub Pages)

Deployment is automatic: every push to `main` runs
`.github/workflows/deploy.yml`, which

1. checks out the repo,
2. installs PHP 8.4 (`shivammathur/setup-php`),
3. lint-checks every PHP file,
4. asks GitHub for the Pages URL (`actions/configure-pages`),
5. runs `php build.php` with `SITE_BASE_PATH` / `SITE_URL` set from step 4,
6. uploads `public/` and deploys it (`actions/deploy-pages`).

`public/` is not committed; CI always builds fresh.

## One-time setup

1. Create the repository `mattryanco/mattryan-xyz` and push `main`.
2. **Settings → Pages → Build and deployment → Source: GitHub Actions.**
   Or from a terminal:
   ```sh
   gh api -X POST repos/mattryanco/mattryan-xyz/pages -f build_type=workflow
   ```
3. Push (or run the workflow from the **Actions** tab).

> **Done 2026-11-23.** Repo: https://github.com/MattRyanCo/mattryan-xyz.
> Because the account's user site (`MattRyanCo.github.io`) has the custom
> domain `www.ryno-net.com`, GitHub serves this project page at
> **https://www.ryno-net.com/mattryan-xyz/**, and
> `mattryanco.github.io/mattryan-xyz/` redirects there. The workflow reads
> that URL from `configure-pages`, so nothing in the repo needs to change.
> Giving this repo its own custom domain (below) moves it to the domain root.

GitHub Pages on a free account requires the repository to be **public**.

## Manual deploy / re-deploy

Actions tab → **Deploy to GitHub Pages** → **Run workflow**.

## Moving the mattryan.xyz domain here

When you're ready to switch the domain from WordPress hosting to this site:

1. In `config/site.php` set `'cname' => 'mattryan.xyz'` and
   `'site_url' => 'https://mattryan.xyz'`; commit and push.
2. Repo **Settings → Pages → Custom domain**: `mattryan.xyz`.
3. At your DNS provider (currently Cloudflare), replace the existing records
   for the apex with GitHub's:
   - `A` → `185.199.108.153`, `185.199.109.153`, `185.199.110.153`, `185.199.111.153`
   - `AAAA` → `2606:50c0:8000::153`, `2606:50c0:8001::153`, `2606:50c0:8002::153`, `2606:50c0:8003::153`
   - optional `CNAME www` → `mattryanco.github.io`
   If Cloudflare proxies the records (orange cloud), set SSL mode to *Full*.
   GitHub's own HTTPS certificate is issued most reliably with the records
   set to *DNS only* (grey cloud).
4. Once DNS resolves, tick **Enforce HTTPS** in the Pages settings.

The workflow picks up the new base path (`/`) and URL automatically.

Check GitHub's current docs for the IP addresses before changing DNS:
https://docs.github.com/pages/configuring-a-custom-domain-for-your-github-pages-site

## Troubleshooting

| Symptom | Cause / fix |
|---------|-------------|
| Unstyled pages, broken links on github.io | Base path wrong. Check the "Configure Pages" step output; make sure templates use `$site->url()`/`$site->asset()`. |
| Workflow fails at "Configure Pages" | Pages isn't enabled or not set to "GitHub Actions" (step 2 above). |
| Workflow fails at "Lint PHP" | Syntax error in the named file. Run `php build.php` locally. |
| Custom domain resets after deploy | `cname` not set in `config/site.php` (the build writes `CNAME`). |
| Privacy/Terms show only the fallback link | See [MIGRATION.md](MIGRATION.md#termageddon). |
