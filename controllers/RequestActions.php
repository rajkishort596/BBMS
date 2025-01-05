<?php
include("../config/db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $RequestId = $_POST['id'];
    $ActionType = $_POST['Action'];
    $Status = "Pending";

    // Fetch the request details to know the blood group, units, and request type
    $requestQuery = "SELECT blood_group, b_units, request_type FROM requests WHERE request_id = $RequestId";
    $result = mysqli_query($conn, $requestQuery);
    $request = mysqli_fetch_assoc($result);
    $bloodGroup = $request['blood_group'];
    $bUnits = $request['b_units'];
    $requestType = $request['request_type'];

    // Initialize response array
    $response = [
        'status' => false,
        'message' => '',
        'action' => $ActionType,
        'blood_added' => false,
        'blood_deducted' => false,
    ];

    // Handle status updates
    if ($ActionType == "Reject") {
        $Status = "Rejected";
        // $response['status'] = 'Rejected';
        $response['message'] = 'Request has been rejected.';
    } elseif ($ActionType == "Approve") {
        $Status = "Approved";
        // $response['status'] = 'Approved';
        $response['message'] = 'Request has been approved.';
    } elseif ($ActionType == "Complete") {
        $Status = "Completed";
        // $response['status'] = 'Completed';
        // $response['message'] = 'Request has been completed.';

        // Insert logic to update completion_date here
        $completionDate = date('Y-m-d'); // Get current date

        // Update the request with the completion date
        $updateCompletionDateSql = "UPDATE requests SET completion_date = '$completionDate' WHERE request_id = $RequestId";
        mysqli_query($conn, $updateCompletionDateSql);

        if ($requestType == "donor") {
            // Insert new record in blood table for donor
            $expiryDate = date('Y-m-d', strtotime('+1 month')); // Set expiry one month from completion date
            $insertBloodQuery = "INSERT INTO blood (blood_group, blood_unit, expiry_date, created_at, updated_at) 
                                 VALUES ('$bloodGroup', $bUnits, '$expiryDate', NOW(), NULL)";
            $result = mysqli_query($conn, $insertBloodQuery);
            if ($result) {
                $response['blood_added'] = true;
                $response['message'] = 'Blood has been added to the inventory.';
            } else {
                $response['message'] = 'Failed to add blood to the inventory.';
            }
        } elseif ($requestType == "recipient") {
            // Deduct units from blood stock for recipient
            $updateStockQuery = "UPDATE blood SET blood_unit = blood_unit - $bUnits WHERE blood_group = '$bloodGroup' AND blood_unit >= $bUnits";
            $result = mysqli_query($conn, $updateStockQuery);
            if ($result && mysqli_affected_rows($conn) > 0) {
                $response['blood_deducted'] = true;
                $response['message'] = 'Blood units have been deducted from inventory.';
            } else {
                $response['message'] = 'Failed to deduct blood units or insufficient stock.';
            }
        }
    } elseif ($ActionType == "Cancel") {
        $Status = "Cancelled";
        // $response['status'] = 'Cancelled';
        $response['message'] = 'Request has been cancelled.';
    }

    // Update the request status
    $Status_Sql = "UPDATE requests SET status = '$Status' WHERE request_id = $RequestId";
    $Status_res = mysqli_query($conn, $Status_Sql);

    if ($Status_res) {
        $response['status'] = true;
        $response['message'] .= ' Request status updated successfully.';
    } else {
        $response['message'] .= ' Failed to update request status.';
    }

    // Output the response as JSON
    echo json_encode($response);
}
