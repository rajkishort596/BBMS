<?php

// Include the database connection file
include '../config/db.php';

if (isset($_POST['id'])) {
    $locationId = $_POST['id'];

    // Fetch the location details from the database
    $sql = "SELECT country.country_name, state.state_name, city.city_name, area.area_name, area.location_name
            FROM area
            JOIN city ON area.city_id = city.city_id
            JOIN state ON city.state_id = state.state_id
            JOIN country ON state.country_id = country.country_id
            WHERE area_id = $locationId";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        // Return data as JSON
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Location not found']);
    }
} else {
    // If campaign_id is not set, return an error message
    echo json_encode(['error' => 'Invalid request']);
}
