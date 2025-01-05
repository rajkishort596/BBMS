<?php
// Include the database connection
// include '../config/db.php';

// SQL query to count the number of pending requests
$sql = "SELECT COUNT(*) AS pending_count FROM requests WHERE status = 'Pending'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if query returned a result
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $pendingRequests = $row['pending_count'];
} else {
    echo "Error: " . mysqli_error($conn);
}
