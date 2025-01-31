<?php session_start(); ?>
<?php include 'includes/navbar.php'; ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="shadow-lg p-5">
        <h2 class="text-center mb-4">Create an Account</h2>
        
        <!-- Display Error / Success Messages -->
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
            unset($_SESSION['success']);
        }
        ?>

        <!-- Register Form -->
        <form action="" method="POST">
          <!-- Full Name -->
          <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person"></i></span>
              <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter your full name" required>
            </div>
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-envelope"></i></span>
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
          </div>

          <!-- Password -->
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock"></i></span>
              <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
          </div>

          <!-- Confirm Password -->
          <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
              <input type="password" id="confirmPassword" name="confirm_password" class="form-control" placeholder="Re-enter your password" required>
            </div>
          </div>

          <!-- Terms & Conditions Checkbox -->
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="agreeTerms" name="agree_terms" required>
            <label class="form-check-label" for="agreeTerms">I agree to the Terms & Conditions</label>
          </div>

          <!-- Register Button -->
          <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>

        <!-- Sign In Link -->
        <p class="text-center mt-3">Already have an account? <a href="signin.php" class="text-decoration-none">Sign In</a></p>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
