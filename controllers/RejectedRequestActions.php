<?php
include("../config/db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $RequestId = $_POST['id'];
    // Update the request status
    $Status_Sql = "UPDATE requests SET status = 'Approved' WHERE request_id = $RequestId";
    $Status_res = mysqli_query($conn, $Status_Sql);
    if ($Status_res) {
        echo 1;
    } else {
        echo 0;
    }
}
