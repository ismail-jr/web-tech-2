<?php
// Include the sign-in logic file
include './functions/signin_handler.php';

// Include the navbar
include 'includes/navbar.php';
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="shadow-lg p-5">
        <h2 class="text-center mb-4">Sign In</h2>

        <!-- Display error messages -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Sign In Form -->
        <form action="signin.php" method="POST">
          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-envelope"></i></span>
              <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <?php if (isset($errors['email'])): ?>
                <small class="text-danger"><?php echo $errors['email']; ?></small>
            <?php endif; ?>
          </div>

          <!-- Password -->
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock"></i></span>
              <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <?php if (isset($errors['password'])): ?>
                <small class="text-danger"><?php echo $errors['password']; ?></small>
            <?php endif; ?>
          </div>

          <!-- Remember Me & Forgot Password -->
          <div class="d-flex justify-content-between mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="rememberMe" name="rememberMe">
              <label class="form-check-label" for="rememberMe">Remember Me</label>
            </div>
            <a href="#" class="text-decoration-none">Forgot Password?</a>
          </div>

          <!-- Sign In Button -->
          <button type="submit" class="btn btn-primary w-100">Sign In</button>
        </form>

        <!-- Sign Up Link -->
        <p class="text-center mt-3">Don't have an account? <a href="signup.php" class="text-decoration-none">Sign Up</a></p>
      </div>
    </div>
  </div>
</div>

<?php
// Include the footer
include 'includes/footer.php';
?>