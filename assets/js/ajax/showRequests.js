var RequestManager = RequestManager || {};
$(document).ready(function () {
  // Function to fetch the current location data
  // Create a namespace to encapsulate functions related to profile management

  RequestManager.fetchRequests = () => {
    $.ajax({
      url: "../../controllers/ShowRequests.php", // The PHP file you already have for showing locations
      method: "GET",
      success: function (response) {
        // console.log(response);
        $("#Request-Status-table").html(response); // Populate table rows
      },
    });
  };

  // Fetch and populate Requests when the page loads
  RequestManager.fetchRequests();
});
