<?php

// Get the selected category from the URL or set 'all' if no category is selected
$category_filter = isset($_GET['category']) ? $_GET['category'] : 'all';

// Base query to fetch products
$query = "SELECT p.product_id, p.name, p.description, p.price, p.image, c.name AS category_name 
          FROM products p 
          JOIN categories c ON p.category_id = c.category_id";

// Add filtering if a specific category is selected
if ($category_filter !== 'all') {
    $query .= " WHERE c.name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $category_filter);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query($query);
}

// Fetch the products
$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        span {
            font-size: 20px;
            font-weight: 400;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <!-- Category Navbar -->

    <div class="container mt-5">
        <h3 class="mb-5">Latest & Greatest</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col">
                        <div class="card h-100 shadow">
                            <!-- Product Image -->
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <div class="card-body">
                                <!-- Product Name -->
                                <h5 class="card-title">
                                    <span><?php echo htmlspecialchars($product['name']); ?></span>
                                </h5>
                                <!-- Product Description -->
                                <p class="card-text" style="padding-top:5px;"><?php echo htmlspecialchars($product['description']); ?></p>
                                <!-- Product Price -->
                                <p class="card-text">
                                    <strong>Price:</strong> $<?php echo htmlspecialchars($product['price']); ?>
                                </p>
                                <!-- Add to Cart Button -->
                                <button class="btn btn-primary w-100">
                                    <i class="bi bi-cart"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col">
                    <div class="alert alert-warning text-center" role="alert">
                        No products found.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
