<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--------------- goggle fonts link --------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css" />
    <title>Regisration</title>
</head>

<body>
    <div class="Registration grid">
        <div class="form-container flex-column">
            <h2 class="ff-poppins">Login</h2>
            <div class="user-tabs flex">
                <input type="radio" name="tab" id="donor-tab" checked>
                <label for="donor-tab" class="tab">Donor</label>

                <input type="radio" name="tab" id="admin-tab">
                <label for="admin-tab" class="tab">Admin</label>

                <input type="radio" name="tab" id="recipient-tab">
                <label for="recipient-tab" class="tab">Recipient</label>
            </div>
            <form class="form flex-column" action="#" method="post">
                <!-- <input type="text" placeholder="Name" name="name" required> -->
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <a href="#" class="white-text">forgot password ?</a>
                <button class="btn" type="submit">Login</button>
                <p class="login-link">Don't have an Account ? <a href="../public/register.php">Register</a></p>
            </form>
        </div>
    </div>
</body>

</html>