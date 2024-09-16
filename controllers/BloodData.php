<?php
include('../config/db.php');

// Query to get the available blood inventory
$sql = "SELECT blood_id, blood_group, blood_unit, expiry_date FROM blood WHERE blood_unit > 0"; // Assuming blood units are greater than 0 means available
$result = mysqli_query($conn, $sql);

$bloodInventory = array(); // Initialize an array to store the data

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $bloodInventory[] = $row; // Add each row to the inventory array
    }
}

// Return data as JSON
echo json_encode($bloodInventory);
