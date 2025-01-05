<?php
// Include Database connection
include('../config/db.php');

// Query to fetch 8 random donors
$sql = "SELECT name, blood_group, city, profile_pic FROM donors ORDER BY RAND() LIMIT 8";

$result = mysqli_query($conn, $sql);

// Prepare response
$response = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
} else {
    $response['message'] = "No donors found!";
}

// Send the response in JSON format
echo json_encode($response);

// Close connection
mysqli_close($conn);
