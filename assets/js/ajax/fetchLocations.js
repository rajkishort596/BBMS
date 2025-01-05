var LocationManager = LocationManager || {};
$(document).ready(function () {
  // Function to fetch the current location data
  LocationManager.fetchLocations = () => {
    $.ajax({
      url: "../../controllers/FetchLocations.php", // The PHP file already for showing locations
      method: "GET",
      success: function (response) {
        // console.log(response);
        $("#Location-Table tbody").html(response); // Populate table rows
      },
    });
  };

  // Fetch and populate locations when the page loads
  LocationManager.fetchLocations();
});
