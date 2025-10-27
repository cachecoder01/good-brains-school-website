let currentIndex = 0;
const lightbox = document.getElementById("lightbox");
const lightboxImg = document.getElementById("lightbox-img");
const galleryImages = document.querySelectorAll(".gallery img");

galleryImages.forEach((img, index) => {
  img.addEventListener("click", () => {
    currentIndex = index;
    openLightbox();
  });
});

function openLightbox() {
  lightbox.style.display = "flex";
  lightboxImg.src = galleryImages[currentIndex].src;
}

function closeLightbox() {
  lightbox.style.display = "none";
}

function changeImage(step) {
  currentIndex += step;
  if (currentIndex < 0) currentIndex = galleryImages.length - 1;
  if (currentIndex >= galleryImages.length) currentIndex = 0;
  lightboxImg.src = galleryImages[currentIndex].src;
}