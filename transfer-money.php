<?php
    session_start();
    include ("templates/php/transfer-money.php");

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
    <link rel="stylesheet" href="templates/css/dashboard_style.css">
    <link rel="stylesheet" href="templates/css/deposit_style.css">
    <link rel="stylesheet" href="templates/css/footer_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Transfer Money</title>
</head>
<body>
<?php include ("templates/php/navbarfixed.php");?>

    <div class="body">
        <br>
        <div class="section">
            <div class="info">
                <?php
                include ("templates/php/showBalance.php");
                $query = "SELECT balance, fName, lName FROM users WHERE atmNumber = '$atmNumber'";
                    $result = mysqli_query($db, $query);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                ?>
                <b><?php echo $row['fName'] . ' ' . $row['lName'];?></b><br>
                Check Savings ePayment<br>
            </div>

            <div class="balance">
                <h5>Available Balance</h5>
                <b>PHP <?php echo $format?></b><br>
            </div>
        </div>

        <h4>Transfer Money</h4>
        
        <div>
            <form method="POST">
                <div class="input">
                    <label for="amount">Account to Transfer</label>
                    <input type="number" name="account" placeholder="Account"></input>
                </div>

                <div class="input">
                    <label for="amount">Transfer Amount</label>
                    <input type="number" name="amount" placeholder="PHP 00.00"></input>
                </div>

                <div class="input">
                    <label for="amount">Password</label>
                    <input type="password" name="confirmPassword" placeholder="Password"></input>
                </div>

                <input type="text" name="transactionType" value="Transfer Money" hidden></input>
                <center><button type="submit" name="transfer-money" class="deposit">TRANSFER MONEY</deposit></center>
            </form>
            </div>
        </div>
    </div>
    <?php include ('templates/php/footer.php');?>
</body>
</html>
<?php
}?>