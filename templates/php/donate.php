<?php

    $db = mysqli_connect ("localhost", "root", "", "unitybank");

    if (isset ($_POST["donate"])) {

        $userID             = $_SESSION ['userID'];
        $email              = $_POST['email'];
        $transactionType    = $_POST['transactionType'];
        $amount             = $_POST['amount'];

        $result = mysqli_query ($db, "SELECT * FROM users WHERE userID = '$userID'");
        $row = mysqli_fetch_assoc($result);
        $balance = $row['balance'];

        if ($amount > $balance) {//Insufficient balance, failed transaction
            echo '<script>alert("Transaction fail, insufficient funds.")</script>'; 
            echo "<script>location.href='donate.php';</script>";
            exit();
        } else {
            $now   = date("Y-m-d H:i:s");
            $query = "  INSERT INTO donations       (userID, email, donationDate, amount) 
                        VALUES                      ($userID, '$email', '$now', '$amount');";
            $result = mysqli_query ($db, $query);

            if ($result) {
                $sql = "UPDATE users
                        SET balance=balance-'$amount' WHERE userID = '$userID'";
                mysqli_query ($db, $sql);

                $query = "  INSERT INTO transactions    (userID, transactionDescription, amount, transactionDate) 
                            VALUES                      ($userID, '$transactionType', '$amount', now());";
                $result = mysqli_query ($db, $query);
                if ($result) {
                    echo '<script>alert("Thanks for the donation!.")</script>'; 
                    echo "<script>location.href='donate.php';</script>";
                    exit();
                }
            }
        }
    }

?>