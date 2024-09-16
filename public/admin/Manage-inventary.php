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
        include('../includes/header.php');
        $userType = 'admin';  // admin, door, recipient.
        $currentPage = 'Manage Inventary';  // set the current page for active link
        include('../includes/sidebar.php');
        ?>
        <main class="admin-dashboard dashboard">
            <div class="manage-invenatary-container container">
                <h2 class="ff-Merriweather">Manage <span class="red">Blood</span> Inventary</h2>
                <div class="section-tab flex-column">
                    <div class="tab-link active flex" data-target="add-blood">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_69_182)">
                                <path d="M23.75 0H6.25C2.80375 0 0 2.80375 0 6.25V23.75C0 27.1963 2.80375 30 6.25 30H23.75C27.1963 30 30 27.1963 30 23.75V6.25C30 2.80375 27.1963 0 23.75 0ZM20 16.25H16.25V20C16.25 20.6912 15.69 21.25 15 21.25C14.31 21.25 13.75 20.6912 13.75 20V16.25H10C9.31 16.25 8.75 15.6912 8.75 15C8.75 14.3088 9.31 13.75 10 13.75H13.75V10C13.75 9.30875 14.31 8.75 15 8.75C15.69 8.75 16.25 9.30875 16.25 10V13.75H20C20.69 13.75 21.25 14.3088 21.25 15C21.25 15.6912 20.69 16.25 20 16.25Z" fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_69_182">
                                    <rect width="30" height="30" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p>Add Blood Units</p>
                    </div>
                    <div class="tab-link flex" data-target="update-inventory">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_68_18)">
                                <path d="M19 0H5C2.239 0 0 2.239 0 5V19C0 21.761 2.239 24 5 24H19C21.761 24 24 21.761 24 19V5C24 2.239 21.761 0 19 0ZM12 20C8.978 20 6.36 18.303 5 15.823V18C5 18.552 4.552 19 4 19C3.448 19 3 18.552 3 18V15C3 13.895 3.895 13 5 13H8C8.552 13 9 13.448 9 14C9 14.552 8.552 15 8 15H6.831C7.87 16.787 9.788 18 12 18C14.722 18 17.02 16.177 17.751 13.688C17.873 13.274 18.266 13 18.698 13C19.351 13 19.854 13.622 19.67 14.249C18.697 17.568 15.629 20 11.999 20H12ZM21 9C21 10.105 20.105 11 19 11H16C15.448 11 15 10.552 15 10C15 9.448 15.448 9 16 9H17.185C16.148 7.209 14.215 6 12 6C9.278 6 6.98 7.823 6.249 10.312C6.127 10.726 5.734 11 5.302 11C4.649 11 4.146 10.378 4.33 9.751C5.303 6.432 8.371 4 12.001 4C15.016 4 17.64 5.679 19.001 8.15V6C19.001 5.448 19.449 5 20.001 5C20.553 5 21.001 5.448 21.001 6L21 9Z" fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_68_18">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p>Update Inventary</p>
                    </div>
                    <div class="tab-link flex" data-target="delete-expired">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M28.75 5.625C28.75 4.58947 27.9106 3.75 26.875 3.75H22.155C21.3652 1.5092 19.2509 0.00761719 16.875 0H13.125C10.7491 0.00761719 8.63486 1.5092 7.84502 3.75H3.125C2.08947 3.75 1.25 4.58947 1.25 5.625C1.25 6.66053 2.08947 7.5 3.125 7.5H3.75002V23.125C3.75002 26.922 6.82807 30 10.625 30H19.375C23.172 30 26.25 26.922 26.25 23.125V7.5H26.875C27.9106 7.5 28.75 6.66053 28.75 5.625ZM22.5 23.125C22.5 24.8509 21.1009 26.25 19.375 26.25H10.625C8.89912 26.25 7.50002 24.8509 7.50002 23.125V7.5H22.5V23.125Z" fill="black" />
                            <path d="M11.5 22.5C12.3284 22.5 13 21.6792 13 20.6667V13.3333C13 12.3208 12.3284 11.5 11.5 11.5C10.6716 11.5 10 12.3208 10 13.3333V20.6667C10 21.6792 10.6716 22.5 11.5 22.5Z" fill="black" />
                            <path d="M17.5 22.5C18.3284 22.5 19 21.6792 19 20.6667V13.3333C19 12.3208 18.3284 11.5 17.5 11.5C16.6716 11.5 16 12.3208 16 13.3333V20.6667C16 21.6792 16.6716 22.5 17.5 22.5Z" fill="black" />
                        </svg>
                        <p>Delete Expired Blood</p>
                    </div>
                </div>
                <?php
                // Including All the tab-contents
                include('tabs/add-blood.php');

                include('tabs/update-inventary.php');

                include('tabs/delete-expired.php');
                ?>
                <!-- Modal Structure -->
                <div id="modalPopup" class="modal">
                    <span class="close-btn"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="16">
                            <path fill="#F00" fill-rule="evenodd" d="M8 5.379L13.303.075l2.122 2.122L10.12 7.5l5.304 5.303-2.122 2.122L8 9.62l-5.303 5.304-2.122-2.122L5.88 7.5.575 2.197 2.697.075 8 5.38z" />
                        </svg></span>
                    <p id="modalMessage" class="text-center Sucess">Update Sucessfull</p>
                </div>
            </div>
        </main>
    </div>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/Tabs.js"></script>
    <script src="../../assets/js/jQuery.js"></script>
    <script src="../../assets/js/ajax/addBlood.js"></script>
    <script src="../../assets/js/ajax/updateInventary.js"></script>
    <script src="../../assets/js/ajax/deleteExpired.js"></script>
</body>

</html>