<?php
  session_start();
  include ("templates/php/functions.php");

  if (!isset ($_SESSION ['atmNumber'])) {
    $_SESSION['atmNumber'] = $_POST['atmNumber'];
    echo "<script>alert('You must log in first.');</script>";
    echo "<script>location.href='index.php';</script>";
    exit();
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
    <link rel="stylesheet" href="templates/css/footer_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
</head>
<body>
<?php include ("templates/php/navbarfixed.php");?>

  <div class="body">
    <h1>Dashboard</h1>
    <h4>Account</h4><br>
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
      <div class="column">
        <h4 class="title">Transaction History</h4>
        <h4 class="title">Insurance Marketplace</h4>
        <div class="one">
          See all the transactions you've made throughout the whole creation of account.<br>
          <br><br><a href="transaction-history.php?userID=<?php echo $_SESSION['userID']?>&sort=transactionID">LEARN MORE</a>
        </div>
        <div class="two">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          <br><br><a href="#">LEARN MORE</a>
        </div>
      </div>
    </div>
  </div>
    <?php include ('templates/php/footer.php');?>
</body>
</html>

<?php
}?>