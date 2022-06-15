<?php

    $db = mysqli_connect ("localhost", "root", "", "unitybank");

    if (isset ($_POST['deposit'])) {
        $userID             = $_SESSION ['userID'];
        $amount             = $_POST ['amount'];
        $confirmPassword    = $_POST ['confirmPassword'];
        $transactionType    = $_POST ['transactionType'];

        $sql = "SELECT * FROM users WHERE userID='$userID'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $now = date("Y-m-d H:i:s");
        if ($confirmPassword == $row['password']) {
            $sql = "INSERT INTO transactions    (userID, transactionDescription, amount, transactionDate)
                    VALUES                      ($userID, '$transactionType', '$amount', '$now');";
            $output = mysqli_query ($db, $sql);

            $query ="   UPDATE users 
                        SET balance = balance + '$amount' 
                        WHERE userID='$userID';";
            $result = mysqli_query($db, $query);

            if ($result && $output) {
                echo '<script>alert("Deposit Successful!")</script>'; 
                echo "<script>location.href='dashboard.php';</script>";
                exit();
            } else {
                echo '<script>alert("Deposit Failed!")</script>'; 
                echo "<script>location.href='deposit.php';</script>";
                exit();
            }
        } else {
            echo '<script>alert("Wrong Password!")</script>'; 
            echo "<script>location.href='deposit.php';</script>";
            exit();
        }
    }

?>