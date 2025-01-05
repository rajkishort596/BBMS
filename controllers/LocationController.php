<?php

// Fetch countries
$country_sql = "SELECT country_name FROM country";
$country_res = mysqli_query($conn, $country_sql);

$countries = []; // Initialize an empty array to store countries

// Check if the query was successful and there are rows
if ($country_res && mysqli_num_rows($country_res) > 0) {
    // Loop through the result set and fetch each country
    while ($row = mysqli_fetch_assoc($country_res)) {
        // Add the country name to the $countries array
        $countries[] = $row['country_name'];
    }
} else {
    //No countries found
    echo "No countries found.";
}

// Fetch states
$state_sql = "SELECT state_name FROM state";
$state_res = mysqli_query($conn, $state_sql);

$states = []; // Initialize an empty array to store states

if ($state_res && mysqli_num_rows($state_res) > 0) {
    // Loop through the result set and fetch each state
    while ($row = mysqli_fetch_assoc($state_res)) {
        // Add the state name to the $states array
        $states[] = $row['state_name'];
    }
} else {
    echo "No states found.";
}

// Fetch cities
$city_sql = "SELECT city_name FROM city";
$city_res = mysqli_query($conn, $city_sql);

$cities = []; // Initialize an empty array to store cities

if ($city_res && mysqli_num_rows($city_res) > 0) {
    // Loop through the result set and fetch each city
    while ($row = mysqli_fetch_assoc($city_res)) {
        // Add the city name to the $cities array
        $cities[] = $row['city_name'];
    }
} else {
    echo "No cities found.";
}

// Fetch areas
$area_sql = "SELECT area_name, location_name FROM area";
$area_res = mysqli_query($conn, $area_sql);

$areas = []; // Initialize an empty array to store areas
$locations = []; // Initialize an empty array to store locations

if ($area_res && mysqli_num_rows($area_res) > 0) {
    // Loop through the result set and fetch each area
    while ($row = mysqli_fetch_assoc($area_res)) {
        // Add the area name to the $areas array
        $areas[] = $row['area_name'];
        $locations[] = $row['location_name'];
    }
} else {
    echo "No areas and locations found.";
}

// echo $countries[0] . "<br>";
// echo $states[0] . "<br>";
// echo $cities[0] . "<br>";
// echo $areas[0] . "<br>";
// echo $locations[0] . "<br>";
