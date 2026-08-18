# Netlify Deployment Guide

This covers pushing the repo to GitHub, deploying the static site to Netlify, connecting
`mechsow.com`, and verifying SSL. Everything up to "Push to GitHub" has
already been prepared in this repo (`netlify.toml`, security headers, Netlify Forms,
`.gitignore`). The steps below need your GitHub/Netlify accounts, so they're yours to run.

## 1. Push to GitHub

1. Create a new **empty** repository on GitHub (no README/license/gitignore — this repo
   already has those): https://github.com/new
2. Copy its URL, then from this project folder:

   ```bash
   git remote add origin https://github.com/<your-username>/<repo-name>.git
   git branch -M main
   git push -u origin main
   ```

   (If you'd rather I run these for you, say so and give me the repo URL — I didn't create
   the GitHub repo myself since that needs your account.)

## 2. Deploy to Netlify

1. Go to https://app.netlify.com → **Add new site → Import an existing project**.
2. Connect GitHub and pick this repo.
3. Build settings — this is a plain static site, so:
   - **Build command:** leave blank
   - **Publish directory:** `.` (repo root — already set in `netlify.toml`)
4. Click **Deploy site**. Netlify will give you a URL like `random-name-123.netlify.app`.
5. Confirm the deployed site loads correctly (home page, blog page, images, quote form).

### Enabling the quote form

Netlify detects the form automatically from the static HTML (`data-netlify="true"` on
`#quoteForm` in `index.html`) on the **first deploy**. After deploying:

1. Go to **Site configuration → Forms** in the Netlify dashboard and confirm
   `quote-request` appears as a detected form.
2. Set up a notification so you actually see submissions: **Forms → Settings and usage
   → Form notifications → Add notification** → email notification to
   `techmechengineering1@gmail.com`.
3. Submit a real test inquiry through the live site and confirm it shows up under
   **Forms → quote-request** and triggers the email.

## 3. Connect the custom domain (mechsow.com)

1. In the Netlify dashboard: **Site configuration → Domain management → Add a domain** →
   enter `mechsow.com`.
2. Netlify will ask you to either:
   - **Use Netlify DNS** (recommended, simplest): Netlify gives you 4 nameservers
     (e.g. `dns1.p0X.nsone.net`) — set these as the nameservers at your domain registrar
     (wherever `mechsow.com` is registered). This hands all DNS management
     to Netlify and SSL/www-redirect just work.
   - **Keep your current DNS provider**: instead add these records at your registrar/DNS host:
     - `A` record: `@` → `75.2.60.5` (Netlify's load balancer IP)
     - `CNAME` record: `www` → `<your-site-name>.netlify.app`
3. DNS changes can take anywhere from a few minutes to 24-48 hours to propagate.
4. Back in Netlify, set your **primary domain** (usually `www.mechsow.com`
   or the apex, your choice) under **Domain management → Set primary domain** — the other
   variant will auto-redirect to it.

**This step needs your registrar login and your Netlify account — I can't do it for you.**
Tell me who your domain is registered with (GoDaddy, Hostinger, BigRock, etc.) if you want
exact click-by-click steps for that specific registrar's DNS panel.

## 4. SSL/HTTPS verification

Netlify auto-provisions a free Let's Encrypt certificate once DNS is correctly pointed at
it — no action needed beyond step 3.

1. In Netlify: **Site configuration → Domain management → HTTPS** — status should read
   "Netlify manages your certificate" once DNS propagates (can take up to a few hours
   after DNS is correct).
2. Confirm **Force HTTPS** is toggled on (redirects any `http://` request to `https://`).
3. Once live, verify from your own machine:
   - Visit `https://mechsow.com` and `https://www.mechsow.com`
     — both should load with a valid padlock, no browser warnings.
   - Visit the `http://` version of each — should 301-redirect to `https://`.
4. The security headers already configured in `netlify.toml` (HSTS, CSP, etc.) apply
   automatically — no extra setup.

## Notes

- The PHP variant (`index.php` etc.) is **not** used by this Netlify deployment — Netlify
  doesn't run PHP. It's kept in the repo for Hostinger/Apache hosting as an alternative;
  see `DEPLOYMENT.md`. If you only intend to use Netlify going forward, those `.php` files
  can eventually be removed, but I've left them in place since removing them wasn't asked for.
- `uploads/` is gitignored (except its `.htaccess`) since it's PHP-runtime state, not
  source — irrelevant to the Netlify build, which uses Netlify Forms for file attachments
  instead of a local `uploads/` folder.
