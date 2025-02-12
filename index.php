<?php include 'includes/db.php'; ?>
<?php include 'includes/navbar.php'; ?>

<?php include 'includes/categoryNav.php'; ?>

<section class="container">
   <!-- Scrolling Text -->
      <div class="scrolling-text-container mt-4 my-5">
        <div id="scrollingText" class="scrolling-text">
          🎉 Special Offer: Get 20% off on all products this week! 🎉
        </div>
      </div>

  <div class="row">
    <div class="col-lg-6 col-md-12">
          <h1 class="text-center">Welcome to JJ & Sons</h1>
          <p class="text-center">We are a family-owned business that has been serving the community for over 50 years. Our journey began with a simple vision: to provide high-quality products and exceptional customer service that you can trust.</p>
          <p class="text-center">At JJ & Sons, we believe in building long-term relationships with our customers. Our dedication to quality and innovation has earned us a loyal customer base, and we strive every day to continue serving with the same passion and commitment that we did when we first started.</p>
          <p class="text-center">Whether you're looking for personalized products, expert advice, or simply a friendly face to help with your needs, we are here for you. Explore our diverse range of products, and let us help you find exactly what you’re looking for. Thank you for choosing JJ & Sons!</p>
     
    </div>

   <div class="col-lg-4 col-md-6" style="cursor: pointer;">
  <!-- Image Swapping Section -->
   <h3 class="text-center">New Arrivals</h3>
  <div class="text-center position-relative">
    <img id="swappingImage" src="assets/images/sofa.jpg" alt="Image 1" class="img-fluid rounded transition-all" style="max-height: 400px;">

    <!-- Overlay with Title and Button -->
    <div class="overlay">
      <h4 id="imageTitle">Coffe Maker</h4> <!-- Title of the current image -->
      <button onclick="swapImage()" class="btn btn-lg shadow-lg">Next</button> <!-- Button with modern design -->
    </div>
  </div>
</div>



    <div class="col-lg-2 col-md-6">
      <!-- Buttons to Trigger Pop-ups -->
      <div class="d-flex flex-column gap-2">
        <h4 style="text-wrap:nowrap;">Alert, Confirm & Promp</h4>
        <button onclick="showAlert()" class="btn-home">Alert</button>
        <button onclick="showConfirm()" class="btn-home">Confirm</button>
        <button onclick="showPrompt()" class="btn-home">Prompt</button>
      </div>
    </div>
  </div>
</section>

<?php include './functions/products.php' ?>


<div class="container">
  <!-- Header and Arrows -->
  <div class="row align-items-center mb-3">
    <div class="col">
      <h1>Group Members</h1>
    </div>
    <div class="col text-end arrow">
      <button onclick="scrollCards('left')"><i class="bi bi-arrow-left-circle"></i></button>
      <button onclick="scrollCards('left')"><i class="bi bi-arrow-right-circle"></i></button>
      
      
    </div>
  </div>

  <!-- Horizontal Scrollable Cards -->
  <div class="cards-container py-5">
    <div class="cards-scroll" id="cardsScroll">
      <!-- Card 1 -->
      <div class="card">
        <img src="assets/images/shallom.jpg" class="card-img-top" alt="Jibriel Ismail">
        <div class="card-body">
          <h3>SHALOM ACQUAH</h3>
          <h5>PS/ITC/22/0248</h5>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="card">
        <img src="assets/images/fred.jpg" class="card-img-top" alt="Jibriel Ismail">
        <div class="card-body">
          <h3>FREDRICK DOGBATSEY</h3>
          <h5>PS/ITC/22/0130</h5>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="card">
        <img src="assets/images/ben.jpg" class="card-img-top" alt="Jibriel Ismail">
        <div class="card-body">
          <h3>BENEDICT QUAICOE</h3>
          <h5>PS/ITC/22/0051</h5>
        </div>
      </div>
      <!-- Card 4 -->
      <div class="card">
        <img src="assets/images/josh.jpg" class="card-img-top" alt="Jibriel Ismail">
        <div class="card-body">
          <h3>AGBENYEGAH JOSHUA</h3>
          <h5>PS/ITC/22/0245</h5>
        </div>
      </div>
      <!-- Card 5 -->
      <div class="card">
        <img src="assets/images/Ismail.jpg" class="card-img-top" alt="Jibriel Ismail">
        <div class="card-body">
          <h3>JIBRIEL ISMAIL</h3>
          <h5>PS/ITC/22/0012</h5>
        </div>
      </div>
      <!-- Card 6 -->
      <div class="card">
        <img src="assets/images/Ishamel.jpg" class="card-img-top" alt="Ishmael Botwe">
        <div class="card-body">
          <h3>ISHMAEL BOTWE</h3>
          <h5>PS/ITC/22/0135</h5>
        </div>
      </div>
      <!-- Card 7 -->
      <!-- <div class="card">
        <img src="assets/images/isma.jpg" class="card-img-top" alt="Jibriel Ismail">
        <div class="card-body">
          <h3>JIBRIEL ISMAIL</h3>
          <h5>PS/ITC/22/0012</h5>
        </div>
      </div> -->
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>