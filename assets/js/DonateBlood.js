/*---------------------Accordion JavaScript-------------------*/
const questions = document.querySelectorAll(".question");
questions.forEach((Q) => {
  Q.addEventListener("click", () => {
    // Close all other active questions
    questions.forEach((otherQ) => {
      if (otherQ !== Q) {
        otherQ.parentElement.classList.remove("active");
      }
    });
    // Toggle the clicked question
    Q.parentElement.classList.toggle("active");
  });
});
/*---------------------Donate Now JavaScript-------------------*/
const DonateBtn = document.querySelector(".donate-btn");
const BloodDonationSection = document.querySelector(".blood-donation-section");
const InfoSection = document.querySelector(".Info-section");
DonateBtn.addEventListener("click", () => {
  BloodDonationSection.style.display = "flex";
  InfoSection.style.display = "none";
});
/*---------------------Eligibility JavaScript-------------------*/
const Checkboxes = document.querySelectorAll(".checkbox input");
const EligibilityBtn = document.querySelector(".check-eligibility-btn");
const EligibilityRst = document.querySelector(".eligibility-result");
const NextBtn = document.querySelector(".next-btn");

// Function to check if all checkboxes are selected
function areAllChecked() {
  // Check if every checkbox is checked using the 'every' method
  return [...Checkboxes].every((checkbox) => checkbox.checked);
}

EligibilityBtn.addEventListener("click", () => {
  if (areAllChecked()) {
    EligibilityRst.innerHTML = ` <img src="../../assets/images/Sucess-Icon.svg">
                                        <p>
                                            You Are Eligible To Donate.
                                        </p>`;
    NextBtn.classList.remove("disabled");
  } else {
    EligibilityRst.innerHTML = ` <img src="../../assets/images/Failure-Icon.svg">
                                        <p>
                                            You Are Not Eligible To Donate.
                                        </p>`;
    NextBtn.classList.add("disabled");
  }

  EligibilityRst.style.display = "flex";
});
/*---------------------Blood Donation JavaScript-------------------*/
const EligibilitySection = document.querySelector(".Eligibility-section");
const AppointmentSection = document.querySelector(".appointment-section");
const ConfirmationSection = document.querySelector(".confirmation-section");
const AppointmentBtn = document.querySelector(".appointment-btn");
NextBtn.addEventListener("click", () => {
  EligibilitySection.style.display = "none";
  AppointmentSection.style.display = "flex";
  NextBtn.style.display = "none";
});
