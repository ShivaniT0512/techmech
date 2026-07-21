# TechMech Engineering Website - Deployment Guide

## Project Structure

```
techmech-website/
├── index.php              # Homepage
├── about.php              # About page
├── contact.php            # Contact page
├── industries.php         # Industries served
├── quote.php              # Quote request form
├── submit_quote.php       # Form handler (sends email)
├── thankyou.php           # Thank you page after form submission
├── header.php             # Shared header (included in all pages)
├── footer.php             # Shared footer (included in all pages)
├── styles.css             # Main stylesheet
├── .htaccess              # Apache configuration
├── images/                # All images
│   ├── about.png          # About section image
│   ├── logo_1.png         # Client logo: Aditya Birla / Hindalco
│   ├── logo_2.png         # Client logo: Atul Limited
│   ├── logo_3.png         # Client logo: KLJ
│   ├── logo_4.png         # Client logo: Anchor by Panasonic
│   ├── logo_5.png         # Client logo: Meril
│   ├── logo_6.png         # Client logo: EMIL - Essel Mining
│   ├── logo_7.png         # Client logo: IMP Powers Ltd
│   ├── logo_8.png         # Client logo: Kusumgar Corporates
│   ├── pneumatic-conveying.png
│   ├── drum-filling-machine.png
│   ├── tank-fabrication.png
│   ├── ms-trolley-pallet-grating.png
│   └── logo1.png          # Company logo (you need to add this)
└── uploads/               # Form attachment uploads (auto-created)
```

## Deployment to Hostinger

### Step 1: Upload Files
1. Login to Hostinger control panel (hPanel)
2. Go to **File Manager** or use **FTP/SFTP**
3. Navigate to `public_html/` directory
4. Upload ALL files and folders to `public_html/`
   - Upload PHP files (index.php, about.php, etc.)
   - Upload styles.css
   - Upload .htaccess
   - Upload images/ folder with all images
   - Create uploads/ folder (if not created automatically)

### Step 2: Set Permissions
Set correct permissions via File Manager or FTP:
- **uploads/** folder: `755` or `775`
- **images/** folder: `755`
- **PHP files**: `644`
- **CSS files**: `644`

### Step 3: Configure Email
Update the email address in `submit_quote.php`:
```php
$to = 'techmechengineering1@gmail.com'; // Change to your email
```

### Step 4: Add Company Logo
You need to add the company logo image:
- Filename: `images/logo1.png`
- This is used in header and footer
- Recommended size: 200-300px width, transparent PNG

### Step 5: Test Website
After uploading:
1. Visit your domain (e.g., https://www.techmechengineering.co.in)
2. Test all pages load correctly
3. Test the quote form submission
4. Verify all images display
5. Check mobile responsiveness
6. Test contact links (phone, email, WhatsApp)

## Features

### Pages
- **Homepage** (index.php) - Hero, About, Products, Why Choose, Industries, Clients, Case Studies, Blog, YouTube, Quote Form, FAQ, Contact
- **About** (about.php) - Company information, mission, vision
- **Industries** (industries.php) - Industries served with descriptions
- **Contact** (contact.php) - Contact information, map, action buttons
- **Quote** (quote.php) - Multi-step quote request form
- **Thank You** (thankyou.php) - Form submission confirmation

### Functionality
- ✅ PHP-based (compatible with Hostinger)
- ✅ Responsive design (mobile-friendly)
- ✅ Product showcase with modal popups
- ✅ Client logo carousel
- ✅ YouTube video integration
- ✅ Multi-step quote form with file upload
- ✅ Email notifications for quote requests
- ✅ Smooth scroll animations
- ✅ FAQ accordion
- ✅ Blog with categories and search
- ✅ Google Maps integration
- ✅ Floating action buttons (WhatsApp, Call, Email)

## Customization

### Change Contact Information
Edit in `header.php` and `contact.php`:
- Phone: `+91 95126 96191`
- Email: `techmechengineering1@gmail.com`
- Address: `Plot No. 584/Pakki 1, Gala No. 3, Near Canal, 4th Phase GIDC, Vapi, Gujarat`

### Change Social Media Links
Edit in `footer.php`:
- Facebook
- LinkedIn
- YouTube
- Instagram

### Add More Products
Edit the product data in `footer.php` (JavaScript section):
```javascript
const products = [
  {name:'Product Name', desc:'Description', features:['Feature 1', 'Feature 2']},
  // ... add more products
];
```

### Add More Industries
Edit `industries.php` and add more industry cards.

### Add More Blog Posts
Edit `index.php` blog section and add more blog cards.

## Troubleshooting

### Form Not Sending Email
1. Check Hostinger email settings
2. Verify email address in `submit_quote.php`
3. Check spam folder
4. Some hosts require SMTP authentication - may need to use PHPMailer library

### Images Not Showing
1. Verify images/ folder uploaded correctly
2. Check file permissions (should be 755)
3. Verify image paths in HTML are correct
4. Check for case sensitivity (logo1.png vs Logo1.png)

### .htaccess Not Working
1. Some Hostinger plans may restrict .htaccess
2. Contact Hostinger support to enable mod_rewrite
3. Try removing .htaccess and using direct .php URLs

### File Upload Not Working
1. Check uploads/ folder permissions (755 or 775)
2. Verify PHP upload limits in Hostinger settings
3. Check .htaccess PHP values

## Support

For technical issues:
- Hostinger Support: https://www.hostinger.com/help
- Email: techmechengineering1@gmail.com
- Phone: +91 95126 96191

## Notes

- The website is fully PHP-based and compatible with Hostinger's shared hosting
- All pages use shared header.php and footer.php for easy maintenance
- Form submissions send email notifications
- File uploads are stored in uploads/ directory
- All images are optimized and ready for web
- Website is mobile-responsive and SEO-friendly
- Uses Google Fonts (Barlow, Outfit) and Font Awesome icons
