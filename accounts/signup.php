<?php include("../templates/php/functions.php");?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../templates/css/style.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="body">
        <div class="banner"><img src="https://rampages.us/izdivine/wp-content/uploads/sites/8175/2015/10/8.jpg" width="100%" height="100%"/></div>
        <div class="login">
            <center>
                <a href="index.php">
                    <?php include("../templates/logo.php");?>
                </a>
                <br><br><br>
                <form method="POST" action="../index.php">
                    <h2>Sign Up</h2>
                    <input type="text" name="fName" placeholder="First Name"/>
                    <input type="text" name="lName" placeholder="Last Name"/>
                    <input type="text" name="address" placeholder="Address"/>
                    <input type="text" name="email" placeholder="E-mail"/>
                    <input type="password" name="password" placeholder="Password"/>
                    <input type="text" name="atmNumber" placeholder="ATM Number"/><br><br>
                    <input type="checkbox" name="notRobot" id="checkbox"> I agree to the Terms of Agreement</input><br>
                    <input type="submit" name="signup" value="Sign Up"><br/>
                </form>
                <br><br><br><br>
            </center>
        </div>
    </div>
</body>
</html>