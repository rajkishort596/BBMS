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
        include('../includes/header.php');
        $userType = 'recipient';  // or 'admin', 'recipient'
        $currentPage = 'Dashboard';  // set the current page for active link
        include('../includes/sidebar.php');
        include('../../controllers/LastActivity.php');
        ?>
        <main class="recipient-dashboard dashboard">
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
                            <p class="last-donated ">Last Requested on: <span class="bold"> <?php echo $Request_Date ?></span></p>
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
                <div class="health-tips card w-100 flex-column">
                    <h2 class="text-center ff-Merriweather">Health Tips for Blood Recipients</h2>
                    <ul class="tips-list flex-column">
                        <li><span class="bold">Stay Hydrated:</span> Drink plenty of water before and after receiving blood.</li>
                        <li><span class="bold">Maintain a Balanced Diet:</span> Consume iron-rich foods to help with recovery.</li>
                        <li><span class="bold">Rest Adequately:</span> Make sure to get enough rest after your blood transfusion.</li>
                        <li><span class="bold">Follow Medical Advice:</span> Always adhere to the instructions given by your healthcare provider.</li>
                        <li><span class="bold">Report Any Side Effects:</span> Inform your doctor if you experience any unusual symptoms.</li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
    <script src="../../assets/js/app.js"></script>
</body>

</html>