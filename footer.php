<!-- FOOTER -->
<footer class="footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="index.php" class="logo">
          <img src="images/logo.png" alt="TechMech Engineering" style="height: 60px; width: auto;">
        </a>
        <p>Engineering efficient material handling solutions for industries across India. 10+ years of experience in designing and manufacturing conveyor systems.</p>
        <div class="footer-social">
          <a href="https://youtube.com/@techmechengineering-1" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <div>
        <h4>Products</h4>
        <div class="footer-links">
          <a href="index.php#products">Flat Belt Conveyor</a>
          <a href="index.php#products">Inclined Belt Conveyor</a>
          <a href="index.php#products">Truck Loading Conveyor</a>
          <a href="index.php#products">Roller Conveyors</a>
          <a href="index.php#products">Screw Conveyor</a>
          <a href="index.php#products">Slat Chain Conveyor</a>
          <a href="index.php#products">Wire Mesh Conveyor</a>
          <a href="index.php#products">Bucket Elevator</a>
          <a href="index.php#products">Pneumatic Conveying System</a>
          <a href="index.php#products">Drum Filling Machine</a>
          <a href="index.php#products">Tank Fabrication Work</a>
          <a href="index.php#products">MS Trolley, Pallet &amp; Grating</a>
        </div>
      </div>
      <div>
        <h4>Company</h4>
        <div class="footer-links">
          <a href="about.php">About Us</a>
          <a href="index.php#industries">Industries</a>
          <a href="index.php#blog">Blog</a>
          <a href="index.php#faq">FAQ</a>
          <a href="contact.php">Contact</a>
        </div>
      </div>
      <div>
        <h4>Resources</h4>
        <div class="footer-links">
          <a href="quote.php">Request Quote</a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; <?php echo date('Y'); ?> TechMech Engineering. All rights reserved.</p>
    </div>
  </div>
</footer>

<!-- FLOATING BUTTONS -->
<div class="floating-btns">
  <a href="https://wa.me/919512696191" target="_blank" rel="noopener noreferrer" class="float-btn float-whatsapp" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
  <a href="tel:+919512696191" class="float-btn float-call" title="Call Us"><i class="fas fa-phone-alt"></i></a>
  <a href="mailto:techmechengineering1@gmail.com" class="float-btn float-email" title="Email"><i class="fas fa-envelope"></i></a>
  <button class="float-btn float-top" id="backToTop" onclick="window.scrollTo({top:0,behavior:'smooth'})" title="Back to Top" aria-label="Back to top"><i class="fas fa-chevron-up"></i></button>
</div>

<?php if ($currentPage === 'home'): ?>
<!-- PRODUCT MODAL -->
<div class="modal-overlay" id="productModal">
  <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
    <button class="modal-close" onclick="closeModal()" aria-label="Close dialog"><i class="fas fa-times"></i></button>
    <h2 id="modalTitle">Product Name</h2>
    <p class="modal-subtitle" id="modalSubtitle">Product overview</p>
    <div id="modalContent"></div>
    <div class="modal-cta">
      <a href="#quote" class="btn btn-primary" onclick="closeModal()"><i class="fas fa-file-invoice"></i> Request Quote for This Product</a>
    </div>
  </div>
</div>

<!-- LEAD POPUP -->
<div class="lead-popup" id="leadPopup" role="dialog" aria-modal="true" aria-labelledby="leadPopupTitle">
  <button class="lead-popup-close" onclick="document.getElementById('leadPopup').classList.remove('active')" aria-label="Close popup"><i class="fas fa-times"></i></button>
  <h3 id="leadPopupTitle">Need Help Choosing?</h3>
  <p>Get a free consultation from our engineering team. We'll help you find the perfect solution.</p>
  <label for="leadPopupEmail" style="position:absolute;left:-9999px;">Email address</label>
  <input type="email" id="leadPopupEmail" placeholder="Enter your email">
  <button class="btn btn-primary" style="width:100%;justify-content:center" onclick="document.getElementById('leadPopup').classList.remove('active')">Get Free Consultation</button>
</div>
<?php endif; ?>

<script>
// Header scroll
const header = document.querySelector('.header'), backToTop = document.getElementById('backToTop');
window.addEventListener('scroll', () => {
  header.classList.toggle('scrolled', window.scrollY > 50);
  if (backToTop) backToTop.classList.toggle('visible', window.scrollY > 600);
});

// Reveal on scroll
const reveals = document.querySelectorAll('.reveal');
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach((entry, i) => {
    if (entry.isIntersecting) {
      setTimeout(() => entry.target.classList.add('active'), i * 80);
      revealObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
reveals.forEach(el => revealObserver.observe(el));

// Counter animation
const counters = document.querySelectorAll('[data-count]');
const counterObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const el = entry.target;
      const target = parseInt(el.dataset.count);
      let current = 0;
      const increment = target / 60;
      const timer = setInterval(() => {
        current += increment;
        if (current >= target) { current = target; clearInterval(timer); }
        el.textContent = Math.floor(current) + '+';
      }, 25);
      counterObserver.unobserve(el);
    }
  });
}, { threshold: 0.5 });
counters.forEach(el => counterObserver.observe(el));

