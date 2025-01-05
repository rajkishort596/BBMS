<?php
include('../../config/init.php');

// Check if the user is logged in

if (!isset($_SESSION['user'])) {
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
    <title>Donor Dashboard</title>
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
        $userType = 'donor';  // or 'admin', 'recipient'
        $currentPage = 'Donation History';  // set the current page for active link
        include('../includes/sidebar.php');
        ?>
        <main class="donor-dashboard dashboard">
            <div class="container">
                <div class="donation-history container flex-column">
                    <div class="heading">
                        <h2 class="heading-text text-center">Donation History</h2>
                    </div>
                    <div class="filter-section flex-column">
                        <div class="date-filter flex-column w-100">
                            <div class="input-group flex-column w-100">
                                <label for="startDate">Start Date</label>
                                <input type="date" id="startDate">
                            </div>
                            <div class="input-group flex-column w-100">
                                <label for="endDate">End Date</label>
                                <input type="date" id="endDate">
                            </div>
                        </div>
                        <div class="location-filter w-100">
                            <div class="input-group w-100 flex-column">
                                <label for="location">Location</label>
                                <select class="w-100" type="text" name="location">
                                    <option selected value="">Select location</option>
                                    <?php
                                    foreach ($locations as $location) {
                                        echo "<option value='{$location}'>{$location}</option>";
                                    }
                                    ?>
                                </select>
                                <img src="../../assets/images/Location.svg">
                            </div>
                        </div>
                        <div class="filter-Icon flex">
                            <img src="../../assets/images/Filter-Icon.svg">
                        </div>
                    </div>
                    <div class="history-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Blood Group</th>
                                    <th>Location</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="donation-history-table">
                                <tr>
                                    <td colspan="4">No Records to show here.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button class="Yellow-btn print-btn">Print</button>
                </div>
            </div>
        </main>
    </div>
    <script src="../../assets/js/chart.js"></script>
    <script src="../../assets/js/app.js"></script>
</body>

</html>