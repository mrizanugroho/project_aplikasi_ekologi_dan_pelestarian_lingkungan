// ===============================
// FADE + SLIDE ANIMATION ON LOAD
// ===============================

document.addEventListener("DOMContentLoaded", function () {

    const card = document.querySelector(".card");
    const sections = document.querySelectorAll(".info-section");

    // Initial state
    card.style.opacity = "0";
    card.style.transform = "translateY(30px)";

    sections.forEach(section => {
        section.style.opacity = "0";
        section.style.transform = "translateY(20px)";
    });

    // Animate card
    setTimeout(() => {
        card.style.transition = "all 0.6s ease";
        card.style.opacity = "1";
        card.style.transform = "translateY(0)";
    }, 200);

    // Animate sections one by one
    sections.forEach((section, index) => {
        setTimeout(() => {
            section.style.transition = "all 0.6s ease";
            section.style.opacity = "1";
            section.style.transform = "translateY(0)";
        }, 500 + (index * 200));
    });

});