// FAQ
function toggleFaq(el) {
  const item = el.parentElement;
  const wasActive = item.classList.contains('active');
  document.querySelectorAll('.faq-item').forEach(i => {
    i.classList.remove('active');
    i.querySelector('.faq-answer').style.maxHeight = '0';
    i.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
  });
  if (!wasActive) {
    item.classList.add('active');
    const answer = item.querySelector('.faq-answer');
    answer.style.maxHeight = answer.scrollHeight + 'px';
    el.setAttribute('aria-expanded', 'true');
  }
}

// Keyboard support for div-based interactive controls (role="button")
document.addEventListener('keydown', function(e) {
  if ((e.key === 'Enter' || e.key === ' ') && e.target.matches('[role="button"]')) {
    e.preventDefault();
    e.target.click();
  }
});

// Escape closes modal / lead popup
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    if (typeof closeModal === 'function') closeModal();
    const popup = document.getElementById('leadPopup');
    if (popup) popup.classList.remove('active');
  }
});

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', function(e) {
    const target = document.querySelector(this.getAttribute('href'));
    if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth' }); }
  });
});

<?php if ($currentPage === 'home'): ?>
// Product modal
const products = [
  {name:'Flat Belt Conveyor',desc:'PVC/PU/Rubber belt conveyor with variable speed control, customizable load capacity and adjustable frame height.',features:['Belt Type: PVC / PU / Rubber','Belt Width: 100 mm to 2000 mm','Belt Speed: 5 to 60 m/min (Variable)','Load Capacity: Up to 200 kg/m (Customizable)','Conveyor Length: 1 m to 30 m','Height: 700 mm to 1000 mm (Adjustable)','Frame: MS Powder Coated / SS304 / Aluminum','Motor Power: 0.25 HP to 3 HP','Voltage: 220V / 415V, 3 Phase','Drive Type: Head / Center / End Drive']},
  {name:'Inclined Belt Conveyor',desc:'Designed for elevation changes in production lines, featuring adjustable inclination angles from 15° to 60° with cleated belt options.',features:['Belt Width: 200 mm to 1200 mm','Inclination Angle: 15° to 45° (up to 60° with cleats)','Belt Speed: 5 to 40 m/min','Load Capacity: Up to 1500 kg/m','Conveyor Length: 2 m to 25 m','Frame: MS Powder Coated / SS304','Motor Power: 0.5 HP to 5 HP','Drive Type: Bottom Drive / Top Drive','Cleat Height: 20 mm to 100 mm']},
  {name:'Truck Loading Conveyor',desc:'Height-adjustable conveyor system designed for efficient truck and container loading/unloading operations.',features:['Belt Type: PVC / Rubber / Rough Top','Belt Width: 400 mm to 1000 mm','Conveyor Length: 6 m to 15 m','Height Adjustment: 800 mm to 3000 mm','Inclination Angle: 0° to 30°','Load Capacity: Up to 150 kg/m','Belt Speed: 10 to 45 m/min','Motor Power: 0.5 HP to 3 HP']},
  {name:'Roller Conveyors',desc:'Complete range of gravity and powered roller conveyors for smooth material flow.',features:['Gravity Roller — Roller Diameter: 50 mm to 102 mm','Roller Material: MS / SS / PVC','Conveyor Width: 300 mm to 1500 mm','Conveyor Length: 2 m to 30 m','Load Capacity: Up to 300 kg/m','Powered Speed: 10 to 60 m/min','Drive Type: Chain Drive / Belt Drive','Motor Power: 0.5 HP to 5 HP','Control System: PLC / VFD (Optional)']},
  {name:'Screw Conveyor',desc:'Precision-engineered screw conveyors for handling powders, granules and semi-solid materials.',features:['Screw Diameter: 100 mm to 600 mm','Capacity: Up to 100 TPH','Conveyor Length: 1 m to 25 m','Inclination Angle: 0° to 45°','Screw Pitch: Equal / Variable Pitch','Rotation Speed: 20 to 150 RPM','Material: MS / SS304 / SS316','Motor Power: 1 HP to 15 HP']},
  {name:'Slat Chain Conveyor',desc:'Robust slat chain conveyor systems built for heavy loads, high temperatures and demanding industrial environments.',features:['Slat Material: MS / SS / Plastic','Chain Type: Roller Chain / Conveyor Chain','Slat Width: 200 mm to 1500 mm','Conveyor Length: 2 m to 40 m','Load Capacity: Up to 500 kg/m','Speed: 3 to 30 m/min']},
  {name:'Wire Mesh Conveyor',desc:'Stainless steel wire mesh belt conveyors designed for high-temperature applications.',features:['Belt Type: SS Wire Mesh','Belt Width: 200 mm to 2000 mm','Conveyor Length: 2 m to 30 m','Load Capacity: Up to 100 kg/m','Operating Temperature: Up to 800°C']},
  {name:'Bucket Elevator',desc:'Vertical material handling solutions for efficient lifting of bulk materials across multiple floor levels.',features:['Bucket Type: Plastic / MS / SS','Bucket Capacity: 1 L to 20 L','System Capacity: Up to 200 TPH','Elevator Height: Up to 30 meters','Motor Power: 2 HP to 20 HP','Drive Type: Top Drive / Bottom Drive']},
  {name:'Pneumatic Conveying System',desc:'Complete pneumatic conveying solutions for powder and granule transport with integrated heating and cooling capabilities.',features:['Conveying Capacity: 0.5 TPH to 30 TPH','Conveying Distance: Up to 150 meters','Air Velocity: 15 to 25 m/s','Working Pressure: 0.5 to 2 bar','Temperature Range: Heating up to 200°C / Cooling down to 10°C','Pipeline Diameter: 50 mm to 250 mm','Control System: PLC with Temperature Control']},
  {name:'Drum Filling Machine',desc:'Semi-automatic and automatic drum filling systems with PLC-HMI control for precise filling.',features:['Filling Capacity: 50 L to 1000 L','Filling Accuracy: ±0.1% to ±0.5%','Control System: PLC with HMI','Semi-Automatic Drum Filling Machine','Automatic Drum Filling Machine','Gravimetric (Weighing Type)','Flow Meter Type']},
  {name:'Tank Fabrication Work',desc:'Custom tank fabrication from 100 liters to 5000+ liters in various materials.',features:['Capacity: 100 Liters to 5000+ Liters','Material Thickness: 2 mm to 20 mm','Design Type: Vertical / Horizontal','Finish: Mirror / Matte / Painted','Welding: TIG / MIG / ARC','Materials: MS, SS304, SS316, SA516, Special Alloys']},
  {name:'MS Trolley, Pallet & Grating',desc:'Complete range of MS trolleys, heavy-duty pallets and industrial grating solutions.',features:['MS Trolley: Platform / Cage / Heavy Duty / Custom','MS Pallet: Heavy Duty / Stackable / 2-way & 4-way Entry','MS Grating: Welded / Press Lock / Hot Dip Galvanized / Anti-Skid','Custom Fabrication Available','Industrial Grade Construction','Corrosion Resistant Options']}
];
function openProductModal(idx) {
  const p = products[idx];
  document.getElementById('modalTitle').textContent = p.name;
  document.getElementById('modalSubtitle').textContent = p.desc;
  let html = '';
  // Add product images if available
  if (idx === 11) {
    // MS Trolley, Pallet & Grating - show image
    html += '<div style="margin-bottom:16px;">';
    html += '<img src="images/ms-trolley-pallet-grating.jpg" alt="MS Trolley, Pallet & Grating" style="width:100%;height:160px;object-fit:contain;border-radius:8px;">';
    html += '</div>';
  }
  html += '<div class="modal-features">';
  p.features.forEach(f => { html += '<div class="modal-feature"><i class="fas fa-check-circle"></i> ' + f + '</div>'; });
  html += '</div>';
  document.getElementById('modalContent').innerHTML = html;
  document.getElementById('productModal').classList.add('active');
  document.body.style.overflow = 'hidden';
}
function closeModal() {
  document.getElementById('productModal').classList.remove('active');
  document.body.style.overflow = '';
}
document.getElementById('productModal').addEventListener('click', function(e) {
  if (e.target === this) closeModal();
});

