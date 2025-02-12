<?php
// Get the selected category from the URL or set 'all' if no category is selected
$category_filter = isset($_GET['category']) ? $_GET['category'] : 'all';

// Base query to fetch products
$query = "SELECT p.product_id, p.name, p.description, p.price, p.image, c.name AS category_name 
          FROM products p 
          JOIN categories c ON p.category_id = c.category_id";

if ($category_filter !== 'all') {
    $query .= " WHERE c.name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $category_filter);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query($query);
}

// Fetch products
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
    <link rel="stylesheet" href="css/product.css"> <!-- External CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"> <!-- Bootstrap Icons -->
</head>
<body>

<div class="container">
    <header>
        <h1>Shop Our Collection</h1>
    </header>

    <main class="product-container">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <span class="category-badge"><?php echo htmlspecialchars($product['category_name']); ?></span>
                    <div class="product-info">
                        <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                        <p class="description"><?php echo htmlspecialchars($product['description']); ?></p>
                        <p class="price">₵<?php echo htmlspecialchars($product['price']); ?></p>
                        <button class="add-to-cart" 
                            data-id="<?php echo $product['product_id']; ?>"
                            data-name="<?php echo htmlspecialchars($product['name']); ?>"
                            data-price="<?php echo htmlspecialchars($product['price']); ?>"
                            data-image="<?php echo htmlspecialchars($product['image']); ?>">
                           <a href="cart.php" style="text-decoration:none; color:white;"> <i class="bi bi-bag fs-4"></i> Add to Bag</a>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-products">No products found.</p>
        <?php endif; ?>
    </main>
</div>

<script src="bootstrap5/js/bootstrap.bundle.min.js"></script>

</body>
</html>
