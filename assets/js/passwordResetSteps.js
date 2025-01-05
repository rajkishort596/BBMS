// Select all forms and convert the NodeList to an array
const forms = Array.from(document.querySelectorAll(".password-form"));
const indicators = document.querySelectorAll(".carousel-indicators .dot");

// Function to validate email
const isValidEmail = (email) => {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
};

// Function to validate password (at least 8 characters)
const isValidPassword = (password) => {
  return password.length >= 8;
};

// Function to check if all OTP fields are filled
const isOtpComplete = () => {
  return Array.from(otpInputs).every((input) => input.value !== "");
};

// Loop through each form to attach the event listener to the button
forms.forEach((form, index) => {
  const button = form.querySelector("button"); // Find the button within each form

  if (button && index < forms.length - 1) {
    // Skip the last form
    button.addEventListener("click", (e) => {
      e.preventDefault(); // Prevent form submission

      let isValid = true; // Flag to check if all validations are passed

      // Clear previous error messages
      form
        .querySelectorAll(".error")
        .forEach((error) => (error.innerHTML = ""));

      // Validate based on the current form
      if (index === 1) {
        // Email Confirmation Step
        const emailField = form.querySelector("#email");
        if (!isValidEmail(emailField.value)) {
          isValid = false;
          const emailError = form.querySelector(".email-error");
          emailError.innerHTML = "Please enter a valid email.";
        }
      } else if (index === 2) {
        // OTP Step
        if (!isOtpComplete()) {
          isValid = false;
          const otpError = form.querySelector(".otp-error");
          otpError.innerHTML = "Please enter the full OTP.";
        }
      } else if (index === 3) {
        // New Password Step
        const newPassword = form.querySelector("#new-password").value;
        const confirmPassword = form.querySelector("#confirm-password").value;
        if (!isValidPassword(newPassword)) {
          isValid = false;
          const passwordError = form.querySelector(".password-error");
          passwordError.innerHTML =
            "Password must be at least 8 characters long.";
        } else if (newPassword !== confirmPassword) {
          isValid = false;
          const confirmPasswordError = form.querySelector(
            ".confirm-password-error"
          );
          confirmPasswordError.innerHTML = "Passwords do not match.";
        }
      }

      // If all validations pass, proceed to the next form
      if (isValid) {
        // Remove the active class from the current form
        form.classList.remove("active");

        // Update carousel indicators
        indicators[index].classList.remove("active");
        if (indicators[index + 1]) {
          indicators[index + 1].classList.add("active");
        }

        // Add the active class to the next form
        forms[index + 1].classList.add("active");
      }
    });
  }
});

// Select all OTP input fields
const otpInputs = document.querySelectorAll(".otp-input");

otpInputs.forEach((input, index) => {
  input.addEventListener("input", (e) => {
    // Ensure only numbers are allowed
    const value = e.target.value;
    if (!/^[0-9]*$/.test(value)) {
      e.target.value = ""; // Clear the field if the input is not a number
      return;
    }

    // Move to the next input if a digit is entered
    if (value.length === 1 && index < otpInputs.length - 1) {
      otpInputs[index + 1].focus();
    }
  });

  input.addEventListener("keydown", (e) => {
    // Move to the previous input if backspace is pressed and the field is empty
    if (e.key === "Backspace" && e.target.value === "" && index > 0) {
      otpInputs[index - 1].focus();
    }
  });
});

// Password eye-Icon functionality
const showPassword = (icon, action) => {
  // Find the input field and the icons within the same container as the clicked icon
  const container = icon.closest(".input-group");
  const passwordField = container.querySelector(
    'input[type="password"], input[type="text"]'
  );
  const closeEye = container.querySelector(".eye-icon.close");
  const openEye = container.querySelector(".eye-icon.open");

  if (action === "close") {
    passwordField.type = "text"; // Show password
    closeEye.style.display = "none";
    openEye.style.display = "block";
  } else {
    passwordField.type = "password"; // Hide password
    closeEye.style.display = "block";
    openEye.style.display = "none";
  }
};
