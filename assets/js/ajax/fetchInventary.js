var InventaryManager = InventaryManager || {};
// Fetch available blood inventory on page load
$(document).ready(function () {
  InventaryManager.showBloodData = () => {
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
                      <td><span class="expiry-date">${
                        row.expiry_date
                      }</span></td>
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
  InventaryManager.showBloodData();
});
