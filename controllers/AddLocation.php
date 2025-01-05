<?php
include('../config/db.php');

// Capture the input data
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);

if (empty($data)) {
    echo 0; // If data is empty, return 0 (failure)
    exit;
}

$countryName = $mydata['CountryName'];
$stateName = $mydata['StateName'];
$cityName = $mydata['CityName'];
$areaName = $mydata['AreaName'];
$locationName = $mydata['Location'];

// Check if any field is empty
if (empty($countryName) || empty($stateName) || empty($cityName) || empty($areaName) || empty($locationName)) {
    echo -1; // Return -1 if any field is empty
    exit;
}

// Step 1: Check if the country exists
$country_check_sql = "SELECT country_id FROM country WHERE country_name = '$countryName'";
$country_result = mysqli_query($conn, $country_check_sql);
if (mysqli_num_rows($country_result) > 0) {
    $country_row = mysqli_fetch_assoc($country_result);
    $country_id = $country_row['country_id']; // Use existing country ID
} else {
    // Insert into Country table
    $country_sql = "INSERT INTO country (country_name) VALUES ('$countryName')";
    if (mysqli_query($conn, $country_sql)) {
        $country_id = mysqli_insert_id($conn); // Get the ID of the inserted country
    } else {
        echo 0; // Insertion failed
        exit;
    }
}

// Step 2: Check if the state exists for the country
$state_check_sql = "SELECT state_id FROM state WHERE state_name = '$stateName' AND country_id = '$country_id'";
$state_result = mysqli_query($conn, $state_check_sql);
if (mysqli_num_rows($state_result) > 0) {
    $state_row = mysqli_fetch_assoc($state_result);
    $state_id = $state_row['state_id']; // Use existing state ID
} else {
    // Insert into State table
    $state_sql = "INSERT INTO state (state_name, country_id) VALUES ('$stateName', '$country_id')";
    if (mysqli_query($conn, $state_sql)) {
        $state_id = mysqli_insert_id($conn); // Get the ID of the inserted state
    } else {
        echo 0; // Insertion failed
        exit;
    }
}

// Step 3: Check if the city exists for the state
$city_check_sql = "SELECT city_id FROM city WHERE city_name = '$cityName' AND state_id = '$state_id'";
$city_result = mysqli_query($conn, $city_check_sql);
if (mysqli_num_rows($city_result) > 0) {
    $city_row = mysqli_fetch_assoc($city_result);
    $city_id = $city_row['city_id']; // Use existing city ID
} else {
    // Insert into City table
    $city_sql = "INSERT INTO city (city_name, state_id) VALUES ('$cityName', '$state_id')";
    if (mysqli_query($conn, $city_sql)) {
        $city_id = mysqli_insert_id($conn); // Get the ID of the inserted city
    } else {
        echo 0; // Insertion failed
        exit;
    }
}

// Step 4: Insert into Area table
$area_sql = "INSERT INTO area (area_name, location_name, state_id, city_id) 
             VALUES ('$areaName', '$locationName', '$state_id', '$city_id')";
if (mysqli_query($conn, $area_sql)) {
    echo 1; // Success, return 1
} else {
    echo 0; // Insertion failed
}

// Close the database connection
mysqli_close($conn);
