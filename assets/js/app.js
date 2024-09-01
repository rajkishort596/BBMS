/*--------------Hmabergur menu js ------------------*/
const Navbar = document.querySelector(".navbar");
const Links = document.querySelectorAll(".header__links a");
const DashboardLinks = document.querySelectorAll(".sidebar__links li");
const Hambergur = document.querySelector(".hambergur");
const Overlay = document.querySelector(".overlay");
Hambergur.addEventListener("click", () => {
  Navbar.classList.toggle("active");
  Overlay.classList.toggle("active");
});

Links.forEach((link) => {
  link.addEventListener("click", () => {
    console.log("Hello world");
    Navbar.classList.remove("active");
    Overlay.classList.remove("active");
  });
});
/*-------------------Dashboard menu js-------------------*/
DashboardLinks.forEach((link) => {
  link.addEventListener("click", () => {
    // Remove the "active" class from all links
    DashboardLinks.forEach((link) => link.classList.remove("active"));

    // Add the "active" class to the clicked link
    link.classList.add("active");
  });
});
