<?php
// Include the database connection file
include '../config/db.php';

if (isset($_POST['campaign_id'])) {
    $campaign_id = $_POST['campaign_id'];

    // Fetch campaign details using procedural style
    $campaign_sql = "SELECT * FROM campaign WHERE campaign_id =  $campaign_id";
    $result = mysqli_query($conn, $campaign_sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the campaign details as an associative array
        $campaign = mysqli_fetch_assoc($result);

        // Return campaign details as JSON
        echo json_encode($campaign);
    } else {
        // If no campaign is found, return an error message
        echo json_encode(['error' => 'No campaign found']);
    }

    // Close the connection
    mysqli_close($conn);
} else {
    // If campaign_id is not set, return an error message
    echo json_encode(['error' => 'Invalid request']);
}
