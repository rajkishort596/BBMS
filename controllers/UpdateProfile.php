<?php
include("../config/db.php");
session_start();
// Get the raw POST data and decode it
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$section = $mydata['section'];
$user_id = $_SESSION['id'];
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

    if ($section === 'profile') {
        // $ProfilePic = $mydata['ProfilePic'];
        $UserName = $mydata['UserName'];
        $FatherName = $mydata['FatherName'];
        $Gender = $mydata['Gender'];
        $BloodGroup = $mydata['BloodGroup'];
        $DOB = $mydata['DOB'];
        $Weight = $mydata['Weight'];

        // Check if profile section is complete
        if (!empty($UserName) && !empty($FatherName) && !empty($Gender) && !empty($BloodGroup) && !empty($DOB) && !empty($Weight)) {

            $profile_sql = "UPDATE $table SET name ='$UserName', father_name = '$FatherName', gender = '$Gender', blood_group='$BloodGroup', dob = '$DOB', weight = '$Weight' WHERE $id = '$user_id'";
            $profile_res = mysqli_query($conn, $profile_sql);
            if ($profile_res) {
                //Profile updated successfully
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo -1;
        }
    } elseif ($section === 'address') {
        $Country = $mydata['Country'];
        $State = $mydata['State'];
        $Area = $mydata['Area'];
        $Pincode = $mydata['Pincode'];
        $City = $mydata['City'];
        $Address = $mydata['Address'];

        // Check if address section is complete
        if (!empty($Country) && !empty($State) && !empty($Area) && !empty($Pincode) && !empty($City) && !empty($Address)) {

            $address_sql = "UPDATE $table SET country ='$Country', state = '$State', area = '$Area', pincode = '$Pincode', city = '$City', address = '$Address' WHERE $id = '$user_id'";
            $address_res = mysqli_query($conn, $address_sql);
            if ($address_res) {
                //Address updated successfully
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo -1;
        }
    } elseif ($section === 'contact') {
        $Email = $mydata['Email'];
        $MobileNumber = $mydata['MobileNumber'];

        // Check if contact section is complete
        if (!empty($Email) && !empty($MobileNumber)) {

            $contact_sql = "UPDATE $table SET email = '$Email', mobile_no ='$MobileNumber', profile_complete = 1 WHERE $id = '$user_id'";
            $contact_res = mysqli_query($conn, $contact_sql);
            if ($contact_res) {
                //Contact updated successfully
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo -1;
        }
    }
}
