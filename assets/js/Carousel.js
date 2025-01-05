function initializeCarousel(Carousel, Cards) {
  // const carousel = document.querySelector(".campaign-carousel");
  const carousel = document.querySelector(Carousel);
  const carouselIndicator = document.querySelector(".carousel-indicators");
  // const cards = document.querySelectorAll(".campaign-card");
  const cards = document.querySelectorAll(Cards);
  const leftArrow = document.querySelector(".left-arrow");
  const rightArrow = document.querySelector(".right-arrow");

  let cardsToShow = window.innerWidth < 768 ? 1 : 2; // Display 1 card on mobile and 2 on larger screens
  let currentIndex = 0;
  let dots = [];
  let startX,
    currentX,
    isDragging = false;

  // Function to update the visible cards based on the screen size
  function updateVisibleCards() {
    cardsToShow = window.innerWidth < 768 ? 1 : 2;
    generateDots();
    updateCarousel();
  }

  // Function to move carousel left
  function moveLeft() {
    if (currentIndex > 0) {
      currentIndex--;
      updateCarousel();
    }
  }

  // Function to move carousel right
  function moveRight() {
    let length = cards.length / cardsToShow - 1;
    if (currentIndex < length) {
      currentIndex++;
      updateCarousel();
    }
  }

  // Function to update the carousel based on the current index
  function updateCarousel() {
    carousel.style.width = `calc(${(cards.length * 100) / cardsToShow}% + ${
      (cards.length - 1) * 1
    }rem)`;
    // Calculate the amount to translate the carousel, including the gap
    const newTransform = -(
      currentIndex *
      ((100 * cardsToShow) / cards.length +
        ((1 * cardsToShow) / carousel.offsetWidth) * 100)
    );

    carousel.style.transform = `translateX(${newTransform}%)`;

    // Update the active dot
    dots.forEach((dot, index) => {
      dot.style.backgroundColor = index === currentIndex ? "#f14d4d" : "#ccc";
    });
  }

  // Function to generate the correct number of dots
  function generateDots() {
    // Calculate the number of "pages" (sets of visible cards)
    const numDots = Math.ceil(cards.length / cardsToShow);
    // Clear existing dots
    carouselIndicator.innerHTML = "";

    // Create new dots
    dots = [];
    for (let i = 0; i < numDots; i++) {
      const dot = document.createElement("span");
      dot.classList.add("dot");
      dot.addEventListener("click", () => {
        // Move the carousel to the corresponding index when a dot is clicked
        currentIndex = i;
        updateCarousel();
      });
      carouselIndicator.appendChild(dot);
      dots.push(dot);
    }

    // Update the active dot after creating them
    updateCarousel();
  }

  // Event listeners for arrow buttons
  leftArrow.addEventListener("click", moveLeft);
  rightArrow.addEventListener("click", moveRight);

  // Event listener for window resize to adjust the number of visible cards
  window.addEventListener("resize", updateVisibleCards);

  // Touch events for mobile swipe functionality
  carousel.addEventListener("touchstart", (e) => {
    startX = e.touches[0].clientX;
    isDragging = true;
  });

  carousel.addEventListener("touchmove", (e) => {
    if (!isDragging) return;
    currentX = e.touches[0].clientX;
    const diffX = startX - currentX;

    // Move left if swiped right
    if (diffX > 50) {
      moveRight();
      isDragging = false;
    }

    // Move right if swiped left
    if (diffX < -50) {
      moveLeft();
      isDragging = false;
    }
  });

  carousel.addEventListener("touchend", () => {
    isDragging = false;
  });

  // Initialize carousel
  generateDots();
  updateCarousel();
}
