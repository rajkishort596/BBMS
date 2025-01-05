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
    <title>Registration/Login</title>
</head>

<body>
    <div class="background grid">
        <?php
        if (isset($_SESSION['success_message'])) {
            echo '<div class="Sucess">' . $_SESSION["success_message"] . '</div>';
            unset($_SESSION['success_message']);
        }
        if (isset($_SESSION['no-log-in'])) {
            echo '<div class="failure">' . $_SESSION['no-log-in'] . '</div>';
            unset($_SESSION['no-log-in']);
        }
        if (isset($_SESSION['failure_message'])) {
            echo '<div class="failure">' . $_SESSION['failure_message'] . '</div>';
            unset($_SESSION['failure_message']);
        }
        ?>
        <div class="form-container flex-column">
            <?php
            $text = "Registration";
            if (isset($_GET['login']) && $_GET['login'] == 'true') {
                $text = "Login";
            }
            echo '<h2 class="ff-poppins">' . $text . '</h2>';
            ?>
            <form class="form flex-column" method="post">
                <?php
                if ($text == "Login") {
                    echo '<div class="user-tabs flex">
                        <input type="radio" id="donor-tab" name="user-type" value ="donor" required checked>
                        <label for="donor-tab" class="tab">Donor</label>
                        
                        <input type="radio" id="admin-tab" name="user-type" value="admin" required>
                        <label for="admin-tab" class="tab">Admin</label>
                        
                        <input type="radio" id="recipient-tab" name="user-type" value="recipient" required>
                        <label for="recipient-tab" class="tab">Recipient</label>
                      </div>';
                }
                ?>
                <input type="hidden" name="form_type" value="<?php echo $text; ?>">
                <?php
                if ($text == "Registration") {
                    echo ' <input type="text" placeholder="Name" name="name" id="name" required>';
                }
                ?>
                <input type="email" placeholder="Email" name="email" id="email" required>
                <input type="password" placeholder="Password" name="password" id="password" required>
                <?php
                if ($text == "Registration") {
                    echo ' <div class="checkbox-container flex">
                        <input type="checkbox" id="donor" name="donor">
                        <label class="white-text" for="donor">Register as Donor</label>
                    </div>';
                }
                if ($text == "Login") {
                    echo '<a href="./forgot-password.php" class="white-text">forgot password ?</a>';
                }
                ?>
                <button class="btn" type="submit">
                    <?php echo $text == 'Registration' ? "Register" : "Login"; ?>
                </button>
                <?php
                if ($text == 'Registration') {
                    echo '<p class="login-link">Already have an Account? <a href="../public/register.php?login=true">Login</a></p>';
                } else {
                    echo '<p class="login-link">Don\'t have an Account? <a href="../public/register.php">Register</a></p>';
                }
                ?>
            </form>
        </div>
    </div>
    <script src="../assets/js/jQuery.js"></script>
    <script src="../assets/js/ajax/fieldValidations.js"></script>
</body>

</html>