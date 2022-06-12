<?php
    session_start();
    include ("templates/php/functions.php");

    if (!isset ($_SESSION ['atmNumber'])) {
        $_SESSION['atmNumber'] = $_POST['atmNumber'];
        echo "<script>alert('You must log in first.');</script>";
        //echo "<script>location.href='index.php';</script>";
    } else {
        $atmNumber = $_SESSION['atmNumber'];
?>
<!DOCTYPE html>
<html>
<head>
    <?php include ("templates/php/functions.php");?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates/css/navbarfixed_style.css">
    <link rel="stylesheet" href="templates/css/donate_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Donate now!</title>
</head>
<body>
    <?php include ("templates/php/navbarfixed.php");?>
    <div class="body">
        <!--Start here!-->
        <h1>EMPOWER LEADERS AND CHANGE MAKERS</h1>
        <h3>"DONATE TO THE UNITY BANK'S CHARITY"</h3>
        <div id="twoRows">
            <div class="column">
                <p class="header">JOIN US AS A MEMBER</p>
                <br>
                <center>
                    <img src="https://www.cscbroward.org/sites/default/files/styles/blog_/public/2019-08/All%20Children%20Develop%20at%20their%20Own%20Pace.JPG?h=33334fe2&itok=adHi3i7m"
                    style="width:85%; height:70%;">
                </center>
                <p> Become a monthly contributor and recieve a token at appreciation sent straight from our HQ! <br>
                </p>
            </div>

            <div class="column">
                <p class="header">MAKE A ONE-TIME GIFT</p>
                <form method="POST"><br><br>
                    <label for="donateInput">Amount</label><br>
                    <input type="number" placeholder="Enter the amount you want to donate" required id="donateInput" name="amount"/><br><br>
                    <input type="date" id="today" name="transactionDate" hidden></input>
                    <input type="text" name="transactionType" value="Donation" hidden></input>
                        <?php
                            $query = "SELECT balance FROM users WHERE atmNumber = '$atmNumber'";
                            $result = mysqli_query($db, $query);
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                            $number = $row['balance'];

                            if ($number < 1000000) {
                                // Anything less than a million
                                $format = number_format($number);
                            } else if ($number < 1000000000) {
                                // Anything less than a billion
                                $format = number_format($number / 1000000, 2) . 'M';
                            } else {
                                // At least a billion
                                $format = number_format($number / 1000000000, 0) . 'B';
                            }
                        ?>
                        <label for="donateInput">Email</label><br>
                    <input type="email" placeholder="Enter your email" required/><br><br>
                        <div class="total-donated">Total Donated: -<?php echo $format;?></div><br><br>
                    <button type="submit" class="donate-btn" name="donate">Donate now!</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php } ?>