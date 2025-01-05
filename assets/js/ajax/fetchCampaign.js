var CampaignManager = CampaignManager || {};
$(document).ready(function () {
  CampaignManager.fetchCampaigns = () => {
    $.ajax({
      url: "../../controllers/ShowCampaign.php", // Replace with the actual endpoint
      type: "GET",
      success: function (response) {
        //   console.log(response);
        $(".campaign-carousel").html(response); // Update the campaigns container
        if (typeof initializeCarousel === "function") {
          initializeCarousel(".campaign-carousel", ".campaign-card"); // Call the function if it exists
        }

        if (typeof initializeCampaign === "function") {
          initializeCampaign(); // Call the function if it exists
        }
      },
      error: function () {
        alert("Failed to load campaigns. Please try again.");
      },
    });
  };
  CampaignManager.fetchCampaigns();
});