// Multi-step quote form
function nextStep(step) {
  const current = document.querySelector('.form-step-content.active');
  const currentNum = parseInt(current.dataset.step, 10);
  if (step > currentNum) {
    const invalid = current.querySelector(':invalid');
    if (invalid) { invalid.reportValidity(); invalid.focus(); return; }
  }
  document.querySelectorAll('.form-step-content').forEach(el => el.classList.remove('active'));
  document.querySelectorAll('.form-step').forEach(el => el.classList.remove('active'));
  document.querySelector('.form-step-content[data-step="' + step + '"]').classList.add('active');
  for (let i = 1; i <= step; i++) document.querySelector('.form-step[data-step="' + i + '"]').classList.add('active');
}
// Blog filter
function filterCategory(el, cat) {
  document.querySelectorAll('.blog-cat').forEach(c => c.classList.remove('active'));
  el.classList.add('active');
  document.querySelectorAll('.blog-card').forEach(card => {
    card.style.display = (cat === 'all' || card.dataset.category === cat) ? '' : 'none';
  });
}
function filterBlog() {
  const q = document.getElementById('blogSearch').value.toLowerCase();
  document.querySelectorAll('.blog-card').forEach(card => {
    card.style.display = card.textContent.toLowerCase().includes(q) ? '' : 'none';
  });
}

