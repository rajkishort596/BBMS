// formValidation.js

$(document).ready(function () {
  // Validation for string inputs (name, city, area)
  function validateStringInput(selector) {
    $(selector).on("input", function () {
      const lettersOnlyPattern = /^[A-Za-z\s]*$/;
      const currentValue = $(this).val();

      // Remove any invalid characters (non-letters or spaces)
      if (!lettersOnlyPattern.test(currentValue)) {
        $(this).val(currentValue.replace(/[^A-Za-z\s]/g, ""));
      }
    });
  }

  // Validation for location (addresses, alphanumeric + space, commas, periods)
  function validateLocationInput(selector) {
    $(selector).on("input", function () {
      const locationPattern = /^[A-Za-z0-9\s,\.]*$/; // Allows letters, numbers, spaces, commas, and periods
      const currentValue = $(this).val();

      // Remove invalid characters
      if (!locationPattern.test(currentValue)) {
        $(this).val(currentValue.replace(/[^A-Za-z0-9\s,\.]/g, ""));
      }
    });
  }

  // Validation for email format with message display
  function validateEmailInput(selector) {
    $(selector).on("input", function () {
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      const isValid = emailPattern.test($(this).val());
      const errorMessageId = `${$(this).attr("id")}-error`;

      // If invalid, show message; if valid, remove message
      if (!isValid && $(this).val() !== "") {
        if ($(`#${errorMessageId}`).length === 0) {
          $(this).after(
            `<span id="${errorMessageId}" style="color: black; font-size: 0.9em;">Please enter a valid email</span>`
          );
        }
      } else {
        $(`#${errorMessageId}`).remove();
      }
    });
  }

  // Validation for password length (at least 8 characters) with a shorter error message
  function validatePasswordInput(selector) {
    $(selector).on("input", function () {
      const minLength = 8;
      const errorMessageId = `${$(this).attr("id")}-error`;

      // If password length is less than 8, show message; if valid, remove message
      if ($(this).val().length < minLength) {
        if ($(`#${errorMessageId}`).length === 0) {
          $(this).after(
            `<span id="${errorMessageId}" style="color: black; font-size: 0.9em;">Minimun 8 chars</span>`
          );
        }
      } else {
        $(`#${errorMessageId}`).remove();
      }
    });
  }

  // Initialize validation on specific fields
  function initializeValidation() {
    validateStringInput("#name"); // Applies to any input with id "name"
    validateStringInput("#city"); // Applies to any input with id "city"
    validateStringInput("#cityName"); // Applies to any input with id "city"
    validateStringInput("#areaName"); // Applies to any input with id "area"
    validateLocationInput("#location"); // Applies to any input with id "location"
    validateEmailInput("#email"); // Applies to any input with id "email"
    validatePasswordInput("#password"); // Applies to any input with id "password"
  }

  // Run initialization
  initializeValidation();
});
