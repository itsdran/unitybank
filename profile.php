<?php
    session_start();
    include ("templates/php/update-profile.php");

    if (!isset ($_SESSION ['atmNumber'])) {
    $_SESSION['atmNumber'] = $_POST['atmNumber'];
    echo "<script>alert('You must log in first.');</script>";
    echo "<script>location.href='index.php';</script>";
    } else {
    $atmNumber = $_SESSION['atmNumber'];
    //$id = $_SESSION ['userID'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates/css/navbarfixed_style.css">
    <link rel="stylesheet" href="templates/css/profile_style.css">
    <link rel="stylesheet" href="templates/css/footer_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <meta http-equiv="refresh" content="">
    <title>Profile</title>
</head>
<body>
    <?php include ("templates/php/navbarfixed.php");?>
    <div class="body">
        <br>
        <div class="grid">
            <div class="column">
                <center>
                    <br>
                    <img src="https://www.alchinlong.com/wp-content/uploads/2015/09/sample-profile.png" id="dp">
                    <br>
                    <?php 
                        $sql = "SELECT * FROM users WHERE atmNumber = '$atmNumber'";
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 

                        echo "<h3>" . $row['fName'] . ' '  . $row['lName'] . "</h3>";
                    ?>
                </center>
            </div>
            
            <div>
                <h2>Edit Account</h2>
                <form method="POST">
                    <div class="label">First Name</div>
                    <input type="text" name="fName" value="<?php echo $row['fName']?>"></input><br>
                    <div class="label">Last Name</div>
                    <input type="text" name="lName" value="<?php echo $row['lName']?>"></input><br>
                    <div class="label">Address</div>
                    <input type="text" name="address" value="<?php echo $row['address']?>"></input><br>
                    <div class="label">E-mail</div>
                    <input type="text" name="email" value="<?php echo $row['email']?>"></input><br>
                    <div class="label">ATM Number</div>
                    <input type="text" name="atmNumber" value="<?php echo $row['atmNumber']?>"></input><br>
                    <div class="label">Confirm Password</div>
                    <input type="password" name="confirmPassword" placeholder="Enter password to confirm" required></input>
                    <input type="text" value="Update Profile" name="transactionType" hidden/><br><br>
                    <br><br>
                    <button type="submit" name="updateProfile" class="update-btn" value="Update">Update</button>
                    <button type="reset" class="clear">Clear</button>
                </form>
            </div>    
        </div>
    </div>
    </div>
    <?php include ('templates/php/footer.php');?>
</body>
</html>
<?php } ?>