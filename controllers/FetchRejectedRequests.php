<?php
//Include Database connection 
include('../config/db.php');


// Retrieve the donor's blood group from POST request
if (isset($_POST['blood_group'])) {
    $blood_group = $_POST['blood_group'];

    // SQL query to fetch requests with status 'Rejected' and matching blood group
    $sql = "SELECT recipients.name, recipients.email, requests.location, requests.request_id, requests.b_units, recipients.profile_pic
            FROM requests 
            INNER JOIN recipients ON requests.recipient_id = recipients.recipient_id
            WHERE requests.status = 'Rejected' 
            AND requests.blood_group = '$blood_group'";

    $result = mysqli_query($conn, $sql);

    // Check if any results were found
    if (mysqli_num_rows($result) > 0) {
        // Loop through each request and generate HTML card
        while ($row = mysqli_fetch_assoc($result)) {
            // Retrieve recipient details
            $name = htmlspecialchars($row['name']);
            $email = htmlspecialchars($row['email']);
            $location = htmlspecialchars($row['location']);
            $profile_pic = htmlspecialchars($row['profile_pic']);  // Path to profile pic
            $request_id = htmlspecialchars($row['request_id']);
            $b_units = htmlspecialchars($row['b_units']);

            // Output the card HTML structure
            echo '
            <div class="request-card flex-column">
                <div class="img-box" data-blood-type="' . $blood_group . '">
                    <img src="../../assets/images/Profile-Pics/' . $profile_pic . '">
                </div>
                <div class="info flex-column">
                    <p class="name">' . $name . '</p>
                    <p class="email">' . $email . '</p>
                </div>
                <div class="location flex">
                    <img src="../../assets/images/Location.svg">
                    <p class="request_location">' . $location . '</p>
                </div>
                <div class="Blood_units"><span class="red request_blood-units">' . $b_units . '</span> Units</div>
                <div class="action-btns flex">
                    <button class="Green-btn" id="accept-request-btn" data-id="' . $request_id . '">Accept</button>
                </div>
            </div>';
        }
    } else {
        // If no requests were found
        echo 0;
    }
}

// Close the database connection
mysqli_close($conn);
