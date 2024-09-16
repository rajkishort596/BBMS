$(document).ready(function () {
  // Function to show modal
  const showModal = (message, status) => {
    $("#modalMessage").text(message);
    $("#modalMessage").addClass(status);
    $("#modalPopup").fadeIn();
  };
  // Function to hide modal
  const hideModal = () => {
    $("#modalPopup").fadeOut();
  };
  // Close the modal when the user clicks on the close button
  $(".close-btn").on("click", function () {
    hideModal();
  });

  // Fetch available blood inventory on page load
  const showBloodData = () => {
    $.ajax({
      url: "../../controllers/BloodData.php", // Path to the PHP file that fetches the data
      type: "GET",
      dataType: "json", // Expecting JSON response
      success: function (data) {
        if (data.length > 0) {
          let tableRows = "";

          // Get today's date
          let today = new Date();

          // Loop through the data and create table rows
          data.forEach(function (row) {
            // Parse the expiry date from the data
            let expiryDate = new Date(row.expiry_date);

            // Determine condition based on expiry date
            let condition = expiryDate < today ? "Expired" : "Good";

            tableRows += `
              <tr>
                <td>${row.blood_id}</td>
                <td>${row.blood_group}</td>
                <td><span class="blood-units">${
                  row.blood_unit
                }</span> Units</td>
                <td><span class="expiry-date">${row.expiry_date}</span></td>
                <td><span class="condition ${
                  condition === "Expired" ? "expired" : "good"
                }">${condition}</span></td>
                <td>
                  <button id="btn" class="edit-btn Yellow-btn" type="submit">Edit</button>
                </td>
              </tr>
            `;
          });

          // Insert the rows into the table body
          $("#blood-inventory-table").html(tableRows);
        } else {
          $("#blood-inventory-table").html(
            "<tr><td colspan='6'>No available blood units found.</td></tr>"
          );
        }
      },
      error: function () {
        // Handle errors
        $("#blood-inventory-table").html(
          "<tr><td colspan='6'>Unable to load data.</td></tr>"
        );
      },
    });
  };

  showBloodData();
  //Dynamically show inventary after Blood Addition
  $(document).on("click", "#AddBlood", function () {
    showBloodData();
  });

  // Code for the dynamic Edit/Update buttons
  $(document).on("click", "#btn", function () {
    const row = $(this).closest("tr");
    row.css("backgroundColor", "hsl(200, 43%, 95%)");
    if ($(this).text() === "Edit") {
      $(this).text("Update").removeClass("edit-btn").addClass("update-btn");

      let bloodUnits = row.find(".blood-units").text().trim();
      let expiryDate = row.find(".expiry-date").text().trim();

      row
        .find(".blood-units")
        .html(`<input type="text" value="${bloodUnits}" class="edit-units">`);
      row
        .find(".expiry-date")
        .html(`<input type="text" value="${expiryDate}" class="edit-expiry">`);
    } else if ($(this).text() === "Update") {
      let updatedUnits = row.find(".edit-units").val();
      let updatedExpiry = row.find(".edit-expiry").val();

      let UpdatedBloodData = {
        BloodID: row.find("td:first").text(),
        // BloodGroup: row.find("td:second").text(),
        BloodUnits: updatedUnits,
        ExpiryDate: updatedExpiry,
      };
      $.ajax({
        url: "../../controllers/UpdateBlood.php",
        type: "POST",
        data: JSON.stringify(UpdatedBloodData),
        success: function (response) {
          if (response == 1) {
            row.find(".blood-units").text(`${updatedUnits}`);
            row.find(".expiry-date").text(updatedExpiry);
            row
              .find(".update-btn")
              .text("Edit")
              .removeClass("update-btn")
              .addClass("edit-btn");
            showBloodData();
            showModal("Update sucessfull!", "Sucess");
          } else {
            showModal("Update failed!", "failure");
          }
        },
      });
    }
  });
});
