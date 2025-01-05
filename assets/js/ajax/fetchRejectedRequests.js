var RejectedRequestManager = RejectedRequestManager || {};
$(document).ready(function () {
  // Extract blood group using jQuery
  let bloodGroup = $(".blood-group").data("blood-type");
  console.log(bloodGroup);
  // AJAX request to fetch rejected requests matching donor's blood group
  RejectedRequestManager.fetchRejectedRequests = (bloodGroup) => {
    $.ajax({
      url: "../../controllers/FetchRejectedRequests.php",
      type: "POST",
      data: { blood_group: bloodGroup },
      success: function (response) {
        if (response != 0) {
          // Append the received response (cards) to the container
          $(".request-carousel").html(response);
          initializeCarousel(".request-carousel", ".request-card");
        } else {
          $(".request-carousel").html(
            "<p style='margin:auto;'>No matching rejected requests found.</p>"
          );
        }
      },
      error: function () {
        $(".request-carousel").html(
          "<p style='margin:auto;' class='failure'>Error fetching requests.</p>"
        );
      },
    });
  };

  RejectedRequestManager.fetchRejectedRequests(bloodGroup);
});
