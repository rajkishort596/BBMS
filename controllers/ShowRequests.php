<?php
include("../config/db.php");
session_start();

$user_id = $_SESSION['id'];
$userType = $_SESSION['usertype'];

$ID = '';

// Capture filter values from AJAX request
$filterType = isset($_POST['filterType']) ? $_POST['filterType'] : '';
// $filterBloodGroup = isset($_POST['filterBloodGroup']) ? $_POST['filterBloodGroup'] : '';
$filterStatus = isset($_POST['filterStatus']) ? $_POST['filterStatus'] : '';

// Prepare base SQL query
if ($userType === 'donor' || $userType === 'recipient') {
    if ($userType === 'donor') {
        $ID = "donor_id";
    } else {
        $ID = "recipient_id";
    }

    $sql = "SELECT * FROM requests WHERE $ID = $user_id";

    // Apply filters for donors/recipients
    if (!empty($filterStatus)) {
        $sql .= " AND status = '$filterStatus'";
    }
} else {
    // Fetch all requests for admin with filters
    $sql = "SELECT 
                IF(r.request_type = 'donor', d.name, rec.name) AS Name, 
                r.request_type, 
                r.blood_group, 
                r.b_units, 
                r.request_date, 
                r.location, 
                r.status, 
                r.request_id
            FROM 
                requests r
            LEFT JOIN 
                donors d ON r.donor_id = d.donor_id
            LEFT JOIN 
                recipients rec ON r.recipient_id = rec.recipient_id
            WHERE 1=1"; // Always true to allow appending conditions

    // Apply filters for admin
    if (!empty($filterType)) {
        if ($filterType != "All") {
            $sql .= " AND r.request_type = '$filterType'";
        }
    }
    if (!empty($filterStatus)) {
        $sql .= " AND r.status = '$filterStatus'";
    }
}

// Execute the query
$result = mysqli_query($conn, $sql);

// Display the results
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($userType === 'donor' || $userType === 'recipient') {
            // Display for donor/recipient
            echo "<tr>
                        <td>{$row['request_date']}</td>
                        <td>{$row['blood_group']}</td>
                        <td>{$row['b_units']}</td>
                        <td>{$row['location']}</td>
                        <td><span class='status {$row['status']}'>{$row['status']}</span></td>
                      </tr>";
        } else {
            // Display for admin
            echo "<tr>
                        <td>{$row['Name']}</td>
                        <td>{$row['request_type']}</td>
                        <td>{$row['blood_group']}</td>
                        <td>{$row['b_units']}</td>
                        <td>{$row['request_date']}</td>
                        <td>{$row['location']}</td>
                        <td><span class='status {$row['status']}'>{$row['status']}</span></td>
                        <td class='flex-column'>";

            // Conditionally disable or remove buttons based on request status
            if ($row['status'] === 'Pending') {
                echo "<button class='Red-btn btn Action-btn' data-id='{$row['request_id']}'>Reject</button>
                      <button class='Green-btn btn Action-btn' data-id='{$row['request_id']}'>Approve</button>";
            } elseif ($row['status'] === 'Approved') {
                echo "<button class='Red-btn btn Action-btn' data-id='{$row['request_id']}'>Cancel</button>
                      <button class='Blue-btn btn Action-btn' data-id='{$row['request_id']}'>Complete</button>";
            } elseif ($row['status'] === 'Completed') {
                echo "<button class='Red-btn btn Action-btn disabled' data-id='{$row['request_id']}'>Cancel</button>
                      <button class='Blue-btn btn Action-btn disabled' data-id='{$row['request_id']}'>Complete</button>";
            } else {
                // If the request is already approved/rejected, disable the buttons
                echo "<button class='Red-btn btn Action-btn disabled' data-id='{$row['request_id']}' disabled>Reject</button>
                      <button class='Green-btn btn Action-btn disabled' data-id='{$row['request_id']}' disabled>Approve</button>";
            }

            echo "</td></tr>";
        }
    }
} else {
    if ($userType === 'donor' || $userType === 'recipient') {
        echo "<tr><td colspan='5'>No requests found</td></tr>";
    } else {
        echo "<tr><td colspan='8'>No requests found</td></tr>";
    }
}
