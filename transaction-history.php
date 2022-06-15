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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"> 

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <style>
      body {
        font-family: Arial, Verdana;
        padding-top: 0px;
      } h4, h5, h6, th {
        font-family: Times New Roman, Arial, Verdana;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
        margin-bottom: 0px;
      } h4.title {
        margin: 30px 0px;
        margin-left: 110px;
      } div.dataTables_wrapper {
        width: 85%;
        margin: 0 auto;
      }
    </style>
    <script>
      $(document).ready(function () {
          $('#transaction-history').DataTable();
      });
    </script>
    <title>Dashboard</title>
</head>
<body>
<?php include ("templates/php/navbarfixed.php");?>

  <div class="body">
    <h4 class="title">Account</h4>
    <div class="section">
      <div class="info">
        <?php
          include ("templates/php/showBalance.php");
          $query = "SELECT balance, fName, lName FROM users WHERE atmNumber = '$atmNumber'";
          $result = mysqli_query($db, $query);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        ?>
        <h6><?php echo $row['fName'] . ' ' . $row['lName'];?></h6>
        <h6>Check Savings ePayment</h6>
      </div>
      <div class="balance">
        <h6>Available Balance</h6>
        <h6>PHP <?php echo $format?></h6>
        </div>
    </div>
    <h4 class="title">Transaction History</h4>
    <?php 
      echo '<table id="transaction-history" class="table table-hover table-sm table-striped" width="90%">';
          echo "<thead>";
              echo "<tr>";
                  echo "<th>Transaction ID</th>";
                  echo "<th>Transaction Description</th>";
                  echo "<th>Amount</th>";
                  echo "<th>Transaction Date</th>";
              echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
          
          $userID = $_GET ['userID'];
          $sort = $_GET ['sort'];
          $sql  = "SELECT * FROM transactions WHERE userID = $userID";

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