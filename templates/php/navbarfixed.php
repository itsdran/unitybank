<?php
    include ("functions.php");
    include ("templates/php/functions.php");

    if (!isset ($_SESSION ['atmNumber'])) {
        $_SESSION['atmNumber'] = $_POST['atmNumber'];
        echo "<script>alert('You must log in first.');</script>";
    } else {
        $atmNumber = $_SESSION['atmNumber'];

        $query = "SELECT * FROM users WHERE atmNumber = '$atmNumber'";
        $result = mysqli_query ($db, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<div class="sample">

    <div class="header">
        <div class="logo"><?php include("logo.php");?>
    </div>

    <div class="sections">
        <a href="features.php"><button class="section-btn">Features</button></a>
        <a href="about.php"><button class="section-btn">About</button></a>
    </div>

    <div class="menu">
        <center>
        <br>
        <img src="https://www.alchinlong.com/wp-content/uploads/2015/09/sample-profile.png" id="dp">
        <br><br>
        </center>
        <a href="profile.php"><button class="menu-btn"><i class="fa fa-id-card"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['fName'] . "<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $row['lName']?></button></a><hr>
        <a href="dashboard.php"><button class="menu-btn"><i class="fa fa-sticky-note"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</button></a>
        <a href="transfer-money.php"><button class="menu-btn"><i class="fa fa-paper-plane"></i>&nbsp;&nbsp;&nbsp;&nbsp;Transfer Money</button></a>
        <a href="deposit.php"><button class="menu-btn"><i class="fa fa-money"></i>&nbsp;&nbsp;&nbsp;&nbsp;Deposit Money</button></a>
        <a href="pay-bills.php"><button class="menu-btn"><i class="	fa fa-ticket"></i>&nbsp;&nbsp;&nbsp;&nbsp;Pay Bills</button></a>
        <a href="donate.php"><button class="menu-btn"><i class="fa fa-signing"></i>&nbsp;&nbsp;&nbsp;&nbsp;Donate Funds</button></a><hr>
        <a href="settings.php"><button class="menu-btn"><i class="fa fa-gear"></i>&nbsp;&nbsp;&nbsp;&nbsp;Settings</button></a><hr>
        <a href="logout.php"><button type="submit" class="menu-btn bottom" name="logout"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logout</button></a><br><br><br><br><br><br><br>
    </div>


<?php } ?>