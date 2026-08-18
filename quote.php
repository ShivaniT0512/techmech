<?php
$pageTitle = 'Request a Quote | Custom Conveyor Solutions';
$pageDesc = 'Get a free quote for custom conveyor systems and material handling solutions from Mechsow.';
$pageKeywords = 'conveyor quote, material handling quote, custom conveyor pricing, request quote';
$currentPage = 'quote';
include 'header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero" id="main-content">
  <div class="page-hero-content">
    <div class="container">
      <div class="breadcrumb"><a href="index.php">Home</a> <i class="fas fa-chevron-right"></i> <span>Request Quote</span></div>
      <h1>Request a Quote</h1>
      <p>Get a custom solution proposal from our engineering team. We respond to all inquiries within 24 hours.</p>
    </div>
  </div>
</section>

<!-- QUOTE FORM -->
<section class="section quote-section">
  <div class="container">
    <div class="quote-grid">
      <div class="quote-info reveal">
        <div class="section-label">Request a Quote</div>
        <h2 class="section-title">Get Custom Solution Proposal</h2>
        <p>Tell us about your material handling requirements and our engineering team will design a solution tailored to your needs.</p>
        <div class="quote-benefits">
          <div class="quote-benefit"><i class="fas fa-check"></i> Free technical consultation</div>
          <div class="quote-benefit"><i class="fas fa-check"></i> Custom engineering design</div>
          <div class="quote-benefit"><i class="fas fa-check"></i> Competitive pricing</div>
          <div class="quote-benefit"><i class="fas fa-check"></i> Detailed project proposal</div>
          <div class="quote-benefit"><i class="fas fa-check"></i> Installation &amp; commissioning included</div>
          <div class="quote-benefit"><i class="fas fa-check"></i> After-sales support guaranteed</div>
        </div>
      </div>
      <div class="quote-form-card reveal">
        <div class="form-steps">
          <div class="form-step active" data-step="1"></div>
          <div class="form-step" data-step="2"></div>
          <div class="form-step" data-step="3"></div>
        </div>
        <form id="quoteForm" action="submit_quote.php" method="POST" enctype="multipart/form-data">
          <p style="position:absolute;left:-9999px;" aria-hidden="true"><label>Leave this field blank: <input name="bot-field" tabindex="-1" autocomplete="off"></label></p>
          <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
          <div class="form-step-content active" data-step="1">
            <h3 style="color:white;font-size:18px;margin-bottom:20px">Your Information</h3>
            <div class="form-row">
              <div class="form-group">
                <label for="q-name">Full Name *</label>
                <input type="text" id="q-name" name="name" placeholder="Your name" maxlength="100" required>
              </div>
              <div class="form-group">
                <label for="q-company">Company Name *</label>
                <input type="text" id="q-company" name="company" placeholder="Company name" maxlength="100" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label for="q-email">Email *</label>
                <input type="email" id="q-email" name="email" placeholder="Email address" maxlength="150" required>
              </div>
              <div class="form-group">
                <label for="q-phone">Phone *</label>
                <input type="tel" id="q-phone" name="phone" placeholder="+91 XXXXX XXXXX" pattern="[0-9+\-\s()]{7,20}" maxlength="20" required>
              </div>
            </div>
            <div class="form-group">
              <label for="q-industry">Industry</label>
              <select id="q-industry" name="industry">
                <option value="">Select your industry</option>
                <option>Integrated Chemical Manufacturing</option>
                <option>Aluminium Manufacturing</option>
                <option>Copper Manufacturing</option>
                <option>Chemical Manufacturing</option>
                <option>Plasticizers &amp; Polymer Compounds Manufacturing</option>
                <option>Global Medical Device Manufacturing</option>
                <option>Electrical Construction Material Manufacturing</option>
                <option>Technical Textile Manufacturing</option>
                <option>Diversified Natural Resource Companies</option>
                <option>Other</option>
              </select>
            </div>
            <div class="form-nav">
              <span></span>
              <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next <i class="fas fa-arrow-right"></i></button>
            </div>
          </div>
          <div class="form-step-content" data-step="2">
            <h3 style="color:white;font-size:18px;margin-bottom:20px">Project Requirements</h3>
            <div class="form-group">
              <label for="q-product">Product Requirement *</label>
              <select id="q-product" name="product" required>
                <option value="">Select product type</option>
                <option>Flat Belt Conveyor</option>
                <option>Inclined Belt Conveyor</option>
                <option>Truck Loading Conveyor</option>
                <option>Roller Conveyor</option>
                <option>Screw Conveyor</option>
                <option>Slat Chain Conveyor</option>
                <option>Wire Mesh Conveyor</option>
                <option>Bucket Elevator</option>
                <option>Pneumatic Conveying System</option>
                <option>Drum Filling Machine</option>
                <option>Tank Fabrication Work</option>
                <option>MS Trolley, Pallet &amp; Grating</option>
              </select>
            </div>
            <div class="form-group">
              <label for="q-description">Project Description</label>
              <textarea id="q-description" name="description" placeholder="Describe your requirements, material type, capacity needs, facility details..." maxlength="2000"></textarea>
            </div>
            <div class="form-nav">
              <button type="button" class="btn btn-outline" onclick="nextStep(1)"><i class="fas fa-arrow-left"></i> Back</button>
              <button type="button" class="btn btn-primary" onclick="nextStep(3)">Next <i class="fas fa-arrow-right"></i></button>
            </div>
          </div>
          <div class="form-step-content" data-step="3">
            <h3 style="color:white;font-size:18px;margin-bottom:20px">Upload &amp; Submit</h3>
            <div class="form-group">
              <label>Upload Drawing / PDF (Optional)</label>
              <label class="file-upload" for="fileInput">
                <i class="fas fa-cloud-upload-alt"></i>
                <p>Click to upload or drag &amp; drop<br><small>PDF, DWG, DXF, IMG (Max 10MB)</small></p>
                <input type="file" name="drawing" id="fileInput" accept=".pdf,.dwg,.dxf,.jpg,.png">
              </label>
            </div>
            <div class="form-group">
              <label for="q-contact_time">Preferred Contact Time</label>
              <select id="q-contact_time" name="contact_time">
                <option>Anytime</option>
                <option>Morning (9 AM - 12 PM)</option>
                <option>Afternoon (12 PM - 4 PM)</option>
                <option>Evening (4 PM - 7 PM)</option>
              </select>
            </div>
            <div class="form-nav">
              <button type="button" class="btn btn-outline" onclick="nextStep(2)"><i class="fas fa-arrow-left"></i> Back</button>
              <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Submit Inquiry</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>
