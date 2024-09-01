<?php
include('../config/init.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--------------- Google Fonts Link --------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css" />
    <title>Forgot Password</title>
</head>

<body>
    <div class="background grid">
        <div class="form-container">
            <h2>Forgot <br>Password</h2>
            <form class="form flex-column" action="verify-otp.php" method="POST">
                <div class="input-group">
                    <input class="w-100" type="email" placeholder="Email" name="email" value="rajkishort596@gmail.com" required>
                </div>
                <button type="submit" class="btn">Send OTP</button>
                <p class="login-link"><a href="./register.php?login=true"">Back to Login</a></p>
            </form>
        </div>
    </div>
</body>