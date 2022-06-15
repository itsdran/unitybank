<?php

    $db = mysqli_connect ("localhost", "root", "", "unitybank");

    if (isset($_POST ['paybill'])) {
        $userID             = $_SESSION ['userID'];
        $bill               = $_POST ['bill'];
        $amount             = $_POST ['amount'];
        $confirmPassword    = $_POST ['confirmPassword'];
        $transactionType    = $_POST ['transactionType'];
        $now = date("Y-m-d H:i:s");

        $sql = "SELECT * FROM users WHERE userID='$userID'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($confirmPassword === $row['password']) {
            //Add transactions
            $sql = "INSERT INTO transactions    (userID, transactionDescription, amount, transactionDate)
            VALUES                              ($userID, '$transactionType', '$amount', '$now');";
            $output = mysqli_query ($db, $sql);
            //Finds the transactionID
            $sql = "SELECT * FROM transactions WHERE userID='$userID' AND transactionDescription='$transactionType' AND amount='$amount'";
            $row = mysqli_fetch_array(mysqli_query($db, $sql), MYSQLI_ASSOC);
            $transactionID = $row['transactionID'];
            //Add paybills
            $sql = "INSERT INTO paybills        (transactionID, userID, company, amount, paymentDate)
            VALUES                              ($transactionID, $userID, '$bill', '$amount', '$now');";
            $output = mysqli_query ($db, $sql);
            //Subtract amount to your balance
            $query ="   UPDATE users 
                        SET balance = balance - '$amount' 
                        WHERE userID='$userID';";
            $result = mysqli_query($db, $query);
            //If added to the transactions and subtracted to the balance
            if ($result && $output) {
                echo '<script>alert("Payment Successful!.")</script>'; 
                echo "<script>location.href='dashboard.php';</script>";
                exit();
            } else {
                echo '<script>alert("Payment Failed!.")</script>'; 
                echo "<script>location.href='deposit.php';</script>";
                exit();
            }
        } else {
            echo '<script>alert("Wrong Password!.")</script>'; 
            echo "<script>location.href='pay-bill.php';</script>";
            exit();
        }
    }

?>