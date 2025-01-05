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
    <!--------------- Chart.js link --------------->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="grid dashboard-wrapper">
        <div class="overlay"></div>
        <?php
        include('../../controllers/LocationController.php');
        include('../includes/header.php');
        $userType = 'recipient';  // or 'admin', 'recipient'
        $currentPage = 'Search Blood';  // set the current page for active link
        include('../includes/sidebar.php');
        ?>
        <main class="recipient-dashboard dashboard">
            <div class="container">
                <div class="search-blood container flex-column">
                    <div class="heading flex-column">
                        <h2 class="heading-text text-center">Search <span class="red">Blood</span></h2>
                        <p class="text-center ff-Poppins ">Easily Find the Blood You Need from Our Extensive Donor Network.</p>
                    </div>
                    <form class="form flex-column w-100">
                        <div class="input-group w-100">
                            <select class="w-100" id="blood-group" placeholder="Select Blood Type">
                                <!-- Adding blood types -->
                                <option value="" selected="" disabled="">Select Blood Type</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                            <img src="../../assets/images/white-drop.svg">
                        </div>
                        <div class="input-group w-100">
                            <input class="w-100" type="text" id="city" placeholder="City Name">
                            <img src="../../assets/images/Location.svg">
                        </div>
                        <button class="btn Red-btn" id="search-blood-btn">Search</button>
                    </form>
                    <div id="search-results" class="donor-list grid w-100">

                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/jQuery.js"></script>
    <script src="../../assets/js/ajax/searchBlood.js"></script>
</body>

</html>