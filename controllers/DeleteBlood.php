<?php
include('../config/db.php');

// Get the raw POST data and decode it
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);

$bloodIDs = $mydata['bloodIDs']; // Array of blood IDs

if (!empty($bloodIDs)) {
    $ids = implode(",", $bloodIDs); // Convert array to comma-separated string
    $delete_sql = "DELETE FROM blood WHERE blood_id IN ($ids)";

    $delete_res = mysqli_query($conn, $delete_sql);

    if ($delete_res) {
        // Deletion successful
        echo 1;
    } else {
        // Deletion failed
        echo 0;
    }
} else {
    echo -1; // No IDs provided
}
