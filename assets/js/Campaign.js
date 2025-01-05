// Campaign javascript on the Donor Side
function initializeCampaign() {
  const JoinBtns = document.querySelectorAll("#join");
  const JoinNowBtns = document.querySelectorAll(".join-now-btn");
  const ViewDetailLinks = document.querySelectorAll(".detail-link");

  const InfoSection = document.querySelector(".Info-section");
  const DetailsSection = document.querySelector(".Details-section");
  const RegistrationSection = document.querySelector(".Registration-section");

  ViewDetailLinks.forEach((link) => {
    link.addEventListener("click", () => {
      InfoSection.style.display = "none";
      DetailsSection.style.display = "flex";
    });
  });

  JoinBtns.forEach((JoinBtn) => {
    JoinBtn.addEventListener("click", () => {
      InfoSection.style.display = "none";
      RegistrationSection.style.display = "flex";
    });
  });

  JoinNowBtns.forEach((JoinNowBtn) => {
    JoinNowBtn.addEventListener("click", () => {
      DetailsSection.style.display = "none";
      RegistrationSection.style.display = "flex";
    });
  });
}
