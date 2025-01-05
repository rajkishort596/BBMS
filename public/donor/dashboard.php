<?php
include('../../config/init.php');

// Check if the user is logged in

if (!isset($_SESSION['user']) || $_SESSION['usertype'] != 'donor') {
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
        include('../includes/header.php');
        $userType = 'donor';  // or 'admin', 'recipient'
        $currentPage = 'Dashboard';  // set the current page for active link
        include('../includes/sidebar.php');
        include('../../controllers/LastActivity.php');
        ?>
        <main class="donor-dashboard dashboard">
            <div class="container grid">
                <div class="welcome__card card flex-column">
                    <div class="flex-s-b">
                        <div class="flex-column">
                            <p class="welcome ff-Poppins">Welcome back</p>
                            <h3 class="username ff-poppins"><?php echo $name ?></h3>
                        </div>
                        <div class="blood-group" data-blood-type="<?php echo $bloodGroup ?>">
                            <img src=" ../../assets/images/Red-drop.svg">
                        </div>
                    </div>
                    <div class="flex-s-b">
                        <div class="flex-column ff-poppins">
                            <p class="last-donated ">Last Donated on: <span class="bold"> <?php echo $Request_Date ?></span></p>
                            <div class="location flex">
                                <img src="../../assets/images/Location.svg">
                                <p class="bold"><?php echo $Request_Location ?></p>
                            </div>
                        </div>
                        <div class="flex quantity">
                            <img src="../../assets/images/Heart-Icon.svg">
                            <p> <span class="red bold"><?php echo $Blood_Units ?></span> Units</p>
                        </div>
                    </div>
                </div>
                <div class="profile-status card flex-column">
                    <div class="profile-info flex-column">
                        <h3 class="profile-heading">
                            <!-- $profile_complete is availaible through header.php which includes the ShowProfile.php -->
                            <?php if ($profile_complete): ?>
                                Your Profile is Complete!
                            <?php else: ?>
                                Your Profile is Incomplete!
                            <?php endif; ?>
                        </h3>
                        <p class="profile-subtext text-center">
                            <?php if ($profile_complete): ?>
                                You can update your profile anytime.
                            <?php else: ?>
                                Complete your profile to access all features.
                            <?php endif; ?>
                        </p>
                    </div>
                    <a class="btn profile-btn Red-btn" href="./Manage-profile.php">
                        <?php if ($profile_complete): ?>
                            Edit Profile
                        <?php else: ?>
                            Complete Profile
                        <?php endif; ?>
                    </a>
                </div>

                <div class="Recipient__requests w-100 card flex-column">
                    <h2 class="text-center ff-Merriweather">
                        <span class="red">Blood</span> Requests made by recipients.
                    </h2>
                    <div class="msg text-center"></div>
                    <div class="Recipient__requests__container flex">
                        <div class="request-carousel flex">
                            <!-- AJAX response will be inserted here -->
                            <!-- <div class="request-card flex-column">
                                <div class="img-box" data-blood-type="A+">
                                    <img src="../../assets/images/Profile-Pics/IMG-67021f40d446a1.92228394.png">
                                </div>
                                <div class="info flex-column">
                                    <p class="name">Aditi Johnes</p>
                                    <p class="email">Johnes@gmail.com</p>
                                </div>
                                <div class="location flex">
                                    <img src="../../assets/images/Location.svg">
                                    <p>Patna</p>
                                </div>
                                <div class="action-btns flex">
                                    <button class="Green-btn">Accept</button>
                                    <button class="Red-btn">Reject</button>
                                </div>
                            </div>
                            <div class="request-card flex-column">
                                <div class="img-box" data-blood-type="A+">
                                    <img src="../../assets/images/Profile-Pics/IMG-67021f40d446a1.92228394.png">
                                </div>
                                <div class="info flex-column">
                                    <p class="name">Aditi Johnes</p>
                                    <p class="email">Johnes@gmail.com</p>
                                </div>
                                <div class="location flex">
                                    <img src="../../assets/images/Location.svg">
                                    <p>Patna</p>
                                </div>
                                <div class="action-btns flex">
                                    <button class="Green-btn">Accept</button>
                                    <button class="Red-btn">Reject</button>
                                </div>
                            </div>
                            <div class="request-card flex-column">
                                <div class="img-box" data-blood-type="A+">
                                    <img src="../../assets/images/Profile-Pics/IMG-67021f40d446a1.92228394.png">
                                </div>
                                <div class="info flex-column">
                                    <p class="name">Aditi Johnes</p>
                                    <p class="email">Johnes@gmail.com</p>
                                </div>
                                <div class="location flex">
                                    <img src="../../assets/images/Location.svg">
                                    <p>Patna</p>
                                </div>
                                <div class="action-btns flex">
                                    <button class="Green-btn">Accept</button>
                                    <button class="Red-btn">Reject</button>
                                </div>
                            </div>
                            <div class="request-card flex-column">
                                <div class="img-box" data-blood-type="A+">
                                    <img src="../../assets/images/Profile-Pics/IMG-67021f40d446a1.92228394.png">
                                </div>
                                <div class="info flex-column">
                                    <p class="name">Aditi Johnes</p>
                                    <p class="email">Johnes@gmail.com</p>
                                </div>
                                <div class="location flex">
                                    <img src="../../assets/images/Location.svg">
                                    <p>Patna</p>
                                </div>
                                <div class="action-btns flex">
                                    <button class="Green-btn">Accept</button>
                                    <button class="Red-btn">Reject</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class=" arrows flex w-100">
                        <span class="arrow left-arrow">
                            <svg width="36" height="22" viewBox="0 0 36 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.7614 21.4205L0.159091 10.8182L10.7614 0.215908L12.8068 2.23864L5.70455 9.34091H35.9091V12.2955H5.70455L12.8068 19.3864L10.7614 21.4205Z" fill="#FF0000"></path>
                            </svg>
                        </span>
                        <span class="arrow right-arrow">
                            <svg width="36" height="22" viewBox="0 0 36 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25.2386 0.579549L35.8409 11.1818L25.2386 21.7841L23.1932 19.7614L30.2955 12.6591L0.0909127 12.6591V9.70455L30.2955 9.70455L23.1932 2.61364L25.2386 0.579549Z" fill="#FF0000"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="carousel-indicators flex w-100">

                    </div>
                </div>
                <div id="modalPopup" class="modal">
                    <span class="close-btn"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="16">
                            <path fill="#F00" fill-rule="evenodd" d="M8 5.379L13.303.075l2.122 2.122L10.12 7.5l5.304 5.303-2.122 2.122L8 9.62l-5.303 5.304-2.122-2.122L5.88 7.5.575 2.197 2.697.075 8 5.38z"></path>
                        </svg></span>
                    <p id="modalMessage" class="text-center failure">Are you sure you want to Donate?</p>
                    <button class="Red-btn btn " id="confirm-btn">Donate</button>
                </div>
            </div>
        </main>
    </div>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/Carousel.js"></script>
    <script src="../../assets/js/jQuery.js"></script>
    <script src="../../assets/js/ajax/fetchRejectedRequests.js"></script>
    <script src="../../assets/js/ajax/acceptRejectedRequests.js"></script>
</body>

</html>