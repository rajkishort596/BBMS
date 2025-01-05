$(document).ready(function () {
  // Event listener for accepting a request
  $(document).on("click", "#accept-request-btn", function () {
    let recipientId = $(this).data("id"); // Fetch recipient ID from button data attribute

    // Assign recipientId to the confirm button as a data-id attribute
    $("#confirm-btn").attr("data-id", recipientId);

    // Show the modal popup
    $("#modalPopup").css("display", "flex").fadeIn();

    // Close the modal when the close button is clicked
    $(document).on("click", ".close-btn", function () {
      $("#modalPopup").fadeOut();
    });
  });

  // Get blood group type from the element with the class 'blood-group'
  let bloodGroup = $(".blood-group").data("blood-type");
  console.log(bloodGroup);

  // Function to send a request via AJAX
  const MakeRequest = () => {
    // Collect request data
    let RequestData = {
      Location: $(".request_location").text(),
      BloodGroup: bloodGroup,
      BloodUnits: $(".request_blood-units").text(),
    };
    console.log(RequestData);

    $.ajax({
      url: "../../controllers/MakeRequest.php", // URL for the request
      type: "POST", // Method type
      data: JSON.stringify(RequestData), // Send form data as JSON
      contentType: "application/json", // Content type set to JSON
      success: function (response) {
        let msg;
        if (response == 1) {
          msg = "<div class='Success'>Request Accepted successfully</div>";
        } else if (response == 0) {
          msg = "<div class='failure'>Request Acceptance failed</div>";
        }

        // Display message in the .msg element
        $(".msg").html(msg);

        // Remove the message after 3 seconds
        setTimeout(function () {
          $(".msg").html("");
        }, 3000);
      },
    });
  };

  // Function to change the status of a request via AJAX
  const changeStatus = (recipientId) => {
    $.ajax({
      url: "../../controllers/RejectedRequestActions.php", // URL for status update
      method: "POST", // POST request method
      data: { id: recipientId }, // Send recipient ID
      success: function (response) {
        let msg = ""; // Default message
        console.log(response);
        if (response == 1) {
          msg =
            "<div class='Sucess'>Request Accepted successfully and Status changed</div>";
        } else if (response == 0) {
          msg = "<div class='failure'>Request Acceptance failed</div>";
        }

        // Display the message
        $(".msg").html(msg);

        // Remove the message after 3 seconds
        setTimeout(function () {
          $(".msg").html("");
        }, 3000);
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
  };

  // Event listener for confirming the request
  $(document).on("click", "#confirm-btn", function () {
    let recipientId = $(this).data("id"); // Get the recipient ID from the confirm button
    MakeRequest(); // Call the MakeRequest function
    changeStatus(recipientId); // Update the request status

    // Close the modal popup
    $("#modalPopup").fadeOut();

    // Fetch and update rejected requests (example function, assumed to be implemented)
    RejectedRequestManager.fetchRejectedRequests(bloodGroup);
  });
});
