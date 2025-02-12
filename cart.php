<!-- cart.php -->
<?php


// Sample cart data (replace with your actual cart logic)
$cart_items = [
    [
        'id' => 1,
        'name' => 'Everyday perfume',
        'image' => 'assets/images/perfume.jpg',
        'price' => 150.00,
        'quantity' => 2,
    ],
    [
        'id' => 2,
        'name' => 'Coffee Maker',
        'image' => 'assets/images/coffeemaker.jpg',
        'price' => 130.00,
        'quantity' => 1,
    ],
];

// Calculate total cost
$total_cost = 0;
foreach ($cart_items as $item) {
    $total_cost += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart - JJ & Sons</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

       

        .cart-item {
            background-color: #fff;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }

        .cart-item .details {
            flex-grow: 1;
            margin-left: 1.5rem;
        }

        .cart-item .quantity {
            display: flex;
            align-items: center;
        }

        .cart-item .quantity input {
            width: 60px;
            text-align: center;
            margin: 0 0.5rem;
        }

        .cart-summary {
            background-color: #fff;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-summary h3 {
            margin-bottom: 1.5rem;
        }

        .cart-summary .total {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .btn-checkout {
            background-color: #000;
            color: #fff;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 25px;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-checkout:hover {
            background-color: #333;
        }

        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .cart-item img {
                margin-bottom: 1rem;
            }

            .cart-item .details {
                margin-left: 0;
            }

            .cart-item .quantity {
                margin-top: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar (Include your navbar here) -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Cart Page Content -->
    <div class="container py-5">
        <h1 class="mb-4">Your Bag</h1>

        <!-- Cart Items -->
        <div class="cart-items">
            <?php if (empty($cart_items)): ?>
                <div class="alert alert-info" role="alert">
                    Your cart is empty. <a href="index.php" class="alert-link">Continue shopping</a>.
                </div>
            <?php else: ?>
                <?php foreach ($cart_items as $item): ?>
                    <div class="cart-item d-flex align-items-center">
                        <!-- Product Image -->
                        <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">

                        <!-- Product Details -->
                        <div class="details">
                            <h5><?php echo $item['name']; ?></h5>
                            <p class="text-muted">$<?php echo number_format($item['price'], 2); ?></p>
                        </div>

                        <!-- Quantity Selector -->
                        <div class="quantity">
                            <button class="btn btn-outline-secondary btn-sm" onclick="updateQuantity(<?php echo $item['id']; ?>, 'decrease')">-</button>
                            <input type="text" value="<?php echo $item['quantity']; ?>" readonly>
                            <button class="btn btn-outline-secondary btn-sm" onclick="updateQuantity(<?php echo $item['id']; ?>, 'increase')">+</button>
                        </div>

                        <!-- Remove Button -->
                        <button class="btn btn-danger btn-sm ms-3" onclick="removeItem(<?php echo $item['id']; ?>)">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Cart Summary -->
        <div class="cart-summary mt-4">
            <h3>Order Summary</h3>
            <div class="d-flex justify-content-between">
                <span>Subtotal</span>
                <span>$<?php echo number_format($total_cost, 2); ?></span>
            </div>
            <div class="d-flex justify-content-between">
                <span>Shipping</span>
                <span>Free</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between total">
                <span>Total</span>
                <span>$<?php echo number_format($total_cost, 2); ?></span>
            </div>
            <button class="btn-checkout">Checkout</button>
        </div>
    </div>
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        function updateQuantity(itemId, action) {
            // Implement logic to update quantity in the cart
            console.log(`Updating item ${itemId}: ${action}`);
        }

        function removeItem(itemId) {
            // Implement logic to remove item from the cart
            console.log(`Removing item ${itemId}`);
        }
    </script>
      <script src="bootstrap5/js/bootstrap.bundle.min.js"></script>

</body>
</html>