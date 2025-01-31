<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}
include 'includes/navbar.php';
?>

<div class="container mt-5">
  <h1>Admin Dashboard</h1>
  <p>Welcome to the admin dashboard.</p>
  <a href="logout.php" class="btn btn-danger">Logout</a>

  <!-- CRUD Operations -->
  <div class="row mt-4">
    <div class="col-md-12">
      <h2>Manage Records</h2>
      <a href="add_record.php" class="btn btn-primary">Add Record</a>
      <a href="retrieve_records.php" class="btn btn-success">Retrieve Records</a>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>