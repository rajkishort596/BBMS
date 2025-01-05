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
        $currentPage = 'Request Blood';  // set the current page for active link
        include('../includes/sidebar.php');
        ?>
        <main class="recipient-dashboard dashboard">
            <div class="container">
                <div class="request-blood container flex-column">
                    <div class="Request-Blood-section flex-column" style="display: flex;">
                        <h2 class="text-center ff-Merriweather">Need <span class="red">Blood ?</span> Submit a Request.</h2>
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
                                <!-- Blood units required -->
                                <div class="input-group flex-column">
                                    <label for="units">Blood Units Required <span class="red">*</span></label>
                                    <input type="number" id="units" name="units" required>
                                </div>
                                <!-- location -->
                                <div class="input-group flex-column">
                                    <label for="location">Location<span class="red">*</span></label>
                                    <select id="location">
                                        <option selected disabled value="#">Select location</option>
                                        <?php
                                        foreach ($locations as $location) {
                                            echo "<option value='{$location}'>{$location}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="flex confirm-checkbox">
                                <input type="checkbox" id="confirm" name="confirm">
                                <label for="confirm"> I confirm this request is genuine and I agree to the terms.</label>
                            </div>
                            <div class="msg text-center"></div>
                            <button class="btn Red-btn request-btn disabled">Request Blood</button>
                        </form>
                    </div>
                    <div class="confirmation-section flex-column">
                        <div class="flex">
                            <img src="../../assets/images/Sucess-Icon.svg">
                            <h2 class="text-center ff-Merriweather">Sucessfully Request made.</h2>
                        </div>
                        <!-- <p class="text-center ff-Inter bold">Thank you for your Donation. It will help to save lives. </p> -->
                        <p class="text-center ff-Inter bold">You will recieve a confirmation email shortly with further details.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../../assets/js/chart.js"></script>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/jQuery.js"></script>
    <script src="../../assets/js/ajax/makeRequest.js"></script>
</body>

</html>