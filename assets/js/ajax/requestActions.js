$(document).ready(function () {
  $(document).on("click", ".Action-btn", function () {
    $(this).addClass("disabled"); // Disable only the clicked button
    let requestId = $(this).data("id"); // Get the ID of the Request
    let ActionType = $(this).text(); // Get the Action Needed to perform
    console.log(requestId);
    console.log(ActionType);

    // Change the status of Request via AJAX for the selected requestId
    $.ajax({
      url: "../../controllers/RequestActions.php", // Replace with the actual endpoint
      method: "POST",
      data: { id: requestId, Action: ActionType },
      dataType: "json", // Expect a JSON response
      success: function (response) {
        let msg = ""; // Default message initialization

        // Check the response and display a single message
        if (
          response.status ||
          response.blood_added ||
          response.blood_deducted
        ) {
          msg = "<div class='Sucess'>" + response.message + "</div>";
        } else {
          msg = "<div class='failure'>" + response.message + "</div>";
        }

        // Display the message
        $(".msg").html(msg);

        // Remove the message after 3 seconds
        setTimeout(function () {
          $(".msg").html("");
        }, 3000);

        // Refresh the list of requests
        RequestManager.fetchRequests();
      },
      error: function () {
        // Display failure message in case of an error
        let msg =
          "<div class='failure'>Failed to Perform Required Actions.</div>";
        $(".msg").html(msg);

        // Remove the message after 3 seconds
        setTimeout(function () {
          $(".msg").html("");
        }, 3000);
      },
    });
  });
});
