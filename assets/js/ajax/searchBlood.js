$(document).ready(function () {
  $(document).on("click", "#search-blood-btn", function (event) {
    event.preventDefault();
    $.ajax({
      url: "http://localhost/BBMS/controllers/FetchDonors.php", // PHP file that fetches the donor data
      method: "POST",
      data: {
        BloodGroup: $("#blood-group").val(),
        CityName: $("#city").val(),
      },
      dataType: "json",
      success: function (response) {
        let output = "";
        if (response.length > 0) {
          $.each(response, function (index, donor) {
            const profilePic = donor.profile_pic
              ? "http://localhost/BBMS/assets/images/Profile-Pics/" +
                donor.profile_pic
              : "http://localhost/BBMS/assets/images/Profile-Pics/profile-pic.png"; // Default image if not set

            output += `
                                  <div class="donor-card card flex-column">
                                      <div class="img-box" data-blood-type="${donor.blood_group}">
                                          <img src="${profilePic}" alt="volunteer">
                                      </div>
                                      <p>${donor.name}</p>
                                      <div class="location flex">
                                          <img src="http://localhost/BBMS/assets/images/Location.svg">
                                          <p>${donor.city}</p>
                                      </div>
                                      <div class="mobile-number flex">
                                          <img src="http://localhost/BBMS/assets/images/Contact-Icon.svg">
                                          <p>${donor.mobile_no}</p> <!-- Displaying mobile number -->
                                      </div>
                                  </div>
                              `;
          });
        } else {
          output = "<p class='text-center failure'>No donors found!</p>";
          setTimeout(function () {
            output = "";
            $("#search-results").html(output);
          }, 3000);
        }

        // Assuming you have a div with id 'search-results' to display the cards
        $("#search-results").html(output);
      },
      error: function (error) {
        console.log("Error fetching data", error);
      },
    });
  });
});
