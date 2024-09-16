document.addEventListener("DOMContentLoaded", () => {
  // Get all tabs
  const tabs = document.querySelectorAll(".tab-link");

  // Iterate over each tab
  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      // Get the target content ID
      const target = tab.getAttribute("data-target");

      // Remove 'active' class from all tab contents
      document.querySelectorAll(".tab-content").forEach((content) => {
        content.classList.remove("active");
      });

      // Remove 'active' class from all tabs
      tabs.forEach((tab) => {
        tab.classList.remove("active");
      });

      // Add 'active' class to the clicked tab and its content
      document.getElementById(target).classList.add("active");
      tab.classList.add("active");
    });
  });
});
