# TechMech Engineering Website

Source for the TechMech Engineering marketing site — material handling and conveyor systems, Vapi, Gujarat.

## Structure

This repo contains two parallel builds:

- **Static site (`index.html`, `blog.html`, `styles.css`, `blog.js`, `images/`)** — the primary build, deployed on **Netlify**. `index.html` is a single-page site (About/Products/Industries/FAQ/Contact/Quote are all in-page sections); `blog.html` is the blog listing page. The quote form submits via [Netlify Forms](https://docs.netlify.com/manage/forms/setup/).
- **PHP variant (`index.php`, `about.php`, `contact.php`, `quote.php`, `header.php`, `footer.php`, `submit_quote.php`, `.htaccess`)** — an alternate build for traditional Apache/PHP hosting (e.g. Hostinger). The quote form here posts to `submit_quote.php`, which emails the submission.

Both builds share `images/` and the same content; keep them in sync when editing.

## Local development

Static site — any static file server works, e.g.:

```
python3 -m http.server 8000
```

Then open `http://localhost:8000`.

PHP variant — requires a local PHP server:

```
php -S localhost:8000
```

## Deployment

See [`NETLIFY_DEPLOYMENT.md`](NETLIFY_DEPLOYMENT.md) for the Netlify + custom domain + SSL setup (primary deployment target).

See [`DEPLOYMENT.md`](DEPLOYMENT.md) for the Hostinger/Apache PHP deployment path.

## Security notes

- The quote form has honeypot spam protection and server/client-side validation.
- File uploads (PHP variant) are restricted to an extension + MIME whitelist and stored with generated filenames; `uploads/.htaccess` blocks script execution in that directory.
- Security headers (CSP, HSTS, X-Frame-Options, etc.) are set via `netlify.toml` (static site) and `.htaccess` (PHP/Apache).
