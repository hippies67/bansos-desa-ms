const body = document.querySelector("body");
const navbar = document.querySelector(".navbar");
const menuBtn = document.querySelector(".menu-btn");
const cancelBtn = document.querySelector(".cancel-btn");
menuBtn.onclick = ()=>{
    navbar.classList.add("show");
    menuBtn.classList.add("hide");
    body.classList.add("disabled");
}
cancelBtn.onclick = ()=>{
    body.classList.remove("disabled");
    navbar.classList.remove("show");
    menuBtn.classList.remove("hide");
}
window.onscroll = ()=>{
    this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
}


const currentLocation = location.href;
const menuItem = document.querySelectorAll('a');

const menuLength = menuItem.length
for(let i = 0; i < menuLength; i++){
    if(menuItem[i].href === currentLocation){
        menuItem[i].className = 'active'
    }
}


// var marker = document.querySelector('#marker');
// var item = document.querySelectorAll('nav a');

// function indicator(e) {
//     marker.style.left = e.offsetLeft + "px";
//     marker.style.width = e.offsetWidth + "px";
// }

// item.forEach(link => {
//     link.addEventListener('click', (e) => {
//     indicator(e.target);
//     })
// })


