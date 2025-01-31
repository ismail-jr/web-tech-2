// Array of image paths
const images = [
  "assets/images/Ismail.jpg",
  "assets/images/mum.JPG",
  "assets/images/Ismail.jpg",
  "assets/images/mum.JPG",
  "assets/images/Ismail.jpg",
];

let currentImageIndex = 0;

// Function to swap images
function swapImage() {
  currentImageIndex = (currentImageIndex + 1) % images.length; // Cycle through images
  document.getElementById("swappingImage").src = images[currentImageIndex];
}

// Function to show an alert pop-up
function showAlert() {
  alert("This is an alert pop-up! 🚨");
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
