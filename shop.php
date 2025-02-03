<?php
include 'includes/db.php';

// Default SQL query
$sql = "SELECT * FROM products WHERE 1=1"; 

// Apply category filter
if (isset($_GET['category'])) {
    $category = htmlspecialchars($_GET['category']);
    $sql .= " AND category = '$category'";
}

// Apply search filter
if (isset($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);
    $sql .= " AND (name LIKE '%$search%' OR description LIKE '%$search%')";
}

$result = $conn->query($sql);
?>

<div class="container mt-4">
    <div class="row">
        <?php while ($product = $result->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" class="card-img-top">
                    <div class="card-body">
                        <h5><?php echo htmlspecialchars($product['name']); ?></h5>
                        <p><?php echo htmlspecialchars($product['description']); ?></p>
                        <strong>₵<?php echo htmlspecialchars($product['price']); ?></strong>

                        <!-- Add to Cart Button -->
                        <button class="btn btn-primary add-to-cart" data-id="<?php echo $product['id']; ?>">
                            <i class="bi bi-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
