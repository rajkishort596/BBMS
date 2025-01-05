$(document).ready(function () {
  // Existing confirm change event
  $("#confirm").on("change", function () {
    $(".appointment-btn, .request-btn, .register-btn").toggleClass("disabled");
  });

  // Existing button click event to handle form submission
  $(".appointment-btn, .request-btn, .register-btn").on(
    "click",
    function (event) {
      event.preventDefault(); // Prevent the form from submitting traditionally

      // Collect form data
      let RequestData = {
        Location: $("#location").val(),
        BloodGroup: $("#blood-group").val(),
        BloodUnits: $("#units").val(),
      };
      console.log(RequestData);

      $.ajax({
        url: "../../controllers/MakeRequest.php", // The form's action URL
        type: "POST", // Method type
        data: JSON.stringify(RequestData), // Form data sent as JSON
        contentType: "application/json",
        success: function (response) {
          console.log(response);
          let msg;
          if (response == 1) {
            $(".confirmation-section").css("display", "flex");
            $(
              ".appointment-section, .Request-Blood-section, .Registration-section"
            ).css("display", "none");
          } else if (response == 0) {
            msg = "<div class='failure'>Request failed</div>";
          } else {
            msg = "<div class='Empty'>Please fill in all required fields</div>";
          }
          $(".msg").html(msg); // Show the message in .msg element

          // Remove the message after 3 seconds
          setTimeout(function () {
            $(".msg").html("");
          }, 3000);
        },
      });
    }
  );

  // New: Filter functionality
  $("#apply-filters").on("click", function () {
    // Get filter values from the dropdowns
    console.log("hello from filter");
    let filterData = {
      filterType: $("#filter-request-type").val(),
      // filterBloodGroup: $("#filter-blood-group").val(),
      filterStatus: $("#filter-status").val(),
    };
    console.log(filterData);
    // Make an AJAX request to ShowRequests.php with the filter data
    $.ajax({
      url: "../../controllers/ShowRequests.php", // Adjust the URL if needed
      type: "POST",
      data: filterData, // Sending filter data
      success: function (response) {
        console.log(response);
        // Update the table body with the filtered data
        $("#Request-Status-table").html(response); // Ensure #requests-table matches your table's tbody selector
      },
      error: function (xhr, status, error) {
        console.error("Error fetching filtered requests:", error);
      },
    });
  });
});
