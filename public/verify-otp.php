<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <!-- Include your CSS files here -->
</head>

<body>
    <div class="container">
        <h2>Reset Password</h2>
        <form action="reset-password.php" method="post">
            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required><br>
            <input type="text" name="otp" placeholder="Enter OTP" required><br>
            <input type="password" name="new_password" placeholder="Enter new password" required><br>
            <button type="submit">Verify OTP & Reset Password</button>
        </form>
    </div>
</body>

</html>