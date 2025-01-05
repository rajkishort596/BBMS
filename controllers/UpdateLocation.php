<?php

include('../config/db.php');

// Get POST data
$id = $_POST['id'];
// $country = $_POST['country'];
// $state = $_POST['state'];
$city = $_POST['city'];
$area = $_POST['area'];
$location = $_POST['location'];

if (!empty($city) && !empty($area) && !empty($location)) {

    // 1. Update the city name in the 'city' table
    $city_query = "UPDATE city 
                      SET city_name = '$city' 
                      WHERE city_id = (SELECT city_id 
                                       FROM area 
                                       WHERE area_id = $id)";

    // 2. Update the area name and location_name (address) in the 'area' table
    $area_query = "UPDATE area 
                      SET area_name = '$area', 
                          location_name = '$location' 
                      WHERE area_id = $id";

    $city_result = mysqli_query($conn, $city_query);
    $area_result = mysqli_query($conn, $area_query);

    // Check if both updates were successful
    if ($city_result && $area_result) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo -1;
}
// Close the database connection
mysqli_close($conn);
