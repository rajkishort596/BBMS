<?php
include("../config/db.php");
session_start();
// Get the raw POST data and decode it
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$user_id = $_SESSION['id'];
$userType = $_SESSION['usertype'];
$Location = $mydata['Location'];
$BloodGroup = $mydata['BloodGroup'];
$BloodUnits = $mydata['BloodUnits'];
$RequestDate = date('Y-m-d');

if ($userType === 'donor' || $userType === 'recipient') {

    // Determine the correct donor_id and recipient_id values
    if ($userType === 'donor') {
        $donorid = $user_id;
        $recipientid = "NULL";
    } else {
        $recipientid = $user_id;
        $donorid = "NULL";
    }

    if (!empty($Location) && !empty($BloodUnits)) {
        // Insert query to insert request data in requests table.
        $sql = "INSERT INTO requests(request_type, donor_id, recipient_id, location, blood_group, status, request_date, b_units)
        VALUES('$userType', " . ($donorid !== "NULL" ? $donorid : "NULL") . ", " . ($recipientid !== "NULL" ? $recipientid : "NULL") . ",
        '$Location', '$BloodGroup', 'Pending', '$RequestDate', '$BloodUnits')";

        // Execute the query
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // Insertion successful
            echo 1;
        } else {
            // Insertion Failed
            echo 0;
        }
    } else {
        // Required fields are missing, return -1
        echo -1;
    }

    // Close the database connection
    mysqli_close($conn);
}
