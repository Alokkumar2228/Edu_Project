 
 var button = document.getElementById("myButton");
 button.addEventListener("click", function() {
 window.location.href = "./login.html";
 });
const initSlider = () => {
   const imageList = document.querySelector(".slider-wrapper .image-list");
   const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
   const sliderScrollbar = document.querySelector(".container .slider-scrollbar");
   const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
   const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
   
   // Handle scrollbar thumb drag
   scrollbarThumb.addEventListener("mousedown", (e) => {
       const startX = e.clientX;
       const thumbPosition = scrollbarThumb.offsetLeft;
       const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;
       
       // Update thumb position on mouse move
       const handleMouseMove = (e) => {
           const deltaX = e.clientX - startX;
           const newThumbPosition = thumbPosition + deltaX;
           // Ensure the scrollbar thumb stays within bounds
           const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
           const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;
           
           scrollbarThumb.style.left = `${boundedPosition}px`;
           imageList.scrollLeft = scrollPosition;
       }
       // Remove event listeners on mouse up
       const handleMouseUp = () => {
           document.removeEventListener("mousemove", handleMouseMove);
           document.removeEventListener("mouseup", handleMouseUp);
       }
       // Add event listeners for drag interaction
       document.addEventListener("mousemove", handleMouseMove);
       document.addEventListener("mouseup", handleMouseUp);
   });
   // Slide images according to the slide button clicks
   slideButtons.forEach(button => {
       button.addEventListener("click", () => {
           const direction = button.id === "prev-slide" ? -1 : 1;
           const scrollAmount = imageList.clientWidth * direction;
           imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
       });
   });
    // Show or hide slide buttons based on scroll position
   const handleSlideButtons = () => {
       slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
       slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
   }
   // Update scrollbar thumb position based on image scroll
   const updateScrollThumbPosition = () => {
       const scrollPosition = imageList.scrollLeft;
       const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
       scrollbarThumb.style.left = `${thumbPosition}px`;
   }
   // Call these two functions when image list scrolls
   imageList.addEventListener("scroll", () => {
       updateScrollThumbPosition();
       handleSlideButtons();
   });
}
window.addEventListener("resize", initSlider);
window.addEventListener("load", initSlider);

// here code for button

// const imageElement = document.getElementById('myImg');
// const button = document.getElementById('myButton');
// let replaced = false; // Flag to track image state

// button.addEventListener('click', function(event) {
//   if (event.detail === 1) { // Check for single click
//     if (!replaced) {
//       // Replace image on single click
//       imageElement.src = 'btn_tick.png'; // Replace with your new image path
//       replaced = true;
//     }
//   } else if (event.detail === 2) { // Check for double click
//     if (replaced) {
//       // Restore original image on double click
//       imageElement.src = 'btn.png'; // Replace with your original image path
//       replaced = false;
//     }
//   }
// });

const imageElement = document.getElementById('myImg');
const linkElement = document.getElementById('myLink');
let replaced = false; // Flag to track image state

linkElement.addEventListener('click', function(event) {
  // Prevent default link behavior (navigation) on single click
  event.preventDefault();

  if (event.detail === 1) { // Check for single click
    if (!replaced) {
      // Replace image on single click
      imageElement.src = 'btn_tick.png'; // Replace with your new image path
      replaced = true;
    }
  } else if (event.detail === 2) { // Check for double click
    if (replaced) {
      // Restore original image on double click
      imageElement.src = 'btn.png'; // Replace with your original image path
      replaced = false;
    }
  }
});

