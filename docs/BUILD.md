# Building and previewing

## Requirements

- PHP **8.4+** CLI. No extensions beyond the defaults, no Composer.
  (`build.php` exits with an error on older versions.)

## Build

```sh
php build.php
```

Output goes to `public/` (deleted and recreated on every build):

```
public/
├── index.html
├── friends/index.html
├── privacy-policy/index.html
├── terms-of-service/index.html
├── 404.html
├── assets/…          copy of assets/
├── sitemap.xml
├── robots.txt
├── .nojekyll          tells GitHub Pages not to run Jekyll
└── CNAME              only if config 'cname' is set
```

## Options

| CLI option | Env variable | Default (`config/site.php`) | Meaning |
|------------|--------------|-----------------------------|---------|
| `--base-path=/x/` | `SITE_BASE_PATH` | `/` | URL prefix the site is served under |
| `--site-url=https://…` | `SITE_URL` | `site_url` | Absolute URL for canonical links / sitemap |
| `--out=dir` | — | `public` | Output directory |

CLI options win over environment variables, which win over the config file.
The GitHub workflow sets the environment variables from the real Pages URL,
so you normally never pass these by hand.

### Why the base path matters

A GitHub *project* page lives under a sub-path,
`https://mattryanco.github.io/mattryan-xyz/`, so every link and asset must start
with `/mattryan-xyz/`. With a custom domain it's just `/`. All templates use
`$site->url()` / `$site->asset()`, which add the prefix.

To test a project-page build locally:

```sh
php build.php --base-path=/mattryan-xyz/ --out=build-test
```

(In Git Bash, prefix with `MSYS_NO_PATHCONV=1` or Git Bash rewrites
`/mattryan-xyz/` into a Windows path. PowerShell is fine.)

## Preview

```sh
php -S localhost:8000 -t public
```

Open http://localhost:8000. Rebuild after each edit; there's no file watcher.

With Laragon you can also point a virtual host at the `public/` folder.

## Checks

```sh
# syntax-check all PHP (the CI workflow runs the same)
find build.php src config content templates -name '*.php' -exec php -l {} \;
```

PowerShell:

```powershell
Get-ChildItem build.php,src,config,content,templates -Recurse -Filter *.php | ForEach-Object { php -l $_.FullName }
```
