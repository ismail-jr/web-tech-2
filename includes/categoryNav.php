<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>

  <!-- Bootstrap CSS -->
  <link href="bootstrap5/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    /* Navbar Styling */
    .shop-navbar {
      background: #fff;
      border-bottom: 2px solid #eee;
      padding: 10px 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .shop-navbar .nav-link {
      color: #000;
      font-size: 16px;
      font-weight: 500;
      padding: 8px 15px;
      transition: color 0.3s ease-in-out;
    }
    /* .shop-navbar .nav-link:hover, .shop-navbar .nav-link.active {
      color:#007bff;
    } */
    .cart-icon {
      position: relative;
    }
    .cart-count {
      position: absolute;
      top: -5px;
      right: -10px;
      background: red;
      color: white;
      font-size: 12px;
      font-weight: bold;
      width: 20px;
      height: 20px;
      text-align: center;
      border-radius: 50%;
    }
    .nav-co{
      padding-top: 200px;
    }
    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .shop-navbar {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }
      .shop-navbar .nav-link {
        font-size: 14px;
        padding: 6px 10px;
      }
      body{
        padding-top: 100px
      }
    }
  </style>
</head>
<body>

  <!-- Product Filter Navbar -->
  <nav class="navbar navbar-expand-lg shop-navbar py-5">
    <div class="container nav-co">
      
      <!-- Product Categories -->
      <div class="d-flex mx-auto">
        <a href="#" class="nav-link filter-category active" data-category="electronics">Electronics</a>
        <a href="#" class="nav-link filter-category" data-category="home-kitchen">Home & Kitchen</a>
        <a href="#" class="nav-link filter-category" data-category="clothing">Clothing</a>
      </div>

      <!-- Search Bar -->
      <form class="d-flex" id="searchForm">
        <input class="form-control me-2" type="search" placeholder="Search products..." id="searchInput">
        <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
      </form>

      <!-- Shopping Cart -->
      <a href="cart.php" class="nav-link cart-icon">
        <i class="bi bi-bag fs-4"></i>
        <span class="cart-count" id="cart-count">0</span>
      </a>

    </div>
  </nav>

  <!-- Bootstrap JS -->
  <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>
  
</body>
</html>
