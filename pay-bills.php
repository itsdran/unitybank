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
    <link rel="stylesheet" href="templates/css/pay-bills_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Pay Bills</title>
</head>
<body>
    <?php include ("templates/php/navbarfixed.php");?>
    <div class="body">
        <div class="pay-bills-body">
        <div class="pay-bills-section">
            <p class="pay-bills-option">Select Biller</p>
          </div>
          <div class="pay-bills-section">
            <h5>MANAGE</h5>
            <p class="pay-bills-option">Recent Payments</p>
            <p class="pay-bills-option">Manage Billers</p>
            <p class="pay-bills-option">FAQs</p><br><br><br><br><br><br><br>
          </div>
        </div>               
      </div>
    </div>
</body>
</html>
<?php }?>