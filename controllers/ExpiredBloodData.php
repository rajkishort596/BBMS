<?php

include('../config/db.php');
// Get today's date

$today = date("Y-m-d");

// Fetch only expired blood units
$query = "SELECT * FROM blood WHERE expiry_date < '$today'";
$result = mysqli_query($conn, $query);

// Convert the data to JSON to pass it to the frontend
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);
