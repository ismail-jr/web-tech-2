// Array of image paths and titles
const images = [
  { src: "assets/images/smartphone.jpg", title: "Smartphone" },
  { src: "assets/images/tshirt.jpg", title: "T-Shirt" },
  { src: "assets/images/coffeemaker.jpg", title: "coffe" },
  { src: "assets/images/laptop.jpg", title: "Laptop" },
  { src: "assets/images/kitchenset.jpg", title: "Kitchen Set" },
];

let currentImageIndex = 0;

// Function to swap images
function swapImage() {
  currentImageIndex = (currentImageIndex + 1) % images.length; // Cycle through images

  const nextImage = images[currentImageIndex];

  // Smooth transition for image swap (fade-out and fade-in effect)
  const imageElement = document.getElementById("swappingImage");
  const titleElement = document.getElementById("imageTitle");

  imageElement.classList.add("fade-out");
  setTimeout(() => {
    // Update the image source and title after fade-out
    imageElement.src = nextImage.src;
    titleElement.textContent = nextImage.title;

    // Trigger fade-in effect
    imageElement.classList.remove("fade-out");
    imageElement.classList.add("fade-in");
  }, 500); // Timeout duration matches fade-out duration
}

// Function to show an alert pop-up
function showAlert() {
  alert("Hi there! 👋");
}

// Function to show a confirm pop-up
function showConfirm() {
  const isConfirmed = confirm("Do you want to proceed?");
  if (isConfirmed) {
    alert("You clicked OK! 👍");
  } else {
    alert("You clicked Cancel! 👎");
  }
}

// Function to show a prompt pop-up
function showPrompt() {
  const userInput = prompt("Please enter your name:");
  if (userInput) {
    alert(`Hello, ${userInput}! 👋`);
  } else {
    alert("You didn't enter anything. 😢");
  }
}

// Function to scroll cards left or right
function scrollCards(direction) {
  const cardsScroll = document.getElementById("cardsScroll");
  const scrollAmount = 300; // Adjust scroll amount as needed

  if (direction === "left") {
    cardsScroll.scrollBy({ left: -scrollAmount, behavior: "smooth" });
  } else if (direction === "right") {
    cardsScroll.scrollBy({ left: scrollAmount, behavior: "smooth" });
  }
}

document.addEventListener("DOMContentLoaded", function () {
  // 🔹 Category Filter Click Event
  document.querySelectorAll(".filter-category").forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault();
      const category = this.getAttribute("data-category");
      window.location.href = "shop.php?category=" + category;
    });
  });

  // 🔹 Search Form Submission
  document
    .getElementById("searchForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      const searchQuery = document.getElementById("searchInput").value;
      window.location.href = "shop.php?search=" + searchQuery;
    });

  // 🔹 Add to Cart Button Click
  document.querySelectorAll(".add-to-cart").forEach((button) => {
    button.addEventListener("click", function () {
      const productId = this.getAttribute("data-id");

      fetch("cart.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "product_id=" + productId,
      })
        .then((response) => response.json())
        .then((data) => {
          document.getElementById("cart-count").innerText = data.cart_count;
        })
        .catch((error) => console.error("Error:", error));
    });
  });
});
// Function to toggle password visibility
function togglePassword(passwordFieldId, iconId) {
  const passwordField = document.getElementById(passwordFieldId);
  const icon = document.getElementById(iconId);

  // Check if password field type is 'password' or 'text'
  if (passwordField.type === "password") {
    passwordField.type = "text"; // Show password
    icon.classList.remove("bi-eye"); // Change icon to open eye
    icon.classList.add("bi-eye-slash"); // Change icon to closed eye
  } else {
    passwordField.type = "password"; // Hide password
    icon.classList.remove("bi-eye-slash"); // Change icon to closed eye
    icon.classList.add("bi-eye"); // Change icon to open eye
  }
}

//down
document.addEventListener("DOMContentLoaded", function () {
  let cartCount = document.getElementById("cart-count");
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  // Function to update cart count
  function updateCartCount() {
    cartCount.textContent = cart.length;
  }

  // Update cart count on page load
  updateCartCount();

  // Add to Cart Functionality
  document.querySelectorAll(".add-to-cart").forEach((button) => {
    button.addEventListener("click", function () {
      let productId = this.getAttribute("data-id");
      let productName = this.getAttribute("data-name");
      let productPrice = this.getAttribute("data-price");
      let productImage = this.getAttribute("data-image");

      let existingProduct = cart.find((item) => item.id === productId);

      if (existingProduct) {
        existingProduct.quantity++;
      } else {
        cart.push({
          id: productId,
          name: productName,
          price: productPrice,
          image: productImage,
          quantity: 1,
        });
      }

      // Save cart to localStorage
      localStorage.setItem("cart", JSON.stringify(cart));

      // Update cart count
      updateCartCount();
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  let cartItems = JSON.parse(localStorage.getItem("cart")) || [];
  let cartContainer = document.querySelector(".cart-items");

  if (cartItems.length === 0) {
    cartContainer.innerHTML = "<p>Your cart is empty.</p>";
  } else {
    cartContainer.innerHTML = cartItems
      .map(
        (item) => `
            <div class="cart-item">
                <img src="${item.image}" width="80" height="80">
                <p>${item.name} - ₵${item.price} x ${item.quantity}</p>
                <button onclick="removeFromCart('${item.id}')">Remove</button>
            </div>
        `
      )
      .join("");
  }
});

function removeFromCart(productId) {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  cart = cart.filter((item) => item.id !== productId);
  localStorage.setItem("cart", JSON.stringify(cart));
  location.reload();
}
