/*--------------Hmabergur menu js ------------------*/
const Navbar = document.querySelector(".navbar");
const Links = document.querySelectorAll(".header__links a");
const DashboardLinks = document.querySelectorAll(".sidebar__links li a");
const Hambergur = document.querySelector(".hambergur");
const Overlay = document.querySelector(".overlay");
const Body = document.body;
Hambergur.addEventListener("click", () => {
  Navbar.classList.toggle("active");
  Overlay.classList.toggle("active");
  Body.classList.toggle("no-scroll");
});
/*--------------Close menu When clicked putside ------------------*/
document.addEventListener("click", function (event) {
  if (!Navbar.contains(event.target) && !event.target.matches(".hambergur")) {
    Navbar.classList.remove("active");
    Overlay.classList.remove("active");
    Body.classList.remove("no-scroll");
  }
});
/*--------------Close menu When link is clicked ------------------*/
Links.forEach((link) => {
  link.addEventListener("click", () => {
    Navbar.classList.remove("active");
    Overlay.classList.remove("active");
    Body.classList.remove("no-scroll");
  });
});
/*-------------------Dashboard menu js-------------------*/
DashboardLinks.forEach((link) => {
  let DashboardLists = link.parentElement;
  link.addEventListener("click", () => {
    // Remove the "active" class from all links
    DashboardLists.forEach((link) => link.classList.remove("active"));

    // Add the "active" class to the clicked link
    DashboardLists.classList.add("active");
  });
});
