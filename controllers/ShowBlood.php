<?php
// Fetch aggregated blood stock from the database by blood group
$sql = "SELECT blood_group, SUM(blood_unit) as total_units FROM blood GROUP BY blood_group";
$result = mysqli_query($conn, $sql);

$bloodStock = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $bloodStock[] = $row; // Store each blood stock entry
    }
}
