<?php

include('../config/db.php');

// Get POST data
$campaignId = $_POST['id'];
$campaignName = $_POST['campaignName'];
$cityName = $_POST['cityName'];
$startingDate = $_POST['startingDate'];
$endingDate = $_POST['endingDate'];
$organizerName = $_POST['organizerName'];
$Address = $_POST['Address'];
$description = $_POST['description'];
$cityId = '';

//Get the id of slected city 
$sql = "SELECT city_id FROM city WHERE city_name = '$cityName'";
$res = mysqli_query($conn, $sql);
if ($res && mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $cityId = $row['city_id'];
}





if (!empty($campaignName) && !empty($startingDate) && !empty($endingDate) && !empty($organizerName) && !empty($Address) && !empty($description)) {
    // Prepare the SQL query
    $update_sql = "UPDATE campaign 
               SET campaign_name = '$campaignName', 
                   description = '$description', 
                   start_date = '$startingDate', 
                   end_date = '$endingDate', 
                   address = '$Address', 
                   organizer = '$organizerName', 
                   city_id = $cityId
               WHERE campaign_id = $campaignId";

    try {
        $update_res = mysqli_query($conn, $update_sql);
        if ($update_res) {
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
