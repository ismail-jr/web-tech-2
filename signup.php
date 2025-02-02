<?php
// Include the form logic file
include './functions/signup_handler.php';

// Include the navbar
include 'includes/navbar.php';
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="shadow-lg p-5">
        <h2 class="text-center mb-4">Create an Account</h2>

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

        <!-- Register Form -->
        <form action="signup.php" method="POST">
          <div class="row">
            <!-- Full Name -->
            <div class="col-md-6 mb-3">
              <label for="full_name" class="form-label">Full Name</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Enter your full name" value="<?php echo htmlspecialchars($full_name); ?>" required>
              </div>
              <?php if (isset($errors['full_name'])): ?>
                  <small class="text-danger"><?php echo $errors['full_name']; ?></small>
              <?php endif; ?>
            </div>

            <!-- Email -->
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label">Email Address</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="<?php echo htmlspecialchars($email); ?>" required>
              </div>
              <?php if (isset($errors['email'])): ?>
                  <small class="text-danger"><?php echo $errors['email']; ?></small>
              <?php endif; ?>
            </div>

            <!-- Phone -->
            <div class="col-md-6 mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-phone"></i></span>
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" value="<?php echo htmlspecialchars($phone); ?>" required>
              </div>
              <?php if (isset($errors['phone'])): ?>
                  <small class="text-danger"><?php echo $errors['phone']; ?></small>
              <?php endif; ?>
            </div>

            <!-- Address -->
            <div class="col-md-6 mb-3">
              <label for="address" class="form-label">Address</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                <input type="text" id="address" name="address" class="form-control" placeholder="Enter your address" value="<?php echo htmlspecialchars($address); ?>" required>
              </div>
              <?php if (isset($errors['address'])): ?>
                  <small class="text-danger"><?php echo $errors['address']; ?></small>
              <?php endif; ?>
            </div>

            <!-- Password -->
            <div class="col-md-6 mb-3">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
              </div>
              <?php if (isset($errors['password'])): ?>
                  <small class="text-danger"><?php echo $errors['password']; ?></small>
              <?php endif; ?>
            </div>

            <!-- Confirm Password -->
            <div class="col-md-6 mb-3">
              <label for="confirmPassword" class="form-label">Confirm Password</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" id="confirmPassword" name="confirm_password" class="form-control" placeholder="Re-enter your password" required>
              </div>
              <?php if (isset($errors['confirm_password'])): ?>
                  <small class="text-danger"><?php echo $errors['confirm_password']; ?></small>
              <?php endif; ?>
            </div>
          </div>

          <!-- Terms & Conditions Checkbox -->
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="agreeTerms" name="agree_terms" required>
            <label class="form-check-label" for="agreeTerms">I agree to the Terms & Conditions</label>
            <?php if (isset($errors['agree_terms'])): ?>
                <small class="text-danger"><?php echo $errors['agree_terms']; ?></small>
            <?php endif; ?>
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

<?php
// Include the footer
include 'includes/footer.php';
?>