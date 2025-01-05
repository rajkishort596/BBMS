$(document).ready(function () {
  let locationId = null;
  // Function to switch the form to edit mode
  function switchToEditMode() {
    // Simulate a click on the "Add Location" tab to switch to that section
    $(".add-location").click();

    // Update the form title and button text for the edit mode
    $(".add-location p").html("Update location");
    $("#Add-location h3").text("Update location");
    $("#Add-location p").text("");

    // Change button text and id, and remove any 'add-location-btn' event listeners
    $("#add-location-btn")
      .text("Update Location")
      .off("click") // Unbind any event listeners attached to 'add-location-btn'
      .attr("id", "update-location-btn"); // Change the id to 'update-location-btn'

    // Add 'update-location' class and remove 'add-location' class to differentiate between modes
    $(".add-location").addClass("update-location").removeClass("add-location");
    $(".update-location").click();
  }

  // Function to switch the form back to add mode
  function switchToAddMode() {
    // Reset the form title and button text back to "Add Location"
    $(".update-location p").html("Add location");
    $("#Add-location h3").text("Add New Location");
    $("#Add-location p").text(
      "Add a new blood exchange location by providing details such as country, state, city, area, and specific location. This will help donors and recipients easily connect for blood donations."
    );

    // Change the button text back to "Add Location" and update the id
    $("#update-location-btn")
      .text("Add Location")
      .off("click") // Remove any 'update-location-btn' click event listeners
      .attr("id", "add-location-btn"); // Change the id back to 'add-location-btn'

    // Switch the class back to 'add-location'
    $(".update-location")
      .addClass("add-location")
      .removeClass("update-location");

    // Clear any form fields and Enable the country and State fields
    $("#AddLocationForm")[0].reset();
    $("#countryName").attr("disabled", false);
    $("#stateName").attr("disabled", false);
  }

  // On edit button click, populate the edit form
  $(document).on("click", ".edit-btn", function () {
    locationId = $(this).data("id"); // Get the ID of the location
    console.log(locationId);
    // Switch to edit mode using the function
    switchToEditMode();

    // Fetch the location details via AJAX for the selected areaId
    $.ajax({
      url: "../../controllers/FetchLocationDetails.php",
      method: "POST",
      data: { id: locationId },
      dataType: "json", // Expect JSON response
      success: function (response) {
        console.log(response);
        // Populate the form fields with the fetched location details

        $("#countryName").val(response.country_name);
        $("#countryName").attr("disabled", true);
        $("#stateName").val(response.state_name);
        $("#stateName").attr("disabled", true);
        $("#cityName").val(response.city_name);
        $("#areaName").val(response.area_name);
        $("#location").val(response.location_name);
      },
      error: function () {
        msg = "<div class='failure'>Failed to load location details.</div>";
        $(".msg").html(msg);
        // Remove the message after 3 seconds
        setTimeout(function () {
          $(".msg").html("");
        }, 3000);
      },
    });
  });
  // On update button click, update the location
  $(document).on("click", "#update-location-btn", function (e) {
    e.preventDefault(); // Prevent the default form submission
    // AJAX request to update the location
    $.ajax({
      url: "../../controllers/UpdateLocation.php", // Replace with the actual update endpoint
      method: "POST",
      data: {
        id: locationId,
        // country: $("#countryName").val(),
        // state: $("#stateName").val(),
        city: $("#cityName").val(),
        area: $("#areaName").val(),
        location: $("#location").val(),
      },
      success: function (response) {
        let msg;
        // Switch back to all locations or refresh the location list
        $(".tab-link[data-target='Edit-location']").click();
        if (response == 1) {
          // Notify the user of successful update
          msg = "<div class='Sucess'>Location updated successfully.</div>";
          // Fetch and populate locations when the page loads
          LocationManager.fetchLocations();
          switchToAddMode();
        } else if (response == 0) {
          msg = "<div class='Sucess'>Failed to update location.</div>";
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
      error: function () {
        msg = "<div class='failure'>Failed to update location.</div>";
        $(".msg").html(msg);
        // Remove the message after 3 seconds
        setTimeout(function () {
          $(".msg").html("");
        }, 3000);
      },
    });
  });
});
