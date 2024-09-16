$(document).ready(function () {
  // When the button is clicked
  $("#AddBlood").on("click", function (event) {
    event.preventDefault(); // Prevent the form from submitting traditionally

    // Collect form data
    let BloodData = {
      BloodGroup: $("#blood-group").val(),
      ExpiryDate: $("#expiry-date").val(),
      BloodUnits: $("#blood-units").val(),
    };
    // Send the form data via AJAX
    $.ajax({
      url: "../../controllers/AddBlood.php", // The form's action URL
      type: "POST", // Method type
      data: JSON.stringify(BloodData), // Form data sent as JSON
      contentType: "application/json", // Specify the content type as JSON
      success: function (response) {
        console.log(response);
        let msg;
        if (response == 1) {
          msg = "<div class='Sucess'>Blood added successfully</div>";
          $("#AddBloodForm")[0].reset(); // Reset form only on success
        } else if (response == 0) {
          msg = "<div class='failure'>Blood addition failed</div>";
        } else {
          msg = "<div class='Empty'>Please fill in all required fields</div>";
        }
        $(".msg").html(msg); // Show the message in .msg element
      },
      error: function (xhr, status, error) {
        // Handle network or server errors
        console.error("AJAX error:", status, error);
        let msg =
          "<div class='failure'>An error occurred. Please try again.</div>";
        $(".msg").html(msg);
      },
    });
  });
});
