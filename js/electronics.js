const menuBtn = document.querySelector(".filter-btn");
const overlay = document.querySelector(".overlay");
const asideMenu = document.querySelector('.aside');
const exitBtn = document.querySelector('.exit-btn');

let open = false

const handleAside = () => {
    open = !open

    if(open) {
        asideMenu.classList.add('active')
        overlay.classList.add('active')
    } else {
        asideMenu.classList.remove('active')
        overlay.classList.remove('active')
    }
}

menuBtn.addEventListener("click", handleAside)
exitBtn.addEventListener('click', handleAside)
overlay.addEventListener('click', handleAside)