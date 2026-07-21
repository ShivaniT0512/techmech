<?php
$status = ($_GET['status'] ?? '') === 'error' ? 'error' : 'success';
$pageTitle = $status === 'success' ? 'Thank You | Quote Request Received' : 'Submission Error | TechMech Engineering';
$pageDesc = 'Thank you for contacting TechMech Engineering. Our engineering team will review your request and respond within 24 hours.';
$pageKeywords = 'techmech engineering, quote confirmation';
$currentPage = 'thankyou';
include 'header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero" id="main-content">
  <div class="page-hero-content">
    <div class="container">
      <div class="breadcrumb"><a href="index.php">Home</a> <i class="fas fa-chevron-right"></i> <span>Thank You</span></div>
      <?php if ($status === 'success'): ?>
        <h1>Thank You For Your Inquiry</h1>
        <p>We've received your quote request. Our engineering team will review it and get back to you within 24 hours.</p>
      <?php else: ?>
        <h1>Something Went Wrong</h1>
        <p>We couldn't send your inquiry due to a server issue. Please try again, or contact us directly below.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container" style="text-align:center;max-width:640px;margin:0 auto;">
    <?php if ($status === 'success'): ?>
      <i class="fas fa-check-circle" style="font-size:64px;color:var(--primary);margin-bottom:24px;display:inline-block;"></i>
      <h2 class="section-title">Request Received</h2>
      <p class="section-desc" style="margin:0 auto 32px;">
        A confirmation has been logged and our team has been notified. If your inquiry is urgent, feel free to call
        or WhatsApp us directly.
      </p>
    <?php else: ?>
      <i class="fas fa-exclamation-triangle" style="font-size:64px;color:#c0392b;margin-bottom:24px;display:inline-block;"></i>
      <h2 class="section-title">We Couldn't Send That</h2>
      <p class="section-desc" style="margin:0 auto 32px;">
        Please try submitting the form again in a few minutes. If the problem continues, reach out to us directly
        and we'll take care of it personally.
      </p>
    <?php endif; ?>
    <div style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center;">
      <a href="index.php" class="btn btn-primary"><i class="fas fa-home"></i> Back to Home</a>
      <a href="tel:+919512696191" class="btn btn-outline" style="color:var(--dark);border-color:var(--border);"><i class="fas fa-phone-alt"></i> Call Us</a>
      <a href="https://wa.me/919512696191" target="_blank" rel="noopener noreferrer" class="btn" style="background:#25D366;color:white"><i class="fab fa-whatsapp"></i> WhatsApp</a>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
