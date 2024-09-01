<?php

/*-----------------Registraion Logic-----------------*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form_type = $_POST['form_type']; // Retrieve the form type (Registration or Login)
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($form_type == 'Registration') {
        // Registration logic here

        $password_hashed = password_hash($password, PASSWORD_BCRYPT); // Encrypt the password
        // Check if the user is registering as a Donor
        if (isset($_POST['donor'])) {
            $name = $_POST['name'];
            $sql = "INSERT INTO donor (name, email, password) VALUES ('$name', '$email', '$password_hashed')";
        } else {
            $name = $_POST['name'];
            $sql = "INSERT INTO recipient (name, email, password) VALUES ('$name', '$email', '$password_hashed')";
        }

        if (mysqli_query($conn, $sql)) {
            // Set a success message in session
            $_SESSION['success_message'] = "Registration successful! You can now log in.";
            // Redirect to the login page
            header("Location: " . $SITEURL . "public/register.php?login=true");
            exit(); // Ensure no further code is executed after the redirect
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } elseif ($form_type == 'Login') {
        /*-----------------Login Logic-----------------*/

        $user_type =  $_POST['user-type']; // Retrieve the selected user type
        if ($user_type == 'donor') {
            $sql = "SELECT * FROM donor WHERE email = '$email'";
        } elseif ($user_type == 'admin') {
            $sql = "SELECT * FROM admin WHERE email = '$email'";
        } else {
            $sql = "SELECT * FROM recipient WHERE email = '$email'";
        }

        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            if ($user_type == 'donor') {
                header("Location: " . $SITEURL . "public/donor/dashboard.php");
                exit(); // Ensure no further code is executed after the redirect
            } elseif ($user_type == 'admin') {
                header("Location: " . $SITEURL . "public/admin/dashboard.php");
                exit(); // Ensure no further code is executed after the redirect
            } else {
                header("Location: " . $SITEURL . "public/recipient/dashboard.php");
                exit(); // Ensure no further code is executed after the redirect
            }
        } else {
            $_SESSION['failure_message'] = 'Invalid Email or Password !';
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
