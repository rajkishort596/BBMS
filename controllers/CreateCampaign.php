<?php
include('../config/db.php');

//capture the input data
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$campaignName = $mydata['CampaignName'];
$cityName = $mydata['CityName'];
$startingDate = $mydata['StartingDate'];
$endingDate = $mydata['EndingDate'];
$organizerName = $mydata['OrganizerName'];
$Address = $mydata['Address'];
$description = $mydata['description'];
$currentDateTime = date('Y-m-d H:i:s'); // Get the current date and time
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
    $insert_sql = "INSERT INTO campaign(campaign_name, description, start_date, end_date, address, organizer, created_at,city_id) 
                   VALUES ('$campaignName', '$description', '$startingDate', '$endingDate', '$Address','$organizerName','$currentDateTime', $cityId)";
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
