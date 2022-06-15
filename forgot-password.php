
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates/css/index_style.css">
    <title>Forgot Password</title>
</head>
<body>
        <?php include("templates/php/logo.php");?>
        <?php include("templates/php/forgotpassword.php");?>
        
        <div id="login">
            <br><br><br>
            <form method="POST" action="templates/php/functions.php" class="login">
                <font size="19">Forgot Password</font><br><br><br><br>
                <label for="atmNumber">ATM Number</label><br/>
                <input type="number" name="atmNumber" id="atmNumber" required/><br/><br/><br/>
                <label for="recoveryQuestion">Recovery Question</label><br/>
                <select name="recoveryQuestion">
                    <option value="What is your platform?" selected></option>
                    <option value="What is your platform?">What is your platform?</option>
                    <option value="If it's not him, who else? Diba?">If it's not him, who else? Diba?</option>
                    <option value="Sino iboboto">Sino iboboto mo?</option>
                    <option value="Pwede ba respect my onions?">Pwede ba respect my onions?</option>
                    <option value="Maganda ang buhay namin dati ha?!">Maganda ang buhay namin dati ha?!</option>
                </select><br/><br/><br/>
                <label for="recoveryAnswer">Recovery Answer</label><br/>
                <input type="text" name="recoveryAnswer" required/>
                <center><br/><br/><br/>
                    <button type="submit" name="forgotpassword" id="login">SUBMIT</button><br/><br/><br/>
                    <div id="signup">Don't have an account? <a href="signup.php">Sign Up!</a></div>
                    <br><br><br>
                </center>
            </form>
        </div>
        <img src="https://media.discordapp.net/attachments/982592711322386462/984790045443637309/bg.png" style="float:right; width: 45%;">
</body>
</html>