<?php
// Start the session
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: signin.php');
    exit();
}

// Include the database connection file
include './includes/db.php';

// Ensure the uploads directory exists
$upload_dir = "uploads/";
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

// Fetch all categories for the dropdown
$category_query = "SELECT * FROM categories";
$category_result = $conn->query($category_query);

$categories = [];
if ($category_result->num_rows > 0) {
    while ($row = $category_result->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $description = htmlspecialchars(trim($_POST['description']));
    $price = floatval($_POST['price']);
    $category_id = intval($_POST['category_id']);
    $image_path = "";

    // Check if a file was uploaded
    if (!empty($_FILES['image']['name'])) {
        $target_file = $upload_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate file type (only allow jpg, png, gif)
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowed_types)) {
            echo "<script>alert('Invalid file type. Only JPG, PNG, and GIF are allowed.');</script>";
        } else {
            // Move uploaded file to the target directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_path = $target_file; // Save path to store in the database
            } else {
                echo "<script>alert('Error uploading file.');</script>";
            }
        }
    }

    // Insert the new product into the database if the image was uploaded successfully
    if ($image_path !== "") {
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, category_id, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdis", $name, $description, $price, $category_id, $image_path);

        if ($stmt->execute()) {
            header('Location: admin_dashboard.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        /* Custom Footer Styles */
        .custom-footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 1rem;
            position: fixed;
            bottom: 0px;
            width: 100%;
            height: 50px;
        }
        label {
            color: rgb(228, 231, 234);
            font-size: 18px;
            font-weight: 500;
        }

        /* Form Container Styles */
        .form-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 1rem;
            background-color: rgb(96, 107, 117);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        body{
            padding-top: 100px
        }
    </style>
</head>
<body>
    <!-- Custom Navbar -->
    <nav class="custom-navbar fixed-top">
        <a href="admin_dashboard.php" class="logo">Admin Dashboard</a>
    </nav>

    <!-- Form Container -->
    <section class="py-5"> 
        <div class="form-container">
            <h1 class="text-center mb-4 text-white">Add Product</h1>
            <form action="add_product.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['category_id']; ?>">
                                <?php echo htmlspecialchars($category['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>

        <!-- Custom Footer -->
        <footer class="custom-footer mt-5">
            <p>&copy; 2025 Your Company. All rights reserved.</p>
        </footer>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
