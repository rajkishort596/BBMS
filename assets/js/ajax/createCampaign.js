$(document).ready(function () {
  //Adding Click Event listener on Create Campaign button
  $("#Create-campaign").on("click", (event) => {
    event.preventDefault();
    //collect form daa
    let CampaignData = {
      CampaignName: $("#campaignName").val(),
      StartingDate: $("#startingDate").val(),
      EndingDate: $("#endingDate").val(),
      OrganizerName: $("#organizerName").val(),
      Address: $("#Address").val(),
      description: $("#description").val(),
    };
    console.log(JSON.stringify(CampaignData));
    //Send the form data via AJAX
    $.ajax({
      url: "../../controllers/CreateCampaign.php",
      type: "POST",
      data: JSON.stringify(CampaignData),
      contentType: "application/json",
      success: function (response) {
        let msg;
        if (response == 1) {
          msg = "<div class='Sucess'>Campaign created successfully</div>";
          $("#CreateCampiagnForm")[0].reset(); // Reset form only on success
        } else if (response == 0) {
          msg = "<div class='failure'>Campaign creation failed</div>";
        } else {
          msg = "<div class='Empty'>Please fill in all required fields</div>";
        }
        $(".msg").html(msg); // Show the message in .msg element
      },
      error: function () {
        let msg =
          "<div class='failure'>An error occurred. Please try again.</div>";
        $(".msg").html(msg);
      },
    });
  });
});
