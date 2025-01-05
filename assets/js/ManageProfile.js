$(document).ready(function () {
  //Event listener for camera icon
  $(".camera-icon").on("click", function () {
    $("#profilePic").click(); // Trigger file input when camera icon is clicked
  });

  // Show preview of the selected image
  $("#profilePic").on("change", function () {
    $("#upload-pic").removeClass("disabled");
    const file = this.files[0];
    if (file) {
      console.log(file);
      const reader = new FileReader();

      reader.onload = function (e) {
        $("#preImg").attr("src", e.target.result); // Set the src attribute
      };

      reader.readAsDataURL(file); // Convert file to base64 string
    }
  });

  // Event listener for edit icons (assumes edit-icon class on each icon)
  $(".edit-icon").on("click", function () {
    // Limit scope to the specific form/section
    const formSection = $(this).closest(".form");
    // Find the input field that is a sibling of the clicked icon
    const inputField = $(this).siblings("input, textarea");
    const selectFields = $(this).siblings("select");

    // Enable the input field for editing
    inputField.removeAttr("readonly").focus();

    // Enable the select field
    selectFields.prop("disabled", false);

    // Select Save and Cancel buttons within the same section
    const CancelBtn = formSection.find(".cancel-btn");
    const SaveBtn = formSection.find(".save-btn");

    const OTPField = formSection.find("#otp");
    const SendOTPBtn = formSection.find(".send-otp-btn");

    // Enable the Save, Cancel buttons, OTP field, and Send OTP button
    SaveBtn.removeClass("disabled");
    CancelBtn.removeClass("disabled");
    OTPField.prop("readonly", false);
    SendOTPBtn.removeClass("disabled");
  });

  // Make all fields readonly when clicked on cancel button within the form section
  $(".cancel-btn").on("click", function () {
    // Limit scope to specific form/section
    const formSection = $(this).closest(".form");

    // Select input fields in the current section
    const AllInputFields = formSection.find("input, textarea");
    const AllSelectFields = formSection.find("select");

    const OTPField = formSection.find("#otp");
    const SendOTPBtn = formSection.find(".send-otp-btn");

    // Set fields back to readonly
    AllInputFields.prop("readonly", true);

    // Disable the select field
    AllSelectFields.prop("disabled", true);

    // Deactivate OTP field and button
    OTPField.prop("readonly", true);
    SendOTPBtn.addClass("disabled");

    // Disable the Save and Cancel buttons again
    const SaveBtn = formSection.find(".save-btn");
    $(this).addClass("disabled");
    SaveBtn.addClass("disabled");
  });
});

// Create a namespace to encapsulate functions related to profile management
var ProfileManager = ProfileManager || {};

ProfileManager.disableForm = (el) => {
  // Limit scope to the specific form/section
  const formSection = $(el).closest(".form");

  // Find all input, textarea, and select fields inside the closest form
  const inputFields = formSection.find("input, textarea");
  const selectFields = formSection.find("select");

  // Disable the input and textarea fields for editing
  inputFields.attr("readonly", true);

  // Disable the select fields
  selectFields.prop("disabled", true);

  // Select Save and Cancel buttons within the same section
  const CancelBtn = formSection.find(".cancel-btn");
  const SaveBtn = formSection.find(".save-btn");

  const OTPField = formSection.find("#otp");
  const SendOTPBtn = formSection.find(".send-otp-btn");

  // Disable the Save, Cancel buttons, OTP field, and Send OTP button
  SaveBtn.addClass("disabled");
  CancelBtn.addClass("disabled");
  OTPField.prop("readonly", true);
  SendOTPBtn.addClass("disabled");
};
