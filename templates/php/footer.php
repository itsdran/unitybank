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
    <div class="footer">
        <div class="cols">
            <b>© <?php echo date('Y');?> Unitybank of the Philippines</b>
        </div>
        <div class="cols">
            <a href="dashboard.php" class="footerlink">Home</a><br>
            <a href="about.php" class="footerlink">About</a><br>
            <a href="features.php" class="footerlink">Features</a><br>
            <a href="profile.php" class="footerlink">Profile</a><br>
        </div>
        <div class="cols">
            <a href="dashboard.php" class="footerlink">Dashboard</a><br>
            <a href="transfer-money.php" class="footerlink">Transfer Money</a><br>
            <a href="deposit.php" class="footerlink">Deposit Money</a><br>
            <a href="pay-bills.php" class="footerlink">Pay Bills</a><br>
        </div>
        <div class="cols">
            <a href="donate.php" class="footerlink">Donate Funds</a><br>
            <a href="settings.php" class="footerlink">Settings</a><br>
            <a href="logout.php" class="footerlink">Logout</a><br>
        </div>
        <div class="cols">Join us at 
            <a href="https://www.facebook.com" class="fa fa-facebook"></a>
            <a href="https://www.instagram.com" class="fa fa-instagram"></a>
            <a href="https://www.google.com" class="fa fa-google"></a>
        </div>
    </div>
<?php } ?>