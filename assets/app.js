import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

// toggle nav hamburger
let mainnav = document.querySelector(".header-nav");
let hamburger = document.querySelector(".hamburger");
hamburger.addEventListener("click", () => {
    mainnav.classList.toggle("open");
    }
)

let links = document.querySelectorAll(".main-nav-links");
links.forEach((links) => {
    links.addEventListener("click", () => {
        mainnav.classList.remove("open");
    })
})

// toggle light cone superimposition
let superimposition = document.querySelectorAll(".lightcone-superimposition");
let activeopen = document.querySelector(".open");
let toggleS1 = document.querySelector("#toggle-sone");
let toggleS2 = document.querySelector("#toggle-stwo");
let toggleS3 = document.querySelector("#toggle-sthree");
let toggleS4 = document.querySelector("#toggle-sfour");
let toggleS5 = document.querySelector("#toggle-sfive");

let s1 = document.querySelector("#superimposition-one");
let s2 = document.querySelector("#superimposition-two");
let s3 = document.querySelector("#superimposition-three");
let s4 = document.querySelector("#superimposition-four");
let s5 = document.querySelector("#superimposition-five");

toggleS1.addEventListener("click", () => {
    s1.classList.add("open");
    s2.classList.remove("open");
    s3.classList.remove("open");
    s4.classList.remove("open");
    s5.classList.remove("open");
    toggleS1.classList.add("active");
    toggleS2.classList.remove("active");
    toggleS3.classList.remove("active");
    toggleS4.classList.remove("active");
    toggleS5.classList.remove("active");
})

toggleS2.addEventListener("click", () => {
    s1.classList.remove("open");
    s2.classList.add("open");
    s3.classList.remove("open");
    s4.classList.remove("open");
    s5.classList.remove("open");
    toggleS1.classList.remove("active");
    toggleS2.classList.add("active");
    toggleS3.classList.remove("active");
    toggleS4.classList.remove("active");
    toggleS5.classList.remove("active");
})

toggleS3.addEventListener("click", () => {
    s1.classList.remove("open");
    s2.classList.remove("open");
    s3.classList.add("open");
    s4.classList.remove("open");
    s5.classList.remove("open");
    toggleS1.classList.remove("active");
    toggleS2.classList.remove("active");
    toggleS3.classList.add("active");
    toggleS4.classList.remove("active");
    toggleS5.classList.remove("active");
})

toggleS4.addEventListener("click", () => {
    s1.classList.remove("open");
    s2.classList.remove("open");
    s3.classList.remove("open");
    s4.classList.add("open");
    s5.classList.remove("open");
    toggleS1.classList.remove("active");
    toggleS2.classList.remove("active");
    toggleS3.classList.remove("active");
    toggleS4.classList.add("active");
    toggleS5.classList.remove("active");
})

toggleS5.addEventListener("click", () => {
    s1.classList.remove("open");
    s2.classList.remove("open");
    s3.classList.remove("open");
    s4.classList.remove("open");
    s5.classList.add("open");
    toggleS1.classList.remove("active");
    toggleS2.classList.remove("active");
    toggleS3.classList.remove("active");
    toggleS4.classList.remove("active");
    toggleS5.classList.add("active");
})