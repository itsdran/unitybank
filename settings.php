<?php
    session_start();
    include ("templates/php/functions.php");

    if (!isset ($_SESSION ['atmNumber'])) {
    $_SESSION['atmNumber'] = $_POST['atmNumber'];
    echo "<script>alert('You must log in first.');</script>";
    //echo "<script>location.href='index.php';</script>";
    } else {
    $atmNumber = $_SESSION['atmNumber'];
    //$id = $_SESSION ['userID'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates/css/navbarfixed_style.css">
    <link rel="stylesheet" href="templates/css/settings_style.css">
    <link rel="stylesheet" href="templates/css/footer_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <meta http-equiv="refresh" content="">
    <title>Settings</title>
</head>
<body>
    <?php include ("templates/php/navbarfixed.php");?>
    <div class="body">
        <br>
        <div class="setting-content">
            <h2>Notifications Settings</h2>
            <p>Select notification you want to receive</p>
            <hr>
            <input type="checkbox" class="smoller" checked="">
            <strong>&nbsp;Security</strong><br>
            <p>Control security alert you will be notified.</p>
            <hr>
            <input type="checkbox" class="smoller" checked="">
            <strong>&nbsp;Unusual activity notifications</strong><br>
            <p>Donec in quam sed urna bibendum tincidunt quis mollis mauris.</p>
            <hr>

            <input type="checkbox" class="smoller" checked="">
            <strong>&nbsp;Unauthorized financial activity</strong><br>
            <p>Fusce lacinia elementum eros, sed vulputate urna eleifend nec.</p>
                
            <hr>
            <h2>System</h2>
            <p>Please enable system alert you will get.</p>
            <hr>

            <input type="checkbox" class="smoller" checked="">
            <strong>&nbsp;Notify me about new features and updates</strong><br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <hr>

            <input type="checkbox" class="smoller" checked="">
            <strong>&nbsp;Notify me by email for latest news</strong><br>
            <p>Nulla et tincidunt sapien. Sed eleifend volutpat elementum.</p>
            <hr>

            <input type="checkbox" class="smoller" checked="">
            <strong>&nbsp;Notify me about tips on using account</strong><br>
            <p>Donec in quam sed urna bibendum tincidunt quis mollis mauris.</p>
            <hr>

            <input type="checkbox" class="smoller" checked="">
            <strong>&nbsp;General Notification</strong><br>
            <p>Donec in quam sed urna bibendum tincidunt quis mollis mauris.</p>
            <hr>
            <h2>Account</h2>
            <strong>&nbsp;<a href="profile.php">See Profile</a></strong><br>
            <p>Edit your profile, make changes to your information.</p>
            <hr>
            <strong>&nbsp;Delete Account</strong><br>
            <p>Once deleted, you will never be able to recover your account.</p><br>
            <a href="deleteAccount.php" class="deleteAccount" onclick="return confirm('Are you sure you want to delete this account?');">Delete Account</a>
        </div>           
        <br>   <br>   
    </div>
    </div>
    <?php include ('templates/php/footer.php');?>
</body>
</html>
<?php } ?>