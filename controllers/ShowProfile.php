<?php
$userId = $_SESSION['id'];
// $userType = "donor";
$userType = $_SESSION['usertype'];
$table = '';
$id = '';
if ($userType === 'donor' || $userType === 'recipient') {
    if ($userType === 'donor') {
        $table = "donors";
        $id = "donor_id";
    } else {
        $table = "recipients";
        $id = "recipient_id";
    }
    // Fetch profile data for the user
    $query = "SELECT * FROM $table WHERE $id = '$userId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $fatherName = $row['father_name'];
        $gender = $row['gender'];
        $bloodGroup = $row['blood_group'];
        $dob = $row['dob'];
        $weight = $row['weight'];
        $city = $row['city'];
        $pincode = $row['pincode'];
        $area = $row['area'];
        $address = $row['address'];
        $email = $row['email'];
        $mobile = $row['mobile_no'];
        $ProfilePic = $row['profile_pic'];
        $profile_complete = $row['profile_complete'];
    } else {
        // Handle case when no data is found
        $name = $fatherName = $gender = $bloodGroup = $dob = $weight = '';
    }
} else {
    $table = "admins";
    $id = "admin_id";
    // Fetch admin data for the user
    $query = "SELECT name, email,profile_pic FROM $table WHERE $id = '$userId'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $ProfilePic = $row['profile_pic'];
    }
}
