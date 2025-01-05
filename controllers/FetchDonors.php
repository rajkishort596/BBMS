<?php
//Include Database connection
include('../config/db.php');



$BloodGroup = $_POST['BloodGroup'];
$CityName = $_POST['CityName'];
// Query to fetch donor details
$sql = "SELECT name, city, mobile_no, blood_group, profile_pic FROM donors WHERE city = '$CityName' AND blood_group ='$BloodGroup'";
$result = mysqli_query($conn, $sql);

$donors = array();

// Check if there are results
if (mysqli_num_rows($result) > 0) {
    // Fetch results into an array
    while ($row = mysqli_fetch_assoc($result)) {
        $donors[] = $row;
    }
}

// Return the data as a JSON object
echo json_encode($donors);

// Close the connection
mysqli_close($conn);
