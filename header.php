<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
if (!isset($pageTitle)) $pageTitle = 'Efficiency In Every Move | Material Handling Solutions';
if (!isset($pageDesc)) $pageDesc = 'Mechsow - Leading manufacturer of belt, roller, screw & slat conveyor systems. 10+ years experience in material handling solutions. Based in Vapi, Gujarat.';
if (!isset($pageKeywords)) $pageKeywords = 'conveyor systems, belt conveyor, roller conveyor, screw conveyor, material handling, industrial automation, Vapi Gujarat';
if (!isset($currentPage)) $currentPage = 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo htmlspecialchars($pageDesc); ?>">
  <meta name="keywords" content="<?php echo htmlspecialchars($pageKeywords); ?>">
  <title>Mechsow | <?php echo htmlspecialchars($pageTitle); ?></title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <?php if ($currentPage === 'home'): ?>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Mechsow",
    "url": "https://mechsow.com",
    "description": "Manufacturer of material handling and conveying systems",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Plot No. 584/Pakki 1, Gala No. 3, Near Canal, 4th Phase GIDC",
      "addressLocality": "Vapi",
      "addressRegion": "Gujarat",
      "addressCountry": "IN"
    },
    "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "+91-9512696191",
      "contactType": "sales"
    }
  }
  </script>
  <?php endif; ?>
</head>
<body>

<a href="#main-content" class="skip-link">Skip to content</a>

<!-- HEADER -->
<header class="header" id="header">
  <div class="header-inner">
    <a href="index.php" class="logo">
      <img src="images/logo.png" alt="Mechsow" style="height: 50px; width: auto;">
    </a>
    <nav class="nav-links">
      <a href="index.php"<?php if ($currentPage === 'home') echo ' class="active"'; ?>>Home</a>
      <a href="about.php"<?php if ($currentPage === 'about') echo ' class="active"'; ?>>About</a>
      <div class="dropdown">
        <a href="index.php#products">Products <i class="fas fa-chevron-down" style="font-size:10px;margin-left:4px"></i></a>
        <div class="dropdown-menu">
          <a href="index.php#products"><i class="fas fa-arrows-alt-h"></i> Flat Belt Conveyor</a>
          <a href="index.php#products"><i class="fas fa-arrow-up"></i> Inclined Belt Conveyor</a>
          <a href="index.php#products"><i class="fas fa-truck-loading"></i> Truck Loading Conveyor</a>
          <a href="index.php#products"><i class="fas fa-circle-notch"></i> Roller Conveyors</a>
          <a href="index.php#products"><i class="fas fa-sync-alt"></i> Screw Conveyor</a>
          <a href="index.php#products"><i class="fas fa-layer-group"></i> Slat Chain Conveyor</a>
          <a href="index.php#products"><i class="fas fa-border-all"></i> Wire Mesh Conveyor</a>
          <a href="index.php#products"><i class="fas fa-arrow-up"></i> Bucket Elevator</a>
          <a href="index.php#products"><i class="fas fa-wind"></i> Pneumatic Conveying System</a>
          <a href="index.php#products"><i class="fas fa-drum"></i> Drum Filling Machine</a>
          <a href="index.php#products"><i class="fas fa-industry"></i> Tank Fabrication Work</a>
          <a href="index.php#products"><i class="fas fa-dolly"></i> MS Trolley, Pallet &amp; Grating</a>
        </div>
      </div>
      <a href="index.php#industries"<?php if ($currentPage === 'industries') echo ' class="active"'; ?>>Industries</a>
      <a href="index.php#blog"<?php if ($currentPage === 'blog') echo ' class="active"'; ?>>Blog</a>
      <a href="contact.php"<?php if ($currentPage === 'contact') echo ' class="active"'; ?>>Contact</a>
    </nav>
    <div class="header-cta">
      <a href="tel:+919512696191" class="header-phone"><i class="fas fa-phone-alt"></i> +91 95126 96191</a>
      <a href="quote.php" class="btn btn-primary">Get Quote</a>
    </div>
    <button class="mobile-toggle" onclick="document.querySelector('.mobile-menu').classList.toggle('active')" aria-label="Toggle navigation menu"><i class="fas fa-bars"></i></button>
  </div>
</header>
<div class="mobile-menu">
  <a href="index.php" onclick="this.parentElement.classList.remove('active')">Home</a>
  <a href="about.php" onclick="this.parentElement.classList.remove('active')">About</a>
  <a href="index.php#industries" onclick="this.parentElement.classList.remove('active')">Industries</a>
  <a href="index.php#blog" onclick="this.parentElement.classList.remove('active')">Blog</a>
  <a href="contact.php" onclick="this.parentElement.classList.remove('active')">Contact</a>
  <a href="quote.php" onclick="this.parentElement.classList.remove('active')" style="color:var(--primary);font-weight:700">Request Quote</a>
</div>
