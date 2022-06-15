<?php 

    $db = mysqli_connect ("localhost", "root", "", "unitybank");

    if (isset ($_POST['transfer-money'])) {
        $userID             = $_SESSION ['userID'];
        $account            = $_POST ['account'];
        $amount             = $_POST ['amount'];
        $confirmPassword    = $_POST ['confirmPassword'];
        $transactionType    = $_POST ['transactionType'];

        $sql = "SELECT * FROM users WHERE atmNumber='$account'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);

        //Check if account exists
        if($count == 1){
            //Account for transfer exists, fetch for the userID of the user
            $userIDtransfered = $row['userID'];
            $sql = "SELECT * FROM users WHERE userID='$userID'";
            $result = mysqli_query($db, $sql);
            $row_result = mysqli_fetch_array($result, MYSQLI_ASSOC);
            //Check if password is valid
            if ($confirmPassword === $row_result['password']) {
                if ($amount > $row_result['balance']) {//Insufficient balance
                    echo '<script>alert("Transaction fail, insufficient funds.")</script>'; 
                    echo "<script>location.href='transfer-money.php';</script>";
                    exit();
                } else {//Account exists, correct password, and sufficient balance
                    //Add to the transaction
                    $now = date("Y-m-d H:i:s");
                    $sql = "INSERT INTO transactions    (userID, transactionDescription, amount, transactionDate)
                            VALUES                      ($userID, '$transactionType', '$amount', '$now');";
                    $output = mysqli_query ($db, $sql);

                    //Adds the transfer to the account
                    $query ="   UPDATE users 
                                SET balance = balance + '$amount' 
                                WHERE atmNumber='$account';";
                    $result = mysqli_query($db, $query);
                    //Subtract the money to the user
                    $query ="   UPDATE users 
                                SET balance = balance - '$amount' 
                                WHERE userID='$userID';";
                    $result = mysqli_query($db, $query);

                    if ($result && $output) {
                        echo '<script>alert("Transfer Successful!.")</script>'; 
                        echo "<script>location.href='dashboard.php';</script>";
                        exit();
                    } else {
                        //Somehow fails
                        echo '<script>alert("Transfer Failed!.")</script>'; 
                        echo "<script>location.href='deposit.php';</script>";
                        exit();
                    }
                }
            } else {//Wrong password
                echo '<script>alert("Wrong Password!.")</script>'; 
                echo "<script>location.href='transfer-money.php';</script>";
                exit();
            }
        } else {
            echo '<script>alert("Account does not exist!.")</script>'; 
            echo "<script>location.href='transfer-money.php';</script>";
            exit();
        }
    }

?>