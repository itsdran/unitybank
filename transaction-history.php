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
    <link rel="stylesheet" href="templates/css/transaction-history_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
</head>
<body>
<?php include ("templates/php/navbarfixed.php");?>

  <div class="body">
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
    <h4>Transaction History</h4>
    <?php 
      echo '<table id="dtDynamicVerticalScrollExample" class="table table-hover table-sm table-striped">';
          echo "<thead>";
              echo "<tr>";
                  echo "<th><a href='transaction-history.php?sort=transactionID'>Transaction ID</a></th>";
                  echo "<th><a href='transaction-history.php?sort=transactionDescription'>Transaction Description</a></th>";
                  echo "<th><a href='transaction-history.php?sort=amount'>Amount</a></th>";
                  echo "<th><a href='transaction-history.php?sort=transactionDate'>Transaction Date</a></th>";
              echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
          
          $userID = $_GET ['userID'];
          $sort = $_GET ['sort'];
          $sql  = "SELECT * FROM transactions WHERE userID = $userID";

          if ($_GET['sort'] == 'transactionID') {
              $sql .= " ORDER BY transactionID";
          } elseif ($_GET['sort'] == 'transactionDescription') {
              $sql .= " ORDER BY transactionDescription";
          } elseif ($_GET['sort'] == 'amount') {
              $sql .= " ORDER BY amount";
          } elseif($_GET['sort'] == 'transactionDate') {
              $sql .= " ORDER BY transactionDate";
          }

          $result = mysqli_query ($db, $sql);

          while($row = mysqli_fetch_array($result)){
              echo "<tr>";
                  echo "<td style='color:black;'>" . $row['transactionID'] . "</td>";
                  echo "<td style='color:black;'>" . $row['transactionDescription'] . "</td>";
                  echo "<td style='color:black;'>" . $row['amount'] . "</td>";
                  echo "<td style='color:black;'>" . $row['transactionDate'] . "</td>";
                  echo "</td>";
              echo "</tr>";
          }
          echo "</tbody>";                            
      echo "</table>";
      // Free result set
      mysqli_free_result($result);
    ?>
  </div>
</body>
</html>

<?php
}?>