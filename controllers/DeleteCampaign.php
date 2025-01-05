<?php
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the campaign ID from the POST request
    $campaignId = $_POST['id'];

    // Perform the deletion from the database
    // Assuming you have a database connection in $conn
    $sql = "DELETE FROM campaign WHERE campaign_id = $campaignId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Campaign Deleted Sucessfully
        echo 1;
    } else {
        // Failed to Delete Campaign
        echo 0;
    }

    mysqli_close($conn);
}
