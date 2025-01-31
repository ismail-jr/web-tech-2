<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JJ & Sons</title>

  <!-- Bootstrap CSS -->
  <link href="bootstrap5/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="assets/images/logo3.png" alt="logo">
      </a>

      <!-- Toggle Button for Small Screens -->
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
        <i class="bi bi-list"></i> <!-- Bootstrap menu icon -->
      </button>

      <!-- Normal Navbar for Larger Screens -->
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="index.php">Home <span >|</span>  </a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About <span>|</span></a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact <span>|</span></a></li>
          <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Offcanvas Menu for Small Screens -->
  <div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="offcanvasNavbar">
    <div class="offcanvas-header">
     
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
      </ul>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>

</body>
</html>
