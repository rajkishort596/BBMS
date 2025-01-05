<?php
// Get user information from session
$user_id = $_SESSION['id'];
$userType = $_SESSION['usertype']; // Can be 'donor' or 'recipient'

// Default values for query
$id = ''; // Will store whether to use donor_id or recipient_id based on userType

// Check user type and set the respective column
if ($userType === 'donor') {
    $id = 'donor_id';
} elseif ($userType === 'recipient') {
    $id = 'recipient_id';
}

// Query to fetch the last request/donation history based on user type
$sql = "SELECT completion_date, location, b_units
        FROM requests 
        WHERE $id = '$user_id' AND status = 'Completed'
        ORDER BY request_date DESC 
        LIMIT 1";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Fetch the request/donation data
    $row = mysqli_fetch_assoc($result);
    // Output the data (You can format this part as needed)
    $Request_Date = $row['completion_date'];
    $Request_Location = $row['location'];
    $Blood_Units = $row['b_units'];
} else {
    // No completed history available for the user
    $Request_Date = "Not yet";
    $Request_Location = "____________";
    $Blood_Units = "0";
}
