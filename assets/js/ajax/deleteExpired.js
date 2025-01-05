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

  // Function to show expired blood units
  const showExpiredBlood = () => {
    $.ajax({
      url: "../../controllers/ExpiredBloodData.php",
      type: "GET",
      dataType: "json",
      success: function (data) {
        if (data.length > 0) {
          let tableRows = "";

          data.forEach(function (row) {
            tableRows += `
              <tr>
                <td>${row.blood_group}</td>
                <td>${row.blood_unit} Units</td>
                <td>${row.expiry_date}</td>
                <td><span class="condition expired">Expired</span></td>
                <td><input type="checkbox" class="select-blood" data-id="${row.blood_id}"></td>
              </tr>
            `;
          });

          $("#expired-blood-table").html(tableRows);
          //Enable the select All and Delete Button
          $("#select-all, #delete-expired-btn").removeClass("disabled");
        } else {
          $("#expired-blood-table").html(
            "<tr><td colspan='5'>No expired blood units found.</td></tr>"
          );
          //disable the select All and Delete Button
          $("#select-all, #delete-expired-btn").addClass("disabled");
        }
      },
      error: function () {
        $("#expired-blood-table").html(
          "<tr><td colspan='5'>Unable to load data.</td></tr>"
        );
      },
    });
  };

  showExpiredBlood();

  // Event listener for dynamically updating the blood table after a button click
  $(document).on("click", "#btn", function () {
    showExpiredBlood();
  });

  // Select all functionality
  let allSelected = false;

  $(document).on("click", "#select-all", function () {
    if (!allSelected) {
      $(".select-blood").prop("checked", true);
      $(this).text("Cancel");
    } else {
      $(".select-blood").prop("checked", false);
      $(this).text("Select All");
    }
    allSelected = !allSelected;
  });

  // Detect manual changes to checkboxes and update the button text
  $(document).on("change", ".select-blood", function () {
    const checkedCount = $(".select-blood:checked").length;
    const totalCount = $(".select-blood").length;

    if (checkedCount === totalCount) {
      $("#select-all").text("Cancel");
      allSelected = true;
    } else if (checkedCount === 0) {
      $("#select-all").text("Select All");
      allSelected = false;
    } else {
      $("#select-all").text("Select All");
      allSelected = false;
    }
  });

  // Function to collect selected blood units
  const getSelectedBloodUnits = () => {
    let selectedBlood = [];
    $(".select-blood:checked").each(function () {
      const bloodID = $(this).data("id");
      selectedBlood.push(bloodID);
    });
    return selectedBlood;
  };

  // Delete selected expired blood units on delete button click
  $(document).on("click", "#delete-expired-btn", function () {
    const selectedBlood = getSelectedBloodUnits();
    if (selectedBlood.length > 0) {
      $.ajax({
        url: "../../controllers/DeleteBlood.php",
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify({ bloodIDs: selectedBlood }),
        success: function (response) {
          if (response == 1) {
            showExpiredBlood();
            showModal("Expired blood units deleted successfully!", "Sucess");
            InventaryManager.showBloodData();
          } else {
            showModal("Failed to delete blood units", "failure");
          }
        },
        error: function () {
          showModal("Error occurred while deleting blood units.", "failure");
        },
      });
    } else {
      showModal("Please select at least one blood unit to delete.", "failure");
    }
  });
});
