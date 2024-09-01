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
</head>

<body>
    <div class="grid dashboard-wrapper">
        <div class="overlay"></div>
        <?php
        include('../includes/header.php');
        $userType = 'recipient';  // or 'admin', 'recipient'
        $currentPage = 'Dashboard';  // set the current page for active link
        include('../includes/sidebar.php');
        ?>
        <main class="dashboard-main grid">
            <div class="container">
                <h1>recipient Dashboard</h1>
                <!-- <div class="welcome__card card flex-column">
                    <div class="flex-s-b">
                        <div class="flex-column">
                            <p class="welcome ff-Poppins">Welcome back</p>
                            <h3 class="username ff-poppins">Rajkishor Thakur</h3>
                        </div>
                        <div class="blood-group" data-blood-type="<?php echo "A+"; ?>">
                            <img src=" ../../assets/images/Red-drop.svg">
                        </div>
                    </div>
                    <div class="flex-s-b">
                        <div class="flex-column ff-poppins">
                            <p class="last-donated ">Last Donated on 06/07/24</p>
                            <div class="location flex">
                                <img src="../../assets/images/Location.svg">
                                <p>RB Memorial, DBG</p>
                            </div>
                        </div>
                        <div class="flex quantity">
                            <img src="../../assets/images/Heart-Icon.svg">
                            <p>250ml</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </main>
    </div>
    <script src="../../assets/js/app.js"></script>
</body>

</html>