<?php
include('../config/db.php');

//capture the input data
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$campaignName = $mydata['CampaignName'];
$startingDate = $mydata['StartingDate'];
$endingDate = $mydata['EndingDate'];
$organizerName = $mydata['OrganizerName'];
$Address = $mydata['Address'];
$description = $mydata['description'];
$currentDateTime = date('Y-m-d H:i:s'); // Get the current date and time

// echo $campaignName . " " . $startingDate . " " . $endingDate . " " . $OrganizerName . " " . $Address . " " . $description;

if (!empty($campaignName) && !empty($startingDate) && !empty($endingDate) && !empty($organizerName) && !empty($Address) && !empty($description)) {
    // Prepare the SQL query
    $insert_sql = "INSERT INTO campaign(campaign_name, description, start_date, end_date, address, organizer, created_at,city_id) 
                   VALUES ('$campaignName', '$description', '$startingDate', '$endingDate', '$Address','$organizerName','$currentDateTime', 1)";
    try {
        $insert_res = mysqli_query($conn, $insert_sql);
        if ($insert_res) {
            // Campaign created successfully
            echo 1;
        }
    } catch (mysqli_sql_exception) {
        // Campaign creation failed, return 0 instead of a fatal error
        echo 0;
    }
} else {
    // Required fields are missing, return -1
    echo -1;
}

// Close the database connection
mysqli_close($conn);
