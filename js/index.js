let slideTrack = document.querySelector(".popular-categories-type");
let nextBtn = document.querySelector(".next-btn");
let prevBtn = document.querySelector(".prev-btn");

let itemWidth = 235;
let isSliding = false;

nextBtn.addEventListener("click", () => {
    if (isSliding) return;
    isSliding = true;

    slideTrack.style.transition = "transform 0.5s ease-out";
    slideTrack.style.transform = `translateX(-${itemWidth}px)`;

    setTimeout(() => {
        slideTrack.style.transition = "none";
        slideTrack.appendChild(slideTrack.firstElementChild);
        slideTrack.style.transform = `translateX(0)`;
        isSliding = false;
    }, 500);
});

prevBtn.addEventListener("click", () => {
    if (isSliding) return;
    isSliding = true;

    slideTrack.style.transition = "transform 0.5s ease-out";
    slideTrack.style.transform = `translateX(${itemWidth}px)`;

    setTimeout(() => {
        slideTrack.style.transition = "none";
        slideTrack.insertBefore(slideTrack.lastElementChild, slideTrack.firstElementChild);
        slideTrack.style.transform = `translateX(0)`;
        isSliding = false;
    }, 500);
});
