$(document).ready(function () {
  $.ajax({
    url: "../controllers/FetchVolunteers.php", // Path to your PHP file
    type: "GET",
    dataType: "json",
    success: function (response) {
      let output = "";

      if (response.length > 0) {
        // Loop through the donor data
        $.each(response, function (index, donor) {
          const profilePic = donor.profile_pic
            ? "../assets/images/Profile-Pics/" + donor.profile_pic
            : "../assets/images/Profile-Pics/profile-pic.png"; // Default image if not set

          output += `
                        <div class="volunteer-card card flex-column">
                            <div class="img-box" data-blood-type="${donor.blood_group}">
                                <img src="${profilePic}" alt="volunteer">
                            </div>
                            <p>${donor.name}</p>
                            <div class="location flex">
                                <img src="../assets/images/Location.svg">
                                <p>${donor.city}</p>
                            </div>
                        </div>
                    `;
        });
      } else {
        output = "<p>No donors found!</p>";
      }

      // Populate the div with the output
      $(".volunteer-list").html(output);
    },
    error: function () {
      $(".volunteer-list").html("<p>There was an error fetching the data!</p>");
    },
  });
});
