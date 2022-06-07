<?php include("templates/php/functions.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates/css/index_style.css">
    <title>UnityBank (Baby M)</title>
</head>
<body>
        <?php include("templates/php/logo.php");?>
        <div id="login">
                <br><br><br>
                <form method="POST" action="dashboard.php" class="login">
                    <font size="24">Log In</font><br><br><br><br>
                    <label for="atmNumber">ATM Number</label><br/>
                    <input type="text" name="atmNumber" id="atmNumber"/><br/><br/><br/><br/>
                    <label for="atmNumber">Password</label><br/>
                    <input type="password" name="password"/><br/>
                    <a href="#" id="forgot">Forgot Password?</a><br/><br/><br/>
                    <center>
                        <button type="submit" name="login" id="login">LOG IN</button><br/><br/><br/>
                        <div id="signup">Don't have an account? <a href="signup.php">Sign Up!</a></div>
                    </center>
                </form>
                <img src="paypal.png" style="float:right; width: 45%;">
        </div>
</body>
</html>