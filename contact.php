
<?php include 'includes/navbar.php'; ?>

<div class="container mt-5">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center mb-4">Contact Us</h1>
      <p class="text-center">We’d love to hear from you! Whether you have a question, feedback, or just want to say hello, feel free to reach out to us via any of the methods below. Our team is ready to assist you!</p>
    </div>
  </div>

  <!-- Contact Methods -->
  <div class="row">
    <!-- Email Section -->
    <div class="col-md-4 text-center mb-4">
      <i class="bi bi-envelope fs-1 mb-3"></i>
      <h4>Email Us</h4>
      <p>Send us an email at <a href="mailto:info@jjandsons.com">info@jjandsons.com</a> and we’ll get back to you as soon as possible!</p>
    </div>

    <!-- Phone Section -->
    <div class="col-md-4 text-center mb-4">
      <i class="bi bi-telephone fs-1 mb-3"></i>
      <h4>Call Us</h4>
      <p>For urgent inquiries, give us a call at <a href="tel:+233599329539">+233 955 329 539</a>. Our team is available 9 AM - 6 PM (Mon - Fri).</p>
    </div>

    <!-- Address Section -->
    <div class="col-md-4 text-center mb-4">
      <i class="bi bi-geo-alt fs-1 mb-3"></i>
      <h4>Visit Us</h4>
      <p>Our office is located at 56 Nana Kwame St, Kumasi, Ghana. Feel free to stop by during business hours.</p>
    </div>
  </div>

  <!-- Contact Form -->
  <div class="row mt-5">
    <div class="col-12">
      <h3 class="text-center mb-4">Get in Touch</h3>
      <form action="#" method="POST">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" id="name" class="form-control" placeholder="Enter your name" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
          </div>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Your Message</label>
          <textarea id="message" class="form-control" rows="4" placeholder="Enter your message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-10">Send Message</button>
      </form>
    </div>
  </div>
</div>


<?php include 'includes/footer.php'; ?>