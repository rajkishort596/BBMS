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
        include('../../controllers/QuickInfo.php');
        include('../../controllers/CampaignStatus.php');
        $userType = 'admin';  // or 'admin', 'recipient'
        $currentPage = 'Dashboard';  // set the current page for active link
        include('../includes/sidebar.php');
        ?>
        <main class="admin-dashboard dashboard">
            <div class="container">
                <h2 class="ff-Merriweather"><span class="red">Blood</span> Inventary Summary</h2>
                <div class="blood-stock grid">
                    <?php
                    // Loop through the fetched blood stock data and render it
                    foreach ($bloodStock as $stock) {
                    ?>
                        <div class="blood-group-card blood-type flex-column" data-units="<?= $stock['total_units']; ?>">
                            <div class="icon" data-blood-type="<?= $stock['blood_group']; ?>">
                                <svg width="32" height="45" viewBox="0 0 32 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.0062 1.13383L17.0061 1.13384L17.0088 1.1376C19.0252 3.94634 22.5539 9.04224 25.5753 14.3023C27.0862 16.9327 28.4649 19.5948 29.4641 22.0265C30.4681 24.4703 31.0679 26.6323 31.066 28.2784V28.279C31.066 36.7177 24.229 43.558 15.779 43.558C7.34406 43.558 0.5 36.7178 0.5 28.279C0.5 26.6327 1.10127 24.4705 2.10643 22.0267C3.10663 19.5949 4.48597 16.9327 5.99717 14.3023C9.01915 9.04222 12.5468 3.94627 14.5613 1.13741L14.5613 1.13743L14.5648 1.13248C14.8435 0.73382 15.2962 0.5 15.791 0.5C16.2707 0.5 16.7279 0.73852 17.0062 1.13383ZM6.67767 35.1863L6.68107 35.1891C7.0358 35.4829 7.46457 35.626 7.891 35.626C8.41681 35.626 8.95656 35.4115 9.33095 34.9563C9.99943 34.1664 9.89157 32.983 9.10489 32.3141L9.10264 32.3122C7.97053 31.361 7.59165 30.1634 7.50201 29.1618C7.41348 28.1727 7.61087 27.4009 7.63255 27.318C7.90913 26.3286 7.33706 25.2968 6.34253 25.0078L6.33889 25.0068C5.34396 24.7258 4.30813 25.2953 4.02133 26.2938C3.97091 26.4616 3.61251 27.7863 3.76213 29.5049C3.91435 31.2532 4.5961 33.431 6.67767 35.1863Z" fill="white" stroke="#FF0000" />
                                </svg>
                            </div>
                            <p class="units"><?= $stock['total_units']; ?> Units</p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="Info grid">
                    <div class="Info_card flex-column">
                        <h4 class="ff-Poppins">Pending<br> <span class="red">Blood</span> Requests</h4>
                        <div class="box flex">
                            <svg width="37" height="35" viewBox="0 0 37 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M26.6405 0.21843C24.9391 0.244884 23.2747 0.719666 21.8156 1.59483C20.3564 2.46999 19.1541 3.71454 18.3301 5.2028C17.5061 3.71454 16.3038 2.46999 14.8446 1.59483C13.3854 0.719666 11.7211 0.244884 10.0197 0.21843C7.30735 0.336228 4.75191 1.5223 2.91164 3.51753C1.07137 5.51276 0.0958625 8.15495 0.198233 10.8669C0.198233 21.0999 16.7526 32.9189 17.4567 33.4204L18.3301 34.0382L19.2034 33.4204C19.9076 32.922 36.462 21.0999 36.462 10.8669C36.5643 8.15495 35.5888 5.51276 33.7486 3.51753C31.9083 1.5223 29.3529 0.336228 26.6405 0.21843Z" fill="#FF0000" />
                            </svg>
                            <p><?php echo  $pendingRequests ?></p>
                        </div>
                    </div>
                    <div class="Info_card flex-column">
                        <h4 class="ff-Poppins">Upcoming<br> Donation Campaign</h4>
                        <div class="box flex">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_9_374)">
                                    <path d="M18.75 10H12.5V6.25H18.75V10ZM8.125 20C7.09 20 6.25 20.84 6.25 21.875C6.25 22.91 7.09 23.75 8.125 23.75C9.16 23.75 10 22.91 10 21.875C10 20.84 9.16 20 8.125 20ZM8.125 6.25C7.09 6.25 6.25 7.09 6.25 8.125C6.25 9.16 7.09 10 8.125 10C9.16 10 10 9.16 10 8.125C10 7.09 9.16 6.25 8.125 6.25ZM8.125 13.125C7.09 13.125 6.25 13.965 6.25 15C6.25 16.035 7.09 16.875 8.125 16.875C9.16 16.875 10 16.035 10 15C10 13.965 9.16 13.125 8.125 13.125ZM26.25 16.25C24.1788 16.25 22.5 18.1125 22.5 20.4087C22.5 18.1112 20.8212 16.25 18.75 16.25C16.6788 16.25 15 18.1125 15 20.4087C15 24.765 22.5 30 22.5 30C22.5 30 30 24.765 30 20.4087C30 18.1112 28.3212 16.25 26.25 16.25ZM12.5 16.875H13.4738C14.5813 15.0037 16.525 13.75 18.75 13.75V13.125H12.5V16.875ZM14.8763 26.25H3.75V4.375C3.75 4.03125 4.03 3.75 4.375 3.75H20.625C20.97 3.75 21.25 4.03125 21.25 4.375V14.3288C21.6925 14.5363 22.1175 14.7787 22.5 15.085C23.2262 14.5025 24.0788 14.1 25 13.8988V4.375C25 1.9625 23.0375 0 20.625 0H4.375C1.9625 0 0 1.9625 0 4.375V30H18.4563C17.2987 28.9937 15.98 27.7025 14.8763 26.25Z" fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_9_374">
                                        <rect width="30" height="30" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <p><?php echo $upcoming_count ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/BloodLevel.js"></script>
</body>

</html>