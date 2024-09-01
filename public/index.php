<?php
include('../config/init.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blood Bank Management System</title>
  <!--------------- goggle fonts link --------------->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/styles/styles.css" />
</head>

<body>
  <div class="overlay"></div>
  <!--------------- Header Starts --------------->
  <header class="header">
    <div class="container flex">
      <a href="./index.php">
        <img src="../assets/images/Logo.svg" class="logo" alt="Bloodline" />
      </a>

      <nav class="navbar flex">
        <div class="header__links flex">
          <a href="#Donor">Donor</a>
          <a href="#Volunteers">Volunteer</a>
          <a href="#SearchBlood">Search Blood</a>
          <a href="../public/register.php?login=true" class="login-btn">Login</a>
        </div>
        <div class="hambergur">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>
    </div>
  </header>
  <!---------------- Header Ends---------------->

  <!------------- Hero Section Starts ------------->
  <section class="hero-section section-common p-y" id="Hero">
    <div class="container grid">
      <div class="text-box">
        <h1 class="red ff-Merriweather">Bloodline</h1>
        <p class="ff-Raleway">Your Lifeline in Blood Donation and Management. Connecting Donors and Recipients for a Healthier Tomorrow.</p>
        <a class="Hollow-btn btn d-inline-block" href="../public/register.php" class="btn">Register</a>
      </div>
      <img src="../assets/images/Hero.jpg" alt="Bloodline hero Image">
    </div>
  </section>
  <!------------- Hero Section Ends ------------->

  <!------------- Donar Section Starts ------------->
  <section class="Donor-section section-common p-y" id="Donor">
    <div class="container grid">
      <img src="../assets/images/Donor.jpg" alt="Bloodline Donar Image">
      <div class="text-box">
        <h1 class="red ff-Merriweather">Become a Donor</h1>
        <p class="ff-Raleway">Give the gift of life to others. Your one donation can save upto three lives.</p>
        <a class="Hollow-btn btn d-inline-block" href="../public/register.php? login=true" class="btn">Donate</a>
      </div>
    </div>
  </section>
  <!------------- Donar Section Ends ------------->

  <!------------- Heroes Section Start ------------->
  <section class="heroes-section p-y" id="Volunteers">
    <div class=" container flex-column">
      <h2 class="red ff-Merriweather heading">Our Heroes</h2>
      <p class="ff-Raleway description">Honoring the Lifesaving Contributions of Our Dedicated Donors.
        Their Generosity and Selflessness Help Save Lives Every Day.</p>
      <div class="volunteer-list grid w-100">
        <div class="volunteer-card card flex-column">
          <div class="img-box" data-blood-type="<?php echo "A+"; ?>">
            <img src="../assets/images/Avatar.jpg" alt="volunteer 1">
          </div>
          <p>Rajkishor Thakur</p>
          <div class="location flex">
            <img src="../assets//images/Location.svg">
            <p>Pupri</p>
          </div>
        </div>
        <div class="volunteer-card card flex-column">
          <div class="img-box" data-blood-type="<?php echo "A+"; ?>">
            <img src="../assets/images/Avatar.jpg" alt="volunteer 1">
          </div>
          <p>Rajkishor Thakur</p>
          <div class="location flex">
            <img src="../assets//images/Location.svg">
            <p>Pupri</p>
          </div>
        </div>
        <div class="volunteer-card card flex-column">
          <div class="img-box" data-blood-type="<?php echo "A+"; ?>">
            <img src="../assets/images/Avatar.jpg" alt="volunteer 1">
          </div>
          <p>Rajkishor Thakur</p>
          <div class="location flex">
            <img src="../assets//images/Location.svg">
            <p>Pupri</p>
          </div>
        </div>
        <div class="volunteer-card card flex-column">
          <div class="img-box" data-blood-type="<?php echo "A+"; ?>">
            <img src="../assets/images/Avatar.jpg" alt="volunteer 1">
          </div>
          <p>Rajkishor Thakur</p>
          <div class="location flex">
            <img src="../assets//images/Location.svg">
            <p>Pupri</p>
          </div>
        </div>
        <div class="volunteer-card card flex-column">
          <div class="img-box" data-blood-type="<?php echo "A+"; ?>">
            <img src="../assets/images/Avatar.jpg" alt="volunteer 1">
          </div>
          <p>Rajkishor Thakur</p>
          <div class="location flex">
            <img src="../assets//images/Location.svg">
            <p>Pupri</p>
          </div>
        </div>
        <div class="volunteer-card card flex-column">
          <div class="img-box" data-blood-type="<?php echo "A+"; ?>">
            <img src="../assets/images/Avatar.jpg" alt="volunteer 1">
          </div>
          <p>Rajkishor Thakur</p>
          <div class="location flex">
            <img src="../assets//images/Location.svg">
            <p>Pupri</p>
          </div>
        </div>
        <div class="volunteer-card card flex-column">
          <div class="img-box" data-blood-type="<?php echo "A+"; ?>">
            <img src="../assets/images/Avatar.jpg" alt="volunteer 1">
          </div>
          <p>Rajkishor Thakur</p>
          <div class="location flex">
            <img src="../assets//images/Location.svg">
            <p>Pupri</p>
          </div>
        </div>
        <div class="volunteer-card card flex-column">
          <div class="img-box" data-blood-type="<?php echo "A+"; ?>">
            <img src="../assets/images/Avatar.jpg" alt="volunteer 1">
          </div>
          <p>Rajkishor Thakur</p>
          <div class="location flex">
            <img src="../assets//images/Location.svg">
            <p>Pupri</p>
          </div>
        </div>


        <!-- Add more donors as needed -->
      </div>
    </div>

  </section>
  <!------------- Heroes Section End ------------->

  <!------------- Search Blood Section Start ------------->
  <section class="search-section p-y" id="SearchBlood">
    <div class="container grid">
      <div class="text-box">
        <h2 class="red ff-Merriweather">Search Blood</h2>
        <p class="ff-Raleway">Easily Find the Blood You Need from Our Extensive Donor Network. Quick, Reliable, and Life-Saving Solutions at Your Fingertips.</p>
      </div>
      <form class="form flex-column w-100" action="#" method="get">
        <div class="input-group w-100">
          <select class="w-100" name="blood-type" placeholder="Select Blood Type">
            <!-- Adding blood types -->
            <option value="" selected disabled>Select Blood Type</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
          </select>
          <img src="../assets/images/white-drop.svg">
        </div>
        <div class="input-group w-100">
          <input class="w-100" type="text" name="city" placeholder="City Name">
          <img src="../assets/images/Location.svg">
        </div>
        <button type="submit" class="btn Hollow-btn  w-100">Search</button>
      </form>
      <img src="../assets/images/search-blood.jpg" class="search-blood" alt="Search Blood">
    </div>
  </section>

  <!------------- Search Blood Section End ------------->

  <!------------- Footer Section Start ------------->
  <footer class="footer">
    <div class="container grid">
      <div class="logo">
        <a href="#">
          <img src="../assets/images/Logo2.svg" alt="Bloodline">
        </a>
      </div>
      <div class="footer__links flex-column">
        <div class="col1 flex-column">
          <a href="#">Volunteer</a>
          <a href="#">Donor</a>
          <a href="#Donor">Donate</a>
        </div>
        <div class="col2 flex-column">
          <a href="../public/register.php">Register</a>
          <a href="../public/register.php? login=true">Login</a>
          <a href="#SearchBlood">Search</a>
        </div>
      </div>
      <div class="social-icons flex">
        <a href="#">
          <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M31.5 5.67525C39.9105 5.67525 40.908 5.70675 44.2286 5.859C47.6621 6.0165 51.198 6.79875 53.6996 9.30037C56.2249 11.8256 56.9835 15.3274 57.141 18.7714C57.2932 22.092 57.3247 23.0895 57.3247 31.5C57.3247 39.9105 57.2932 40.908 57.141 44.2286C56.9861 47.6438 56.1855 51.2138 53.6996 53.6996C51.1744 56.2249 47.6753 56.9835 44.2286 57.141C40.908 57.2932 39.9105 57.3247 31.5 57.3247C23.0895 57.3247 22.092 57.2932 18.7714 57.141C15.3825 56.9861 11.7652 56.1671 9.30037 53.6996C6.78825 51.1875 6.0165 47.6516 5.859 44.2286C5.70675 40.908 5.67525 39.9105 5.67525 31.5C5.67525 23.0895 5.70675 22.092 5.859 18.7714C6.01388 15.3694 6.82237 11.7784 9.30037 9.30037C11.8204 6.78038 15.3353 6.0165 18.7714 5.859C22.092 5.70675 23.0895 5.67525 31.5 5.67525ZM31.5 0C22.9451 0 21.8715 0.03675 18.5115 0.189C13.6421 0.412125 8.80687 1.76662 5.28675 5.28675C1.7535 8.82 0.412125 13.6448 0.189 18.5115C0.03675 21.8715 0 22.9451 0 31.5C0 40.0549 0.03675 41.1285 0.189 44.4885C0.412125 49.3526 1.77187 54.201 5.28675 57.7133C8.81737 61.2439 13.65 62.5879 18.5115 62.811C21.8715 62.9632 22.9451 63 31.5 63C40.0549 63 41.1285 62.9632 44.4885 62.811C49.3552 62.5879 54.1958 61.2308 57.7133 57.7133C61.2491 54.1774 62.5879 49.3552 62.811 44.4885C62.9632 41.1285 63 40.0549 63 31.5C63 22.9451 62.9632 21.8715 62.811 18.5115C62.5879 13.6421 61.2308 8.80425 57.7133 5.28675C54.1879 1.76137 49.3421 0.4095 44.4885 0.189C41.1285 0.03675 40.0549 0 31.5 0Z" fill="white" />
            <path d="M31.5 15.3247C22.5671 15.3247 15.3247 22.5671 15.3247 31.5C15.3247 40.4328 22.5671 47.6752 31.5 47.6752C40.4328 47.6752 47.6752 40.4328 47.6752 31.5C47.6752 22.5671 40.4328 15.3247 31.5 15.3247ZM31.5 42C25.7013 42 21 37.2986 21 31.5C21 25.7013 25.7013 21 31.5 21C37.2986 21 42 25.7013 42 31.5C42 37.2986 37.2986 42 31.5 42Z" fill="white" />
            <path d="M48.3158 18.4643C50.4034 18.4643 52.0958 16.7719 52.0958 14.6843C52.0958 12.5967 50.4034 10.9043 48.3158 10.9043C46.2281 10.9043 44.5358 12.5967 44.5358 14.6843C44.5358 16.7719 46.2281 18.4643 48.3158 18.4643Z" fill="white" />
          </svg>
        </a>
        <a href="#">
          <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M63 31.6917C63 47.4128 51.4657 60.4459 36.4087 62.811V40.8582H43.7299L45.1238 31.7757H36.4087V25.8825C36.4087 23.3967 37.6267 20.9764 41.5275 20.9764H45.4886V13.2432C45.4886 13.2432 41.8924 12.6289 38.4562 12.6289C31.2795 12.6289 26.5913 16.9785 26.5913 24.8509V31.773H18.6139V40.8555H26.5913V62.8084C11.5369 60.4407 0 47.4102 0 31.6917C0 14.2958 14.1041 0.19165 31.5 0.19165C48.8959 0.19165 63 14.2932 63 31.6917Z" fill="white" />
          </svg>
        </a>
        <a href="#">
          <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_125_4)">
              <path d="M56.5504 18.648C56.5871 19.2019 56.5871 19.7584 56.5871 20.3175C56.5871 37.3984 43.5829 57.0938 19.8109 57.0938V57.0833C12.789 57.0938 5.9115 55.083 0 51.2899C1.02112 51.4133 2.0475 51.4737 3.0765 51.4763C8.89875 51.4815 14.553 49.5285 19.1284 45.9323C13.5975 45.8273 8.7465 42.2205 7.05338 36.9548C8.99063 37.3275 10.9856 37.2514 12.8888 36.7343C6.8565 35.5163 2.52 30.2164 2.52 24.0634C2.52 24.0083 2.52 23.9532 2.52 23.9007C4.31813 24.9034 6.32888 25.4573 8.38688 25.5177C2.70638 21.7245 0.952875 14.1698 4.38375 8.26354C10.9462 16.338 20.6299 21.2468 31.0222 21.7692C29.9801 17.2804 31.4055 12.5764 34.7603 9.41854C39.9656 4.52291 48.153 4.77491 53.0486 9.98029C55.944 9.41066 58.7186 8.34754 61.257 6.84342C60.291 9.83592 58.2724 12.3769 55.5739 13.9939C58.1385 13.6868 60.6401 13.0017 63 11.9569C61.2649 14.553 59.0809 16.8184 56.5504 18.648Z" fill="white" />
            </g>
            <defs>
              <clipPath id="clip0_125_4">
                <rect width="63" height="63" fill="white" />
              </clipPath>
            </defs>
          </svg>
        </a>
      </div>
      <p class="copy flex">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0_1_704)">
            <path d="M20 0C16.0444 0 12.1776 1.17298 8.8886 3.37061C5.59962 5.56824 3.03617 8.69181 1.52242 12.3463C0.00866572 16.0009 -0.387401 20.0222 0.384303 23.9018C1.15601 27.7814 3.06082 31.3451 5.85787 34.1421C8.65492 36.9392 12.2186 38.844 16.0982 39.6157C19.9778 40.3874 23.9992 39.9913 27.6537 38.4776C31.3082 36.9638 34.4318 34.4004 36.6294 31.1114C38.827 27.8224 40 23.9556 40 20C39.9943 14.6974 37.8853 9.61368 34.1358 5.8642C30.3863 2.11471 25.3026 0.00573514 20 0ZM14.1067 25.8933C15.6713 27.4534 17.7906 28.3294 20 28.3294C22.2094 28.3294 24.3287 27.4534 25.8933 25.8933L28.25 28.25C26.6184 29.8815 24.5395 30.9925 22.2765 31.4426C20.0134 31.8927 17.6677 31.6615 15.5359 30.7785C13.4042 29.8954 11.5822 28.4001 10.3003 26.4815C9.01839 24.563 8.33418 22.3074 8.33418 20C8.33418 17.6926 9.01839 15.437 10.3003 13.5185C11.5822 11.5999 13.4042 10.1046 15.5359 9.22152C17.6677 8.33846 20.0134 8.10736 22.2765 8.55742C24.5395 9.00748 26.6184 10.1185 28.25 11.75L25.8933 14.1067C24.3303 12.5437 22.2104 11.6656 20 11.6656C17.7896 11.6656 15.6697 12.5437 14.1067 14.1067C12.5437 15.6697 11.6656 17.7896 11.6656 20C11.6656 22.2104 12.5437 24.3303 14.1067 25.8933Z" fill="white" />
          </g>
          <defs>
            <clipPath id="clip0_1_704">
              <rect width="40" height="40" fill="white" />
            </clipPath>
          </defs>
        </svg>
        2024 Bloodline. All Rights Reserved.
      </p>
    </div>
  </footer>
  <!------------- Footer Section End ------------->
  <script src="../assets/js/app.js"></script>
</body>

</html>