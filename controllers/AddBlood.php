<?php
include('../config/db.php');

// Capture the input data
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$bloodGroup = $mydata['BloodGroup'];
$bloodUnits = $mydata['BloodUnits'];
$bloodExpiry = $mydata['ExpiryDate'];
$currentDateTime = date('Y-m-d H:i:s'); // Get the current date and time

if (!empty($bloodGroup) && !empty($bloodUnits) && !empty($bloodExpiry)) {
    // Prepare the SQL query
    $insert_sql = "INSERT INTO blood(blood_group, blood_unit, expiry_date, created_at, updated_at) 
                   VALUES ('$bloodGroup', '$bloodUnits', '$bloodExpiry', '$currentDateTime', '$currentDateTime')";
    try {
        $insert_res = mysqli_query($conn, $insert_sql);
        if ($insert_res) {
            // Blood added successfully
            echo 1;
        }
    } catch (mysqli_sql_exception) {
        // Blood addition failed, return 0 instead of a fatal error
        echo 0;
    }
} else {
    // Required fields are missing, return -1
    echo -1;
}

// Close the database connection
mysqli_close($conn);
