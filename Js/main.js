"use strict"
let burger = document.querySelector(".menu-burger__header");
let close = document.querySelector(".close-button");
let menu = document.querySelector(".menu_header");

burger.onclick = function(evt) {
    evt.preventDefault();
    menu.classList.add('active');
    // burger.classList.remove('menu-burger__header');
    close.classList.remove('visually-hidden');
    burger.classList.add('menu-burger__header_hidden');
}

close.onclick = function () {
    menu.classList.remove('active');
    close.classList.add('visually-hidden');
    // burger.classList.add('menu-burger__header');
    burger.classList.remove('menu-burger__header_hidden');
}