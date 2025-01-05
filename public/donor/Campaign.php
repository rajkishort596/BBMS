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
        include('../../controllers/LocationController.php');
        // include('../../controllers/ShowCampaign.php');
        include('../includes/header.php');
        $userType = 'donor';  // or 'admin', 'recipient'
        $currentPage = 'Campaign';  // set the current page for active link
        include('../includes/sidebar.php');
        ?>
        <main class="donor-dashboard dashboard">
            <div class="container">
                <div class="campaign container">
                    <div class="Info-section flex-column">
                        <div class="heading flex-column">
                            <h2 class="text-center ff-Merriweather">Join our <span class="red">Blood</span>
                                Donation Campaigns
                            </h2>
                            <p class="text-center ff-Poppins ">Participate in our blood donation campaigns and make a difference. Your contribution can save lives. Find an upcoming campaign near you and sign up today</p>
                        </div>
                        <div id="upcoming-campaign" class="flex-column">
                            <div class="upcoming-campaign-container">
                                <div class="campaign-carousel flex">
                                    <!-- <div class="campaign-card card flex-column">
                                        <h4>Spring Blood Drive</h4>
                                        <div class="flex duration">
                                            <svg height="24" version="1.1" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
                                                <g transform="translate(0 -1028.4)">
                                                    <path d="m5 1032.4c-1.1046 0-2 0.9-2 2v14c0 1.1 0.8954 2 2 2h6 2 6c1.105 0 2-0.9 2-2v-14c0-1.1-0.895-2-2-2h-6-2-6z" fill="#bdc3c7"></path>
                                                    <path d="m5 3c-1.1046 0-2 0.8954-2 2v14c0 1.105 0.8954 2 2 2h6 2 6c1.105 0 2-0.895 2-2v-14c0-1.1046-0.895-2-2-2h-6-2-6z" fill="#ecf0f1" transform="translate(0 1028.4)"></path>
                                                    <path d="m5 3c-1.1046 0-2 0.8954-2 2v3 1h18v-1-3c0-1.1046-0.895-2-2-2h-6-2-6z" fill="#e74c3c" transform="translate(0 1028.4)"></path>
                                                    <path d="m7 5.5a1.5 1.5 0 1 1 -3 0 1.5 1.5 0 1 1 3 0z" fill="#c0392b" transform="translate(.5 1028.4)"></path>
                                                    <path d="m6 1c-0.5523 0-1 0.4477-1 1v3c0 0.5523 0.4477 1 1 1s1-0.4477 1-1v-3c0-0.5523-0.4477-1-1-1z" fill="#bdc3c7" transform="translate(0 1028.4)"></path>
                                                    <path d="m7 5.5a1.5 1.5 0 1 1 -3 0 1.5 1.5 0 1 1 3 0z" fill="#c0392b" transform="translate(12.5 1028.4)"></path>
                                                    <g fill="#bdc3c7">
                                                        <path d="m18 1029.4c-0.552 0-1 0.4-1 1v3c0 0.5 0.448 1 1 1s1-0.5 1-1v-3c0-0.6-0.448-1-1-1z"></path>
                                                        <path d="m5 1039.4v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2z"></path>
                                                        <path d="m5 1042.4v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2z"></path>
                                                        <path d="m5 1045.4v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2z"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <p>
                                                From: 12/08/24 to 15/09/24
                                            </p>
                                        </div>
                                        <div class="flex location">
                                            <svg width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.6449 11.2719C20.6449 18.9116 10.8225 25.4599 10.8225 25.4599C10.8225 25.4599 1 18.9116 1 11.2719C1 8.66687 2.03486 6.16849 3.87693 4.32642C5.719 2.48436 8.21738 1.44949 10.8225 1.44949C13.4275 1.44949 15.9259 2.48436 17.768 4.32642C19.61 6.16849 20.6449 8.66687 20.6449 11.2719Z" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M10.8227 14.8279C12.631 14.8279 14.0969 13.362 14.0969 11.5537C14.0969 9.74546 12.631 8.27957 10.8227 8.27957C9.01447 8.27957 7.54858 9.74546 7.54858 11.5537C7.54858 13.362 9.01447 14.8279 10.8227 14.8279Z" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p>
                                                City Hall, Downtown
                                            </p>
                                        </div>

                                        <p class="description">
                                            Join us for our annual Spring Blood Drive at City Hall. Help us reach our goal of collecting 500 units of blood.
                                        </p>
                                        <a href="#" class="detail-link flex">
                                            <p href="#">View Details</p>
                                            <svg width="36" height="22" viewBox="0 0 36 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M25.2386 0.579549L35.8409 11.1818L25.2386 21.7841L23.1932 19.7614L30.2955 12.6591L0.0909127 12.6591V9.70455L30.2955 9.70455L23.1932 2.61364L25.2386 0.579549Z" fill="#FF0000"></path>
                                            </svg>
                                        </a>
                                        <button class="Red-btn" id="join">Join</button>
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
                                <span class="dot active"></span>
                                <span class="dot"></span>
                            </div>
                        </div>

                    </div>
                    <div class="Details-section flex-column w-100">
                        <div class="Details-heading flex-column">
                            <h2 class="text-center ff-Merriweather">Donation Campaign</h2>
                            <h3 class="text-center ff-Merriweather red"></h3>
                            <div class="flex duration">
                                <svg height="24" version="1.1" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
                                    <g transform="translate(0 -1028.4)">
                                        <path d="m5 1032.4c-1.1046 0-2 0.9-2 2v14c0 1.1 0.8954 2 2 2h6 2 6c1.105 0 2-0.9 2-2v-14c0-1.1-0.895-2-2-2h-6-2-6z" fill="#bdc3c7"></path>
                                        <path d="m5 3c-1.1046 0-2 0.8954-2 2v14c0 1.105 0.8954 2 2 2h6 2 6c1.105 0 2-0.895 2-2v-14c0-1.1046-0.895-2-2-2h-6-2-6z" fill="#ecf0f1" transform="translate(0 1028.4)"></path>
                                        <path d="m5 3c-1.1046 0-2 0.8954-2 2v3 1h18v-1-3c0-1.1046-0.895-2-2-2h-6-2-6z" fill="#e74c3c" transform="translate(0 1028.4)"></path>
                                        <path d="m7 5.5a1.5 1.5 0 1 1 -3 0 1.5 1.5 0 1 1 3 0z" fill="#c0392b" transform="translate(.5 1028.4)"></path>
                                        <path d="m6 1c-0.5523 0-1 0.4477-1 1v3c0 0.5523 0.4477 1 1 1s1-0.4477 1-1v-3c0-0.5523-0.4477-1-1-1z" fill="#bdc3c7" transform="translate(0 1028.4)"></path>
                                        <path d="m7 5.5a1.5 1.5 0 1 1 -3 0 1.5 1.5 0 1 1 3 0z" fill="#c0392b" transform="translate(12.5 1028.4)"></path>
                                        <g fill="#bdc3c7">
                                            <path d="m18 1029.4c-0.552 0-1 0.4-1 1v3c0 0.5 0.448 1 1 1s1-0.5 1-1v-3c0-0.6-0.448-1-1-1z"></path>
                                            <path d="m5 1039.4v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2z"></path>
                                            <path d="m5 1042.4v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2z"></path>
                                            <path d="m5 1045.4v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2zm3 0v2h2v-2h-2z"></path>
                                        </g>
                                    </g>
                                </svg>
                                <p>

                                </p>
                            </div>
                            <div class="flex location">
                                <svg width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.6449 11.2719C20.6449 18.9116 10.8225 25.4599 10.8225 25.4599C10.8225 25.4599 1 18.9116 1 11.2719C1 8.66687 2.03486 6.16849 3.87693 4.32642C5.719 2.48436 8.21738 1.44949 10.8225 1.44949C13.4275 1.44949 15.9259 2.48436 17.768 4.32642C19.61 6.16849 20.6449 8.66687 20.6449 11.2719Z" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M10.8227 14.8279C12.631 14.8279 14.0969 13.362 14.0969 11.5537C14.0969 9.74546 12.631 8.27957 10.8227 8.27957C9.01447 8.27957 7.54858 9.74546 7.54858 11.5537C7.54858 13.362 9.01447 14.8279 10.8227 14.8279Z" stroke="#FF0000" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <p>

                                </p>
                            </div>
                            <p class="description text-center">
                            </p>
                        </div>
                        <div class="map grid">
                            <h1>Map</h1>
                        </div>
                        <button class="Red-btn join-now-btn">Join Now</button>
                    </div>
                    <div class="Registration-section flex-column">
                        <h2 class="text-center ff-Merriweather">Register for campaign</h2>
                        <form action="#" class="form flex-column">
                            <div class="form__container grid">
                                <!-- Name -->
                                <div class="input-group flex-column">
                                    <label for="name">Name<span class="red">*</span></label>
                                    <input type="text" id="name" value="<?php echo $name ?>" readonly="">
                                </div>
                                <!-- Email -->
                                <div class="input-group flex-column">
                                    <label for="email">Email<span class="red">*</span></label>
                                    <input type="email" id="email" value="<?php echo $email ?>" readonly="">
                                </div>
                                <!-- Mobile -->
                                <div class="input-group flex-column">
                                    <label for="mobile-number">Mobile Number<span class="red">*</span></label>
                                    <input type="text" id="mobile-number" value="<?php echo $mobile ?>" readonly="">
                                </div>
                                <!-- Blood Group -->
                                <div class="input-group flex-column">
                                    <label for="blood-group">Blood Group<span class="red">*</span></label>
                                    <select id="blood-group" class="blood-group-select" disabled>
                                        <option selected disabled>Select blood group</option>
                                        <option value="A+" <?php if ($bloodGroup == 'A+') {
                                                                echo 'selected';
                                                            } ?>>A+</option>
                                        <option value="A-" <?php if ($bloodGroup == 'A-') {
                                                                echo 'selected';
                                                            } ?>>A-</option>
                                        <option value="B+" <?php if ($bloodGroup == 'B+') {
                                                                echo 'selected';
                                                            } ?>>B+</option>
                                        <option value="B-" <?php if ($bloodGroup == 'B-') {
                                                                echo 'selected';
                                                            } ?>>B-</option>
                                        <option value="AB+" <?php if ($bloodGroup == 'AB+') {
                                                                echo 'selected';
                                                            } ?>>AB+</option>
                                        <option value="AB-" <?php if ($bloodGroup == 'AB-') {
                                                                echo 'selected';
                                                            } ?>>AB-</option>
                                        <option value="O+" <?php if ($bloodGroup == 'O+') {
                                                                echo 'selected';
                                                            } ?>>O+</option>
                                        <option value="O-" <?php if ($bloodGroup == 'O-') {
                                                                echo 'selected';
                                                            } ?>>O-</option>
                                    </select>
                                </div>
                                <!-- Campaign -->
                                <div class="input-group flex-column">
                                    <label for="campaign">Campaign<span class="red">*</span></label>
                                    <select id="campaign">

                                    </select>
                                </div>
                                <!-- location -->
                                <div class="input-group flex-column">
                                    <label for="location">Location<span class="red">*</span></label>
                                    <select id="location">

                                    </select>
                                </div>
                                <!-- Blood units -->
                                <div class="input-group flex-column">
                                    <label for="units">Blood Units*</label>
                                    <input type="number" id="units" name="units" required>
                                </div>

                            </div>
                            <div class="flex confirm-checkbox">
                                <input type="checkbox" id="confirm" name="confirm">
                                <label for="confirm">I confirm that I’m eligible to donate blood and don’t suffer from any disease.</label>
                            </div>
                            <button class="btn Red-btn register-btn disabled">Register</button>
                        </form>
                    </div>
                    <div class="confirmation-section flex-column">
                        <div class="flex-column confirmation-details">
                            <div class="flex">
                                <img src="../../assets/images/Sucess-Icon.svg">
                                <h2 class="ff-Merriweather">Registration Secessfull.</h2>
                            </div>
                            <p class="text-center ff-Inter bold">Thank you for registering for the <span class="red bold campaign-name"></span> </p>
                            <p class="text-center ff-Inter">You will recieve a confirmation email shortly with further details.</p>
                        </div>
                        <div class="registration-details flex-column">
                            <h3 class="text-center ff-Merriweather">Registration Details.</h3>
                            <p class="text-center ff-Inter campaign-name"></p>
                            <p class="text-center ff-Inter donation-location"></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/Carousel.js"></script>
    <script src="../../assets/js/jQuery.js"></script>
    <script src="../../assets/js/ajax/fetchCampaign.js"></script>
    <script src="../../assets/js/Campaign.js"></script>
    <script src="../../assets/js/ajax/showDetails.js"></script>
    <script src="../../assets/js/ajax/makeRequest.js"></script>
</body>

</html>