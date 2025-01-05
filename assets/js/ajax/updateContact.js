$(document).ready(function () {
  $("#save-contact-btn").on("click", function (event) {
    event.preventDefault(); // Prevent the form from submitting traditionally

    // Collect form data
    let ContactData = {
      section: "contact", // Unique identifier for the profile section
      Email: $("#email").val(),
      MobileNumber: $("#mobile-number").val(),
      //   OTP: $("#otp").val(),
    };
    console.log(ContactData);
    // Send the form data via AJAX
    $.ajax({
      url: "../../controllers/UpdateProfile.php", // The form's action URL
      type: "POST", // Method type
      data: JSON.stringify(ContactData), // Form data sent as JSON
      contentType: "application/json", // Specify the content type as JSON
      success: function (response) {
        console.log(response);
        let msg;
        if (response == 1) {
          msg = "<div class='Sucess'>Contact updated successfully</div>";
        } else if (response == 0) {
          msg = "<div class='failure'>Contact Updation failed</div>";
        } else {
          msg = "<div class='Empty'>Please fill in all required fields</div>";
        }
        $(".msg").html(msg); // Show the message in .msg element
        // Remove the message after 3 seconds
        setTimeout(function () {
          $(".msg").html("");
        }, 3000);
      },
      error: function (xhr, status, error) {
        // Handle network or server errors
        console.error("AJAX error:", status, error);
        let msg =
          "<div class='failure'>An error occurred. Please try again.</div>";
        $(".msg").html(msg);
        // Remove the message after 3 seconds
        setTimeout(function () {
          $(".msg").html("");
        }, 3000);
      },
    });
    ProfileManager.disableForm(this);
  });
});
