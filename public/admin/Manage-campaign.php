<?php
include('../../config/init.php');

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
    <!--------------- Chart.js link --------------->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="grid dashboard-wrapper">
        <div class="overlay"></div>
        <?php
        // include('../../controllers/ShowCampaign.php');
        include('../../controllers/LocationController.php');
        include('../../controllers/CampaignStatus.php');
        include('../includes/header.php');
        $userType = 'admin';  // admin, door, recipient.
        $currentPage = 'Manage Campaign';  // set the current page for active link
        include('../includes/sidebar.php');
        ?>
        <main class="admin-dashboard dashboard">
            <div class="manage-campaign-container container">
                <div class="section-tab flex-column">
                    <div class="tab-link active flex" data-target="overview">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_95_143)">
                                <path d="M18.5 17C18.5 17.829 17.829 18.5 17 18.5C16.171 18.5 15.5 17.829 15.5 17C15.5 16.171 16.171 15.5 17 15.5C17.829 15.5 18.5 16.171 18.5 17ZM23.707 23.707C23.512 23.902 23.256 24 23 24C22.744 24 22.488 23.902 22.293 23.707L20.471 21.885C19.49 22.584 18.294 23 17 23C13.692 23 11 20.308 11 17C11 13.692 13.692 11 17 11C20.308 11 23 13.692 23 17C23 18.294 22.584 19.49 21.885 20.471L23.707 22.293C24.098 22.684 24.098 23.316 23.707 23.707ZM20.741 17.829C21.075 17.328 21.075 16.672 20.741 16.17C20.109 15.221 18.921 13.999 17 13.999C15.03 13.999 13.832 15.283 13.213 16.24C12.919 16.694 12.919 17.304 13.213 17.758C13.833 18.715 15.032 19.999 17 19.999C19.001 19.999 20.453 18.261 20.741 17.828V17.829ZM13 8H19.54C19.193 7.087 18.66 6.247 17.949 5.536L14.465 2.05C13.753 1.339 12.913 0.806 12 0.46V7C12 7.551 12.448 8 13 8ZM9 17C9 13.99 10.673 11.365 13.136 10H13C11.346 10 10 8.654 10 7V0.024C9.839 0.013 9.678 0 9.515 0H5C2.243 0 0 2.243 0 5V19C0 21.757 2.243 24 5 24H13.136C10.673 22.635 9 20.01 9 17Z" fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_95_143">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p>Overview</p>
                    </div>
                    <div class="tab-link flex create-campaign" data-target="create-campaign">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_90_287)">
                                <path d="M23.75 0H6.25C2.80375 0 0 2.80375 0 6.25V23.75C0 27.1963 2.80375 30 6.25 30H19.3938C19.5975 30 19.7987 29.9837 20 29.97V23.75C20 21.6825 21.6825 20 23.75 20H29.97C29.9837 19.7987 30 19.5975 30 19.3938V6.25C30 2.80375 27.1963 0 23.75 0ZM20 16.25H16.25V20C16.25 20.6912 15.69 21.25 15 21.25C14.31 21.25 13.75 20.6912 13.75 20V16.25H10C9.31 16.25 8.75 15.6912 8.75 15C8.75 14.3088 9.31 13.75 10 13.75H13.75V10C13.75 9.30875 14.31 8.75 15 8.75C15.69 8.75 16.25 9.30875 16.25 10V13.75H20C20.69 13.75 21.25 14.3088 21.25 15C21.25 15.6912 20.69 16.25 20 16.25ZM23.75 22.5H29.425C28.9913 23.6413 28.325 24.6925 27.4362 25.5812L25.5812 27.4375C24.6912 28.3263 23.6413 28.9925 22.5 29.4263V23.7512C22.5 23.0625 23.06 22.5 23.75 22.5Z" fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_90_287">
                                    <rect width="30" height="30" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p>Create Campaign</p>
                    </div>
                    <div class="tab-link flex upcoming-campaign" data-target="upcoming-campaign">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_68_18)">
                                <path d="M19 0H5C2.239 0 0 2.239 0 5V19C0 21.761 2.239 24 5 24H19C21.761 24 24 21.761 24 19V5C24 2.239 21.761 0 19 0ZM12 20C8.978 20 6.36 18.303 5 15.823V18C5 18.552 4.552 19 4 19C3.448 19 3 18.552 3 18V15C3 13.895 3.895 13 5 13H8C8.552 13 9 13.448 9 14C9 14.552 8.552 15 8 15H6.831C7.87 16.787 9.788 18 12 18C14.722 18 17.02 16.177 17.751 13.688C17.873 13.274 18.266 13 18.698 13C19.351 13 19.854 13.622 19.67 14.249C18.697 17.568 15.629 20 11.999 20H12ZM21 9C21 10.105 20.105 11 19 11H16C15.448 11 15 10.552 15 10C15 9.448 15.448 9 16 9H17.185C16.148 7.209 14.215 6 12 6C9.278 6 6.98 7.823 6.249 10.312C6.127 10.726 5.734 11 5.302 11C4.649 11 4.146 10.378 4.33 9.751C5.303 6.432 8.371 4 12.001 4C15.016 4 17.64 5.679 19.001 8.15V6C19.001 5.448 19.449 5 20.001 5C20.553 5 21.001 5.448 21.001 6L21 9Z" fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_68_18">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p>Upcoming Campaigns</p>
                    </div>
                    <!-- <div class="tab-link flex" data-target="campaign-analytics">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_90_305)">
                                <path d="M23.75 0H6.25C2.8 0 0 2.8 0 6.25V23.75C0 27.2 2.8 30 6.25 30H23.75C27.2 30 30 27.2 30 23.75V6.25C30 2.8 27.2 0 23.75 0ZM8.75 22.5C8.75 23.1875 8.1875 23.75 7.5 23.75C6.8125 23.75 6.25 23.1875 6.25 22.5V15C6.25 14.3125 6.8125 13.75 7.5 13.75C8.1875 13.75 8.75 14.3125 8.75 15V22.5ZM13.75 22.5C13.75 23.1875 13.1875 23.75 12.5 23.75C11.8125 23.75 11.25 23.1875 11.25 22.5V11.25C11.25 10.5625 11.8125 10 12.5 10C13.1875 10 13.75 10.5625 13.75 11.25V22.5ZM18.75 22.5C18.75 23.1875 18.1875 23.75 17.5 23.75C16.8125 23.75 16.25 23.1875 16.25 22.5V7.5C16.25 6.8125 16.8125 6.25 17.5 6.25C18.1875 6.25 18.75 6.8125 18.75 7.5V22.5ZM23.75 22.5C23.75 23.1875 23.1875 23.75 22.5 23.75C21.8125 23.75 21.25 23.1875 21.25 22.5V18.75C21.25 18.0625 21.8125 17.5 22.5 17.5C23.1875 17.5 23.75 18.0625 23.75 18.75V22.5Z" fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_90_305">
                                    <rect width="30" height="30" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p>Campaigns Analytics</p>
                    </div> -->
                </div>
                <?php
                // Including All the tab-contents
                include('tabs/overview.php');

                include('tabs/create-campaign.php');

                include('tabs/upcoming-campaign.php');

                include('tabs/campaign-analytics.php');
                ?>
            </div>
        </main>
    </div>
    <script src="../../assets/js/chart.js"></script>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/Tabs.js"></script>
    <script src="../../assets/js/jQuery.js"></script>
    <script src="../../assets/js/ajax/createCampaign.js"></script>
    <script src="../../assets/js/ajax/fetchCampaign.js"></script>
    <script src="../../assets/js/Carousel.js"></script>
    <script src="../../assets/js/ajax/editCampaign.js"></script>
    <script src="../../assets/js/ajax/deleteCampaign.js"></script>
</body>

</html>