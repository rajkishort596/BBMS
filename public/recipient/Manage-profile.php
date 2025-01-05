<?php
include('../../config/init.php');

// Check if the user is logged in

if (!isset($_SESSION['user']) || $_SESSION['usertype'] != 'recipient') {
    $_SESSION['no-log-in'] = "Please Login to acess your dashboard.";
    header('Location: ../register.php?login=true'); // Redirect to index or login page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipient Dashboard</title>
    <!--------------- goggle fonts link --------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/styles/dashboard/dashboard.css" />
</head>

<body>
    <div class="grid dashboard-wrapper">
        <div class="overlay"></div>
        <?php
        include('../../controllers/ShowProfile.php');
        include('../includes/header.php');
        $userType = 'recipient';  // or 'admin', 'recipient'
        $currentPage = 'Manage Profile';  // set the current page for active link
        include('../includes/sidebar.php');
        ?>
        <main class="recipient-dashboard dashboard">
            <div class="manage-profile-container container">

                <?php

                $profile_complete = true;
                //Including The Profile Sidebar
                include('../includes/tabs/profile-sidebar.php');

                // Including All the tab-contents
                include('../includes/tabs/profile.php');

                include('../includes/tabs/address.php');

                include('../includes/tabs/contact.php');

                include('../includes/tabs/password.php');
                ?>
            </div>
        </main>
    </div>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/Tabs.js"></script>
    <script src="../../assets/js/jQuery.js"></script>
    <script src="../../assets/js/ManageProfile.js"></script>
    <script src="../../assets/js/ajax/updatePic.js"></script>
    <script src="../../assets/js/ajax/updateProfile.js"></script>
    <script src="../../assets/js/ajax/updateAddress.js"></script>
    <script src="../../assets/js/ajax/updateContact.js"></script>
    <script>
        const showPassword = (action) => {
            const passwordField = document.getElementById('password');
            const closeEye = document.querySelector('.eye-icon.close');
            const openEye = document.querySelector('.eye-icon.open');

            if (action === 'close') {
                passwordField.type = 'text';
                closeEye.style.display = 'none';
                openEye.style.display = 'block';
            } else {
                passwordField.type = 'password';
                closeEye.style.display = 'block';
                openEye.style.display = 'none';
            }
        };
    </script>
</body>

</html>