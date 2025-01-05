$(document).ready(function () {
  $(document).on("click", "#add-location-btn", function (event) {
    event.preventDefault(); // Prevent the form from submitting traditionally

    // Collect form data
    let locationData = {
      CountryName: $("#countryName").val(),
      StateName: $("#stateName").val(),
      CityName: $("#cityName").val(),
      AreaName: $("#areaName").val(),
      Location: $("#location").val(),
    };
    console.log(locationData);
    // Send the form data via AJAX
    $.ajax({
      url: "../../controllers/AddLocation.php", // The form's action URL
      type: "POST", // Method type
      data: JSON.stringify(locationData), // Form data sent as JSON
      contentType: "application/json", // Specify the content type as JSON
      success: function (response) {
        console.log(response);
        // Fetch and populate locations when the page loads
        let msg;
        if (response == 1) {
          LocationManager.fetchLocations();
          msg = "<div class='Sucess'>Location added successfully</div>";
          $("#AddLocationForm")[0].reset(); // Reset form only on success
        } else if (response == 0) {
          msg = "<div class='failure'>Location addition failed</div>";
        } else if (response == -1) {
          msg = "<div class='Empty'>Please fill in all required fields</div>";
        } else {
          msg =
            "<div class='failure'>An error occurred. Please try again.</div>";
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
      },
    });
  });
});
