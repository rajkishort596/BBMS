<?php
include("../config/db.php");
session_start();
$user_id = $_SESSION['id'];
$userType = $_SESSION['usertype'];
$table = '';
$id = '';

if ($userType === 'donor') {
    $table = "donors";
    $id = "donor_id";
} else {
    $table = "recipients";
    $id = "recipient_id";
}


if (isset($_FILES['profilePic'])) {

    //  getting image data and store them in var
    $img_name = $_FILES['profilePic']['name'];
    $img_size = $_FILES['profilePic']['size'];
    $tmp_name = $_FILES['profilePic']['tmp_name'];
    $error    = $_FILES['profilePic']['error'];
    # if there is not error occurred while uploading
    if ($error === 0) {
        if ($img_size > 1000000) {
            # error message
            $errorMsg = "Sorry, your file is too large.";

            # response array
            $error = array('error' => 1, 'errorMsg' => $errorMsg);

            /** 
		    printing out php array and 
		    converting it into JSON format
             **/

            echo json_encode($error);
            exit();
        } else {
            # get image extension store it in var
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

            /** 
			convert the image extension into lower case 
			and store it in var 
             **/
            $img_ex_lc = strtolower($img_ex);

            /** 
			crating array that stores allowed
			to upload image extensions.
             **/
            $allowed_exs = array("jpg", "jpeg", "png");

            /** 
			check if the the image extension 
			is present in $allowed_exs array
             **/
            if (in_array($img_ex_lc, $allowed_exs)) {
                /** 
				 renaming the image name with 
				 with random string
                 **/
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;

                # crating upload path on root directory
                $img_upload_path = "../assets/images/Profile-Pics/" . $new_img_name;

                # move uploaded image to 'uploads' folder
                move_uploaded_file($tmp_name, $img_upload_path);

                # inserting imge name into database
                $sql = "UPDATE $table SET profile_pic =
                        '$new_img_name' WHERE $id = '$user_id'";
                mysqli_query($conn, $sql);

                # response array
                $res = array('error' => 0, 'src' => $new_img_name);

                echo json_encode($res);
                exit();
            } else {
                # error message
                $errorMsg = "You can't upload files of this type";

                # response array
                $error = array('error' => 1, 'errorMsg' => $errorMsg);

                /** 
			    printing out php array and 
			    converting it into JSON format
                 **/

                echo json_encode($error);
                exit();
            }
        }
    } else {
        # error message
        $errorMsg = "unknown error occurred!";

        # response array
        $error = array('error' => 1, 'errorMsg' => $errorMsg);

        /** 
	    printing out php array and 
	    converting it into JSON format
         **/

        echo json_encode($error);
        exit();
    }
}
