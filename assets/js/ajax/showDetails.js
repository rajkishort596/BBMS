$(document).ready(function () {
  $(document).on("click", ".detail-link, #join", function (event) {
    event.preventDefault(); // Prevent default link behavior

    // Get campaign ID from the clicked link
    const campaignId = $(this).data("id");

    // Make an AJAX call to fetch campaign details
    $.ajax({
      url: "../../controllers/ShowCampaignDetails.php", // Updated PHP file name
      type: "POST",
      data: { campaign_id: campaignId },
      dataType: "json", // Expect JSON response
      success: function (response) {
        console.log(response);
        if (response.error) {
          alert(response.error);
        } else {
          // Populate details section with the fetched data
          $(".Details-section h3").text(response.campaign_name);
          $(".duration p").text(
            `From: ${response.start_date} to ${response.end_date}`
          );
          $(".location p").text(response.address);
          $(".description").text(response.description);
          // Populate Registration section with the fetched data
          $(".Registration-section #campaign").html(
            `<option selected value= "${response.campaign_name}" > ${response.campaign_name}</option>`
          );
          $(".Registration-section #location").html(
            `<option selected value= "${response.address}" > ${response.address}</option>`
          );
          // Populate Confirmation section with the fetched data
          $(".confirmation-section .campaign-name").text(
            response.campaign_name
          );
          $(".registration-details .campaign-name").text(
            "Campaign: " + response.campaign_name
          );
          $(".registration-details .donation-location").text(
            "location: " + response.address
          );
        }
      },
      error: function () {
        alert("Error retrieving campaign details.");
      },
    });
  });
});
