<?php
include('../config/db.php');

// Get the raw POST data and decode it
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);

$bloodID = $mydata['BloodID'];
$bloodUnits = $mydata['BloodUnits'];
$bloodExpiry = $mydata['ExpiryDate'];

if (!empty($bloodID) && !empty($bloodUnits) && !empty($bloodExpiry)) {
    // Update query based on b_id
    $update_sql = "UPDATE blood SET blood_unit = '$bloodUnits', expiry_date = '$bloodExpiry' WHERE blood_id = '$bloodID'";
    try {
        $update_res = mysqli_query($conn, $update_sql);
        if ($update_res) {
            // Blood added successfully
            echo 1;
        }
    } catch (mysqli_sql_exception) {
        // Blood addition failed, return 0 instead of a fatal error
        echo 0;
    }
} else {
    // If any required field is empty
    echo -1;
}
