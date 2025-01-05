<?php
include('../../config/init.php');
include('../../controllers/ShowBlood.php');

// Check if the user is logged in

if (!isset($_SESSION['user']) || $_SESSION['usertype'] != 'admin') {
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
    <title>Admin Dashboard</title>
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
        $userType = 'admin';  // or 'admin', 'recipient'
        $currentPage = 'Blood Requests';  // set the current page for active link
        include('../includes/sidebar.php');
        ?>
        <main class="admin-dashboard dashboard">
            <div class=" Manage-request-container container flex-column">
                <div class="heading">
                    <h2 class="heading-text text-center">Manage <span class="red">Blood</span> Requests</h2>
                </div>
                <div class="filter-section flex-column">
                    <div class="status-filter w-100">
                        <div class="input-group w-100 flex-column">
                            <label for="status"> <span class="red bold">Status</span></label>
                            <select class="w-100" type="text" name="status" id="filter-status">
                                <option selected disabled value="">Select Request Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                    </div>
                    <div class="type-filter w-100">
                        <div class="input-group w-100 flex-column">
                            <label for="status-type">
                                <span class="red bold">Type</span>
                            </label>
                            <select class="w-100" type="text" name="request-type" id="filter-request-type">
                                <option selected disabled value="">Select Request Type</option>
                                <option value="donor">Donors</option>
                                <option value="recipient">Recipients</option>
                                <option value="All">All</option>
                            </select>
                        </div>
                    </div>

                    <div class="filter-Icon flex" id="apply-filters">
                        <img src="../../assets/images/Filter-Icon.svg">
                    </div>
                </div>
                <div class="msg text-center"></div>
                <div class="history-table" id="printContents">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Request Type</th>
                                <th>Blood Group</th>
                                <th>Blood Units</th>
                                <th>Request Date</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="Request-Status-table">
                            <tr>
                                <!-- Content Will be Dynamically pushed here from Database -->
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="Yellow-btn print-btn" id="printBtn">Print</button>
                <!-- <div class="flex btn-container">
                    <button class="Red-btn" id="select-all">
                        Reject All
                    </button>
                    <button class="Green-btn" id="delete-expired-btn">
                        Accept All
                    </button>
                </div> -->
                <!-- <button class="Yellow-btn print-btn">Print</button> -->
            </div>
        </main>
    </div>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/PrintBtn.js"></script>
    <script src="../../assets/js/jQuery.js"></script>
    <script src="../../assets/js/ajax/makeRequest.js"></script>
    <script src="../../assets/js/ajax/showRequests.js"></script>
    <script src="../../assets/js/ajax/requestActions.js"></script>
</body>

</html>