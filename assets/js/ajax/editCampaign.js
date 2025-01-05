$(document).ready(function () {
  let campaignId = null;

  // Function to switch the form to edit mode
  function switchToEditMode() {
    $(".create-campaign").click();
    $(".create-campaign p").text("Update Campaign");
    $(".create-campaign-contaier h3").text("Edit Donation Campaign");
    $(".create-campaign-contaier p").text("");
    $("#Create-campaign-btn")
      .text("Update Campaign")
      .attr("id", "update-campaign-btn"); // Change the id to 'update-campaign-btn'
    $(".create-campaign")
      .addClass("update-campaign")
      .removeClass("create-campaign");
    $(".update-campaign").click();
  }

  // Function to switch the form back to add mode
  function switchToAddMode() {
    $("#update-campaign-btn")
      .text("Create Campaign")
      .attr("id", "Create-campaign-btn");
    $(".update-campaign")
      .addClass("create-campaign")
      .removeClass("update-campaign");
    $(".create-campaign p").text("Create Campaign");
    $(".create-campaign-contaier h3").text("Create Donation Campaign");
    $(".create-campaign-contaier p").text(
      "Start a new blood donation campaign by filling out the campaign details below. Make sure to specify the Address, date, and time to ensure successful donor participation."
    );
    $("#CreateCampiagnForm")[0].reset();
  }

  // On edit button click, populate the edit form
  $(document).on("click", "#Edit-campaign-btn", function () {
    campaignId = $(this).data("id"); // Set campaignId to the selected campaign's ID
    switchToEditMode();
    $.ajax({
      url: "../../controllers/ShowCampaignDetails.php",
      method: "POST",
      data: { campaign_id: campaignId },
      dataType: "json",
      success: function (response) {
        console.log(response);
        $("#campaignName").val(response.campaign_name);
        $("#cityName option").each(function () {
          if ($(this).val() == response.city) {
            $(this).prop("selected", true);
          }
        });
        $("#startingDate").val(response.start_date);
        $("#endingDate").val(response.end_date);
        $("#organizerName").val(response.organizer);
        $("#Address option").each(function () {
          if ($(this).val() == response.address) {
            $(this).prop("selected", true);
          }
        });
        $("#description").val(response.description);
      },
      error: function () {
        alert("Failed to load location details.");
      },
    });
  });

  // On update button click, update the campaign (attached once)
  $(document).on("click", "#update-campaign-btn", function (e) {
    e.preventDefault();
    if (!campaignId) return; // Ensure campaignId is set

    $.ajax({
      url: "../../controllers/UpdateCampaign.php",
      method: "POST",
      data: {
        id: campaignId, // Use the preserved campaignId
        campaignName: $("#campaignName").val().trim(),
        cityName: $("#cityName").val(),
        startingDate: $("#startingDate").val(),
        endingDate: $("#endingDate").val(),
        organizerName: $("#organizerName").val(),
        Address: $("#Address").val(),
        description: $("#description").val(),
      },
      success: function (response) {
        let msg;
        $(".tab-link[data-target='upcoming-campaign']").click();
        if (response == 1) {
          msg = "<div class='Sucess'>Campaign updated successfully.</div>";
          switchToAddMode();
          CampaignManager.fetchCampaigns();
          console.log("updated campaign with id:" + campaignId);
        } else if (response == 0) {
          msg = "<div class='Sucess'>Failed to update Campaign.</div>";
        } else if (response == -1) {
          msg = "<div class='Empty'>Please fill in all required fields</div>";
        } else {
          msg =
            "<div class='failure'>An error occurred. Please try again.</div>";
        }
        $(".msg").html(msg);
        setTimeout(function () {
          $(".msg").html("");
        }, 3000);
      },
      error: function () {
        $(".msg").html("Failed to update Campaign.");
      },
    });
  });
});
