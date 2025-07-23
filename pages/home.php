<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: ../index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kamiseta</title>
  <link rel="stylesheet" href="../assets/css/bootstrapmin.css">
  <link rel="stylesheet" href="../assets/css/home.css" />
</head>
<body>

<!-- Header / Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid px-4">
    <a class="navbar-brand fw-bold" href="#">Kamiseta</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navLinks">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navLinks">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="#about">About Kamiseta</a></li>
        <li class="nav-item"><a class="nav-link" href="#payment">Payment</a></li>
        <li class="nav-item"><a class="nav-link" href="#shipping">Shipping</a></li>
        <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="#stores">Stores</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section
<section class="hero-section">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h1 class="display-4 fw-bold">Elegance in Every Thread</h1>
    <p class="lead">Explore modern takes on traditional Filipino wear</p>
    <a href="#stores" class="btn btn-primary mt-3">Shop Now</a>
  </div>
</section> -->
<!-- Hero Section with Video Background -->
<section class="hero-section position-relative">
  <video autoplay muted loop playsinline class="w-100 h-100 position-absolute object-fit-cover z-n1">
    <source src="../assets/vid/herobg.mp4" type="video/mp4" />
    Your browser does not support the video tag.
  </video>
  <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0,0,0,0.6); z-index: 0;"></div>
  <div class="hero-content position-relative text-center text-white d-flex flex-column align-items-center justify-content-center h-100">
    <h1 class="display-4 fw-bold">Elegance in Every Thread</h1>
    <p class="lead">Explore modern takes on traditional Filipino wear</p>
    <a href="#stores" class="btn btn-primary mt-3">Shop Now</a>
  </div>
</section>

<!-- Content Sections -->
<section id="about" class="p-5 text-center bg-light">
  <div class="container">
    <h2 class="mb-4">About Kamiseta</h2>
    <div class="row align-items-center">
      <div class="col-md-6">
        <img src="../assets/img/about.jpg" alt="About Kamiseta" class="img-fluid rounded">
      </div>
      <div class="col-md-6">
        <p class="fs-5">Kamiseta blends tradition with modern design to offer stylish, high-quality Barong Tagalog and Filipiniana garments. Each piece is handcrafted to celebrate Filipino culture with elegance and pride.</p>
      </div>
    </div>
  </div>
</section>

<section id="payment" class="p-5 text-white bg-dark">
  <div class="container">
    <h2 class="mb-4 text-center">Payment Options</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="p-4 border rounded bg-secondary">
          <h5>GCash</h5>
          <p>Secure and fast payment via GCash. Instructions will be sent upon checkout.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 border rounded bg-secondary">
          <h5>Bank Transfer</h5>
          <p>Pay directly to our bank account. Send your payment slip via email for confirmation.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 border rounded bg-secondary">
          <h5>Cash on Delivery</h5>
          <p>Available for select areas. Pay when your order arrives at your doorstep.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="shipping" class="p-5 text-center bg-light">
  <div class="container">
    <h2 class="mb-4">Shipping Information</h2>
    <p class="fs-5">We ship nationwide within the Philippines. Orders are processed within 2-3 business days and delivered via trusted couriers. Tracking info will be provided via email.</p>
    <img src="../assets/img/shipping.jpg" alt="Shipping" class="img-fluid rounded mt-4">
  </div>
</section>

<section id="faq" class="p-5 bg-dark text-white">
  <div class="container">
    <h2 class="mb-4 text-center">Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item bg-dark border-light">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
            How do I know my size?
          </button>
        </h2>
        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">We provide a size chart for each product. If unsure, contact us with your measurements for a custom recommendation.</div>
        </div>
      </div>
      <div class="accordion-item bg-dark border-light">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
            Do you offer custom sizes?
          </button>
        </h2>
        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">Yes, we accommodate custom sizing. Please reach out via the contact section before placing your order.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="contact" class="p-5 text-center bg-light">
  <div class="container">
    <h2 class="mb-4">Contact Us</h2>
    <p class="fs-5">Got questions or feedback? Reach out to us via our channels below.</p>
    <div class="row justify-content-center">
      <div class="col-md-4">
        <p><strong>Email:</strong> support@kamiseta.com</p>
        <p><strong>Phone:</strong> +63 912 345 6789</p>
        <p><strong>Facebook:</strong> Kamiseta Clothing</p>
      </div>
    </div>
  </div>
</section>

<section id="stores" class="p-5 text-white bg-dark">
  <div class="container">
    <h2 class="mb-4 text-center">Our Stores</h2>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="bg-secondary p-4 rounded">
          <h5>Metro Manila</h5>
          <p>2nd Floor, SM Megamall Building B, Mandaluyong City</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="bg-secondary p-4 rounded">
          <h5>Cebu</h5>
          <p>Ayala Center Cebu, Cebu Business Park, Cebu City</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="text-center text-white bg-black py-4">
  <div class="mb-2">
    <a href="#about" class="text-white me-3">About Kamiseta</a>
    <a href="#payment" class="text-white me-3">Payment</a>
    <a href="#shipping" class="text-white me-3">Shipping</a>
    <a href="#faq" class="text-white me-3">FAQ</a>
    <a href="#contact" class="text-white me-3">Contact Us</a>
    <a href="#stores" class="text-white">Stores</a>
  </div>
  <div class="mb-2">
    <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i> Facebook</a>
    <a href="#" class="text-white"><i class="bi bi-instagram"></i> Instagram</a>
  </div>
  <div>
    &copy; Kamiseta 2021 - All Rights Reserved - Custom <span class="crafted">Crafted</span> by OneClickTech
  </div>
</footer>

<script src="../assets/js/bootstrapmin.js"></script>
<script>
    // for the smooth section snap
document.querySelectorAll('a.nav-link').forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    const targetId = this.getAttribute('href');
    const targetEl = document.querySelector(targetId);
    if (targetEl) {
      window.scrollTo({
        top: targetEl.offsetTop,
        behavior: 'smooth'
      });
    }
  });
});
</script>

</body>
</html>
