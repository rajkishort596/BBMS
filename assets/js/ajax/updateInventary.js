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

  // //Dynamically show inventary after Blood Addition
  // $(document).on("click", "#AddBlood", function () {
  //   InventaryManager.showBloodData();
  // });

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
            InventaryManager.showBloodData();
            showModal("Update sucessfull!", "Sucess");
          } else {
            showModal("Update failed!", "failure");
          }
        },
      });
    }
  });
});
