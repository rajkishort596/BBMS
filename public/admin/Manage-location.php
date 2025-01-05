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
        include('../includes/header.php');
        $userType = 'admin';  // admin, door, recipient.
        $currentPage = 'Manage Location';  // set the current page for active link
        include('../includes/sidebar.php');
        ?>
        <main class="admin-dashboard dashboard">
            <div class="manage-location-container container">
                <div class="section-tab flex-column">
                    <div class="tab-link add-location active flex" data-target="Add-location">
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
                        <p>Add location</p>
                    </div>
                    <div class="tab-link flex" data-target="Edit-location">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_366_216)">
                                <path d="M15.0002 8.75V0.575C16.1414 1.0075 17.1914 1.67375 18.0814 2.5625L22.4365 6.92C23.3265 7.80875 23.9928 8.85875 24.4253 10H16.2502C15.5602 10 15.0002 9.43875 15.0002 8.75ZM16.5877 24.35C15.5714 25.3662 15.0002 26.7438 15.0002 28.1813V30H16.8189C18.2564 30 19.634 29.4287 20.6502 28.4125L29.1591 19.9038C30.2803 18.7825 30.2803 16.9625 29.1591 15.8413C28.0378 14.72 26.2178 14.72 25.0965 15.8413L16.5877 24.35ZM12.5001 28.1813C12.5001 26.0663 13.3239 24.0775 14.8189 22.5825L23.3277 14.0737C23.814 13.5875 24.3803 13.2137 24.9915 12.9475C24.9865 12.7975 24.9803 12.6487 24.9703 12.4987H16.2502C14.1826 12.4987 12.5001 10.8163 12.5001 8.74875V0.03C12.2989 0.01625 12.0976 0 11.8939 0H6.25006C2.80378 0 0 2.80375 0 6.25V23.75C0 27.1962 2.80378 30 6.25006 30H12.5001V28.1813Z" fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_366_216">
                                    <rect width="30" height="30" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p>Edit location</p>
                    </div>
                </div>

                <div id="Add-location" class="add-location-contaier tab-content  flex-column w-100 active">

                    <h3 class="ff-Merriweather text-center">Add New Location</h3>
                    <p class="text-center">Add a new blood exchange location by providing details such as country, state, city, area, and specific location. This will help donors and recipients easily connect for blood donations. </p>
                    <div class="msg"></div>
                    <form id="AddLocationForm" method="post" class="form flex-column w-100">
                        <div class="form__container grid w-100">
                            <div class="input-group flex-column">
                                <label for="countryName">Country <span class="red">*</span></label>
                                <select type="text" id="countryName">
                                    <option disabled selected value="#">Select Country</option>
                                    <option value="India">India</option>
                                </select>
                            </div>
                            <div class="input-group flex-column">
                                <label for="stateName">State <span class="red">*</span></label>
                                <select type="text" id="stateName">
                                    <option disabled selected value="#">Select State</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                    <option value="Ladakh">Ladakh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                </select>
                            </div>
                            <div class="input-group flex-column">
                                <label for="cityName">City <span class="red">*</span></label>
                                <input type="text" id="cityName">
                            </div>
                            <div class="input-group flex-column">
                                <label for="areaName">Area <span class="red">*</span></label>
                                <input type="text" id="areaName">
                            </div>
                            <div class="input-group flex-column">
                                <label for="location">Location <span class="red">*</span></label>
                                <input type="text" id="location">
                            </div>
                        </div>
                        <button class="Red-btn w-100" id="add-location-btn">Add Location</button>
                    </form>

                </div>
                <div id="Edit-location" class="tab-content add-location-contaier flex-column w-100">
                    <h3 class="ff-Merriweather text-center">Edit Location</h3>
                    <p class="text-center"></p>
                    <div class="msg"></div>
                    <table id="Location-Table">
                        <thead>
                            <tr>
                                <th>Country</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Area</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="../../assets/js/chart.js"></script>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/Tabs.js"></script>
    <script src="../../assets/js/jQuery.js"></script>
    <script src="../../assets/js/ajax/fetchLocations.js"></script>
    <script src="../../assets/js/ajax/addLocation.js"></script>
    <script src="../../assets/js/ajax/editLocation.js"></script>
    <script src="../../assets/js/ajax/fieldValidations.js"></script>

</body>

</html>