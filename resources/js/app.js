import "./bootstrap";

import Alpine from "alpinejs";
import persist from "@alpinejs/persist";

window.Alpine = Alpine;

Alpine.plugin(persist);

// JavaScript to handle the scroll event and adjust the navbar height
const nav = document.getElementById("main-nav");

window.addEventListener("scroll", () => {
    // Adjust the height when scrolled to a specific part (e.g., 100px)
    if (window.scrollY > 100) {
        nav.classList.add("h-16"); // Adjust the height as needed
    } else {
        nav.classList.remove("h-16"); // Restore the original height
    }
});
