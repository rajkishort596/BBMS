$(document).ready(function () {
  $("#save-address-btn").on("click", function (event) {
    event.preventDefault(); // Prevent the form from submitting traditionally

    // Collect form data
    let AddressData = {
      section: "address", // Unique identifier for the profile section
      Country: $("#country").val(),
      State: $("#state").val(),
      Area: $("#area").val(),
      Pincode: $("#pincode").val(),
      City: $("#city").val(),
      Address: $("#address").val(),
    };
    console.log(AddressData);
    // Send the form data via AJAX
    $.ajax({
      url: "../../controllers/UpdateProfile.php", // The form's action URL
      type: "POST", // Method type
      data: JSON.stringify(AddressData), // Form data sent as JSON
      contentType: "application/json", // Specify the content type as JSON
      success: function (response) {
        console.log(response);
        let msg;
        if (response == 1) {
          msg = "<div class='Sucess'>Address updated successfully</div>";
        } else if (response == 0) {
          msg = "<div class='failure'>Address Updation failed</div>";
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
    ProfileManager.disableForm(this); // Pass the element you want to target
  });
});
