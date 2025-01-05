$(document).ready(function () {
  $(document).on("click", "#Delete-campaign-btn", function () {
    let CampaignId = $(this).data("id");

    // Add CampaignId to confirm-btn as data-id
    $("#confirm-btn").attr("data-id", CampaignId);

    // Function to show modal
    $("#modalPopup").css("display", "flex").fadeIn();

    // Close the modal when the user clicks on the close button
    $(document).on("click", ".close-btn", function () {
      $("#modalPopup").fadeOut();
    });
  });
  $(document).on("click", "#confirm-btn", function () {
    // Get the campaign ID from the confirm button
    let CampaignId = $(this).data("id");

    // Perform an AJAX request to delete the campaign
    $.ajax({
      url: "../../controllers/DeleteCampaign.php", // URL of the server-side script to handle deletion
      type: "POST", // Use POST method
      data: { id: CampaignId }, // Send campaign ID as data
      success: function (response) {
        // Handle success response
        if (response == 1) {
          msg = "<div class='Sucess'>Campaign Deleted successfully.</div>";
          // Close the modal and refresh the page or update the UI as needed
          $("#modalPopup").fadeOut();
          // Fetch Campaigns
          CampaignManager.fetchCampaigns();
        } else {
          msg = "<div class='failure'>Failed to delete campaign.</div>";
        }
        $(".msg").html(msg); // Show the message in .msg element
        // Remove the message after 3 seconds
        setTimeout(function () {
          $(".msg").html("");
        }, 3000);
      },
      error: function (xhr, status, error) {
        // Handle error
        console.log("Error: " + error);
      },
    });
  });
});
