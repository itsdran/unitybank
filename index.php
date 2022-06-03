<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates\css\style.css">
    <title>UnityBank (Baby M)</title>
</head>
<body>
    <div class="body">
    <div class="banner"><img src="https://rampages.us/izdivine/wp-content/uploads/sites/8175/2015/10/8.jpg" width="100%" height="100%"/></div>
        <div class="login">
            <center>
                <a href="index.php">
                    <?php include("templates\logo.php");?>
                </a>                <br><br><br>
                <form >
                    <input type="text" name="userID" placeholder="User ID"/>
                    <input type="password" name="password" placeholder="Password"/><br/>
                    
                    <div class="notRobot">
                        <input type="checkbox" name="notRobot" id="checkbox"> I am not a robot</input><br>
                    </div>
                    <input type="submit" id="login" value="LOG IN"/><br/>
                </form>
                <a href="#">Forgot my user ID or Password</a> | <a href="#">Unblock my Profile</a><br><br>
                    OR<br>
                    <button id="signup"><a href="signup.php">SIGN UP</a></button>
                <p class="terms"><b>This site works best on the latest Google Chrome browser.</b></p>
                    <p class="terms">
                        Union Bank of the Philippines is regulated by the Bangko Sentral ng Pilipinas. For inquiries and comments, please contact our.  24-hour Customer Servic
                        A proud member of BancNet and PDIC.
                    </p>
                    <p class="terms">Deposits are insured by PDIC up to PHP 111B per depositor.</p>
            </center>
        </div>
    </div>
</body>
</html>