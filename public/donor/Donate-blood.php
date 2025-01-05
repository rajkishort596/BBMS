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
        include('../includes/header.php');
        $userType = 'donor';  // or 'admin', 'recipient'
        $currentPage = 'Donate Blood';  // set the current page for active link
        include('../includes/sidebar.php');
        ?>
        <main class="donor-dashboard dashboard">
            <div class="container">
                <div class="donate-blood container">
                    <div class="Info-section flex-column w-100">
                        <div class="heading-box flex-column">
                            <h2 class="text-center ff-Merriweather">Donate <span class="red">Blood</span>, Save Lives</h2>
                            <h3 class="text-center ff-Merriweather">Your donation can save upto three lives.</h3>
                        </div>
                        <div class="accordian flex-column">
                            <h2 class="text-center ff-Merriweather">Frequently Asked Questions</h2>
                            <div class="Questions__container flex-column">
                                <div class="questions flex-column w-100">
                                    <div class="question flex">
                                        <h4 class="ff-Poppins">How often can I donate blood?</h4>
                                        <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="18" height="12">
                                            <path fill="none" stroke="#000" stroke-width="3" d="M1 1l8 8 8-8"></path>
                                        </svg>
                                    </div>
                                    <p class="answer ff-Poppins">
                                        Every 56 days for whole blood donations.
                                    </p>
                                </div>
                                <div class="questions flex-column w-100">
                                    <div class="question flex">
                                        <h4 class="ff-Poppins">Will it hurt?</h4>
                                        <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="18" height="12">
                                            <path fill="none" stroke="#000" stroke-width="3" d="M1 1l8 8 8-8"></path>
                                        </svg>
                                    </div>
                                    <p class="answer ff-Poppins">
                                        You may feel a slight pinch when the needle is inserted, but most donors feel little to no discomfort during the process.
                                    </p>
                                </div>
                                <div class="questions flex-column w-100">
                                    <div class="question flex">
                                        <h4 class="ff-Poppins">What should I do before donating?</h4>
                                        <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="18" height="12">
                                            <path fill="none" stroke="#000" stroke-width="3" d="M1 1l8 8 8-8"></path>
                                        </svg>
                                    </div>
                                    <p class="answer ff-Poppins">
                                        Stay hydrated, eat a healthy meal, and avoid alcohol or caffeine before donating. Rest well the night before.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button class="Red-btn donate-btn">Donate Now</button>
                    </div>
                    <div class="blood-donation-section flex-column">
                        <div class="Eligibility-section flex-column">
                            <div class="heading-box flex-column">
                                <h2 class="text-center ff-Merriweather">Donate <span class="red">Blood</span>, Save Lives</h2>
                                <h3 class="text-center ff-Merriweather">Your donation can save upto three lives.</h3>
                            </div>
                            <div class="eligibility flex-column">
                                <h3 class="ff-Poppins text-center"> Check Your Eligibility</h3>
                                <div class="checkboxes grid">
                                    <div class="checkbox flex">
                                        <input type="checkbox" id="donation" name="donation">
                                        <label class="white-text" for="donation">I have not donated blood in the last 56 days</label>
                                    </div>
                                    <div class="checkbox flex">
                                        <input type="checkbox" id="age" name="age">
                                        <label class="white-text" for="age"> I am between 18-65 years old</label>
                                    </div>
                                    <div class="checkbox flex">
                                        <input type="checkbox" id="health" name="health">
                                        <label class="white-text" for="health">I am in good general health</label>
                                    </div>
                                    <div class="checkbox flex">
                                        <input type="checkbox" id="weight" name="weight">
                                        <label class="white-text" for="weight">I weigh at least 50 kg</label>
                                    </div>
                                </div>
                            </div>
                            <button class="Yellow-btn check-eligibility-btn">Check Eligibility</button>
                            <div class="eligibility-result flex">

                            </div>

                        </div>
                        <div class="appointment-section flex-column">
                            <h2 class="text-center ff-Merriweather">Schedule Your <span class="red">Donation</span> Appointment</h2>
                            <form action="#" class="form flex-column">
                                <div class="form__container grid">
                                    <!-- Name -->
                                    <div class="input-group flex-column">
                                        <label for="name">Name<span class="red">*</span></label>
                                        <input type="text" id="name" value="<?php echo $name ?>" readonly>
                                    </div>
                                    <!-- Email -->
                                    <div class="input-group flex-column">
                                        <label for="email">Email<span class="red">*</span></label>
                                        <input type="email" id="email" value="<?php echo $email ?>" readonly>
                                    </div>
                                    <!-- Mobile -->
                                    <div class="input-group flex-column">
                                        <label for="mobile-number">Mobile Number<span class="red">*</span></label>
                                        <input type="text" id="mobile-number" value="<?php echo $mobile ?>" readonly>
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
                                    <!-- Donation Date
                                    <div class="input-group flex-column">
                                        <label for="dob">Select Donation Date<span class="red">*</span></label>
                                        <input type="date" id="donationDate">
                                    </div> -->
                                    <!-- location -->
                                    <div class="input-group flex-column">
                                        <label for="location">Location<span class="red">*</span></label>
                                        <select id="location">
                                            <option selected value="#">Select location</option>
                                            <?php
                                            foreach ($locations as $location) {
                                                echo "<option value='{$location}'>{$location}</option>";
                                            }
                                            ?>
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
                                <div class="msg text-center"></div>
                                <button class="btn Red-btn appointment-btn disabled">Confirm Appointment</button>
                            </form>
                        </div>
                        <div class="confirmation-section flex-column">
                            <div class="flex">
                                <img src="../../assets/images/Sucess-Icon.svg">
                                <h2 class="text-center ff-Merriweather">Appointment Scheduled</h2>
                            </div>
                            <p class="text-center ff-Inter bold">Thank you for your Donation. It will help to save lives. </p>
                            <p class="text-center ff-Inter">You will recieve a confirmation email shortly with further details.</p>
                        </div>
                        <button class="Red-btn next-btn disabled">Next</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../../assets/js/chart.js"></script>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/DonateBlood.js"></script>
    <script src="../../assets/js/jQuery.js"></script>
    <script src="../../assets/js/ajax/makeRequest.js"></script>
</body>

</html>