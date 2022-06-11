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
        <div id="signup">
            <br><br><br>
            <form method="POST" action="#" class="signup">
                <font size="24">Sign Up</font><br><br>
                <input type="text" name="fName" placeholder="First Name" required/>
                <input type="text" name="lName" placeholder="Last Name" required/>
                <input type="text" name="address" placeholder="Address" required/>
                <input type="text" name="email" placeholder="E-mail" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <input type="text" name="atmNumber" placeholder="ATM Number" required/><br><br>
                <center>
                    <input type="checkbox" name="notRobot" id="checkbox">&nbsp;I agree to the Terms of Agreement</input>
                    <br/><br/><br/>
                    <button type="submit" name="signup" id="signup">SIGN UP</button><br/><br/><br/>
                    <div id="signup">Already have an account? <a href="index.php">Log In!</a></div>
                    <br><br><br>
                </center>
            </form>
        </div>
        <img src="https://media.discordapp.net/attachments/982592711322386462/984790045443637309/bg.png" style="float:right; width: 45%;">
</body>
</html>