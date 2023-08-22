document.querySelector(".hamburger-menu").addEventListener("click", function() {
    var navMenu = document.querySelector(".site-nav-list");
    if (navMenu.style.display === "none" || navMenu.style.display === "") {
        navMenu.style.display = "flex";
        navMenu.style.flexDirection = "column";
        navMenu.style.alignItems = "center";
    } else {
        navMenu.style.display = "none";
        navMenu.style.flexDirection = "row";
    }
});
