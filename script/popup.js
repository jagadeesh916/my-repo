// Get elements
const popup = document.getElementById("popup");
const openPopupBtn = document.querySelector(".open-popup");
const closePopupBtn = document.querySelector(".close-btn");

// Open popup when button is clicked
openPopupBtn.addEventListener("click", () => {
    popup.style.display = "flex";
});

// Close popup when close button is clicked
closePopupBtn.addEventListener("click", () => {
    popup.style.display = "none";
});

// Close popup when clicking outside the content box
popup.addEventListener("click", (event) => {
    if (event.target === popup) {
        popup.style.display = "none";
    }
});
