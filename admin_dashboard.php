<?php
// Start the session
session_start();

// Include the database connection file
include './includes/db.php';

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: signin.php');
    exit();
}

// Fetch all products
$product_query = "SELECT p.product_id, p.name, p.description, p.price, p.image, c.name AS category_name 
                  FROM products p 
                  JOIN categories c ON p.category_id = c.category_id";
$product_result = $conn->query($product_query);

$products = [];
if ($product_result->num_rows > 0) {
    while ($row = $product_result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Fetch all categories
$category_query = "SELECT * FROM categories";
$category_result = $conn->query($category_query);

$categories = [];
if ($category_result->num_rows > 0) {
    while ($row = $category_result->fetch_assoc()) {
        $categories[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        /* Custom Navbar Styles */
        .custom-navbar {
            background-color: #343a40;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .custom-navbar .logo {
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
        }

        .custom-navbar .logo:hover {
            color: #f8f9fa;
        }

        .custom-navbar .logout-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        .custom-navbar .logout-btn:hover {
            background-color: #c82333;
        }

        /* Product Card Styles */
        .product-card {
            margin-bottom: 1.5rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-card .card-body {
            padding: 1rem;
        }

        .product-card .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .product-card .card-text {
            color: #555;
        }

        .product-card .btn-group {
            display: flex;
            gap: 0.5rem;
        }

        /* Footer Styles */
        .custom-footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
        }
        body{
            padding-top: 100px;
        }
    </style>
</head>
<body>
    <!-- Custom Navbar -->
    <nav class="custom-navbar fixed-top">
        <a href="index.php" class="logo">
            <i class="bi bi-house"></i> Homepage
        </a>
         <a href="admin_dashboard.php" class="logo">
            <i class="bi bi-database"></i> Admin Dashboard
        </a>
        <form action="logout.php" method="POST">
            <button type="submit" class="logout-btn">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Admin Dashboard</h1>

        <!-- Add Product Button -->
        <div class="text-center mb-4">
            <a href="add_product.php" class="btn btn-success">
                <i class="bi bi-plus"></i> Add Product
            </a>
        </div>

        <!-- Products Section -->
        <h2>Products</h2>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="product-card">
                        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                            <p class="card-text"><strong>Price:</strong> ₵<?php echo htmlspecialchars($product['price']); ?></p>
                            <p class="card-text"><strong>Category:</strong> <?php echo htmlspecialchars($product['category_name']); ?></p>
                            <div class="btn-group">
                                <a href="edit_product.php?id=<?php echo $product['product_id']; ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="delete_product.php?id=<?php echo $product['product_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Categories Table -->
        <h2>Categories</h2>
        <!-- Add Category Button -->
        <div class="text-center mb-4">
            <a href="add_category.php" class="btn btn-success">
                <i class="bi bi-plus"></i> Add Category
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($category['category_id']); ?></td>
                            <td><?php echo htmlspecialchars($category['name']); ?></td>
                            <td>
                                <a href="edit_category.php?id=<?php echo $category['category_id']; ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="delete_category.php?id=<?php echo $category['category_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="custom-footer">
        <p>&copy; 2023 Your Company. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>