import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

// toggle light cone superimposition
let toggleS1 = document.querySelector("#toggle-sone"),
    toggleS2 = document.querySelector("#toggle-stwo"),
    toggleS3 = document.querySelector("#toggle-sthree"),
    toggleS4 = document.querySelector("#toggle-sfour"),
    toggleS5 = document.querySelector("#toggle-sfive"),
    s1 = document.querySelector("#superimposition-one"),
    s2 = document.querySelector("#superimposition-two"),
    s3 = document.querySelector("#superimposition-three"),
    s4 = document.querySelector("#superimposition-four"),
    s5 = document.querySelector("#superimposition-five");

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