// Lead popup
setTimeout(() => {
  if (!sessionStorage.getItem('popupShown')) {
    document.getElementById('leadPopup').classList.add('active');
    sessionStorage.setItem('popupShown', '1');
  }
}, 15000);

// YouTube feed
(function initYouTubeSection() {
  var videos = [
    {id:'KmxRfLqYjeQ', title:'TechMech Engineering - Conveyor Solutions', date:'Latest', thumb:'https://i.ytimg.com/vi/KmxRfLqYjeQ/hqdefault.jpg'},
    {id:'0QjaPs3cJGA', title:'SS Packing Conveyors — Efficient Product Handling & Packaging', date:'Jun 23, 2026', thumb:'https://i1.ytimg.com/vi/0QjaPs3cJGA/hqdefault.jpg'},
    {id:'kNnnrBMrolc', title:'Paper Bundle Feeding Roller Conveyor Table', date:'May 12, 2026', thumb:'https://i4.ytimg.com/vi/kNnnrBMrolc/hqdefault.jpg'},
    {id:'fEwxzve1USs', title:'Inclined Belt Conveyor Manufacturer — Heavy Duty', date:'May 8, 2026', thumb:'https://i3.ytimg.com/vi/fEwxzve1USs/hqdefault.jpg'},
    {id:'umUJMQdalDs', title:'Screw Flights for Conveyors — Pressed MS / SS', date:'Apr 29, 2026', thumb:'https://i2.ytimg.com/vi/umUJMQdalDs/hqdefault.jpg'},
    {id:'v4Y85xf1ASA', title:'PVC Belt Conveyor — 12 Meter, 900mm Width', date:'Apr 24, 2026', thumb:'https://i3.ytimg.com/vi/v4Y85xf1ASA/hqdefault.jpg'},
    {id:'n707KEuxoMI', title:'Industrial Conveyor Manufacturing', date:'Apr 23, 2026', thumb:'https://i3.ytimg.com/vi/n707KEuxoMI/hqdefault.jpg'},
    {id:'T4w5u_IrI-Q', title:'PVC Belt Conveyor — 12m Length, 900mm Width', date:'Apr 17, 2026', thumb:'https://i1.ytimg.com/vi/T4w5u_IrI-Q/hqdefault.jpg'},
    {id:'w6ulF8jaI2I', title:'BNI Meeting', date:'Apr 17, 2026', thumb:'https://i4.ytimg.com/vi/w6ulF8jaI2I/hqdefault.jpg'},
    {id:'jMSGGPN9eLg', title:'Customised Material Handling Trolleys for Textile Industry', date:'Apr 13, 2026', thumb:'https://i2.ytimg.com/vi/jMSGGPN9eLg/hqdefault.jpg'},
    {id:'f8xL8YTHY7w', title:'Z-Type Cleated Belt Conveyor with Vibro Hopper Installation', date:'Apr 12, 2026', thumb:'https://i2.ytimg.com/vi/f8xL8YTHY7w/hqdefault.jpg'}
  ];
  var sidebar = document.getElementById('ytSidebar');
  if (!sidebar) return;
  var html = '';
  videos.forEach(function(v, i) {
    var isFirst = i === 0;
    var activeClass = isFirst ? ' active' : '';
    html += '<div class="yt-thumb' + activeClass + '" onclick="changeVideo(\'' + v.id + '\', this)">';
    html += '<img src="' + v.thumb + '" alt="' + v.title.replace(/"/g, '&quot;') + '" style="width:80px;height:60px;object-fit:cover;border-radius:6px;flex-shrink:0;">';
    html += '<div style="flex:1;min-width:0;">';
    html += '<span class="yt-thumb-label">' + v.title + '</span>';
    html += '<div style="font-size:11px;color:var(--secondary);margin-top:4px;">' + v.date + '</div>';
    html += '</div></div>';
  });
  sidebar.innerHTML = html;
})();
function changeVideo(videoId, element) {
  document.getElementById('featuredFrame').src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&si=Fd1ZWXZArsZbtnhO';
  document.querySelectorAll('.yt-thumb').forEach(function(thumb) {
    thumb.style.background = '';
    thumb.style.borderColor = '';
    thumb.classList.remove('active');
  });
  element.style.background = 'var(--primary-light)';
  element.style.borderColor = 'var(--primary)';
  element.classList.add('active');
}
<?php endif; ?>
</script>

</body>
</html>
