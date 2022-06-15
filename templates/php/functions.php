<<<<<<< Updated upstream
<?php

    $db = mysqli_connect ("localhost", "root", "", "unitybank");
=======
<?php 
    $db = mysqli_connect ("localhost", "root", "", "unitybank");

    if(isset($_POST['signup'])){
        $f_name             = $_POST ['fName'];
        $l_name             = $_POST ['lName'];
        $add                = $_POST ['address'];
        $mail               = $_POST ['email'];
        $pass               = $_POST ['password'];
        $ques               = $_POST ['recoveryQuestion'];
        $ans                = $_POST ['recoveryAnswer'];
        $atm                = $_POST ['atmNumber'];

        $sql = "SELECT * FROM users WHERE atmNumber='$atm'";
        $results = mysqli_query($db, $sql);

        if(mysqli_num_rows($results) > 0){
            echo "<script>alert('ATM Number exists already. Log in instead.');</script>";
            echo "<script>location.href='index.php';</script>";
            exit ();
        } else {
            $query = "INSERT INTO users     (fName, lName, address, email, password, recoveryQuestion, recoveryAnswer, atmNumber) VALUES 
                                            ('$f_name', '$l_name', '$add', '$mail', '$ques', '$ans','$pass', '$atm');";
            mysqli_query($db, $query);
>>>>>>> Stashed changes

    if(isset($_POST['login'])){

        $atm    = $_POST['atmNumber'];  
        $pass   = $_POST['password'];  

        $atm = stripcslashes($atm);
        $pass = stripcslashes($pass);
        
        $atm = mysqli_real_escape_string ($db, $atm); 
        $pass = mysqli_real_escape_string ($db, $pass); 

        $query  = " SELECT userID, atmNumber, password, fName 
                    FROM users 
                    WHERE atmNumber = '$atm' and password = '$pass'";
        $result = mysqli_query($db, $query);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        $id = $row['userID'];
        if($count == 1){  
            session_start();
            $_SESSION ['atmNumber']      = $atm;
            $_SESSION ['userID']         = $id;
            
            echo "<script>alert('You are successfully logged in!');</script>";
            echo "<script>location.href='../../dashboard.php';</script>";
            exit();            
        }  else{  
            echo '<script>alert("Login failed.")</script>';  
            echo "<script>location.href='../../index.php';</script>";
            exit();
        }
    }
<<<<<<< Updated upstream

=======
    if (isset ($_POST["donate"])) {

        $userID             = $_SESSION ['userID'];
        $email              = $_POST['email'];
        $transactionType    = $_POST['transactionType'];
        $amount             = $_POST['amount'];
        $now                = date("Y-m-d H:i:s");
        $result = mysqli_query ($db, "SELECT * FROM users WHERE userID = '$userID'");
        $row = mysqli_fetch_assoc($result);
        $balance = $row['balance'];

        if ($amount > $balance) {//Insufficient balance, failed transaction
            echo '<script>alert("Transaction fail, insufficient funds.")</script>'; 
            echo "<script>location.href='donate.php';</script>";
            exit();
        } else {
            $query = "  INSERT INTO donations       (userID, email, time, amount) 
                        VALUES                      ($userID, '$email', '$now', '$amount');";
            $result = mysqli_query ($db, $query);

            if ($result) {
                $sql = "UPDATE users
                        SET balance=balance-'$amount' WHERE userID = '$userID'";
                mysqli_query ($db, $sql);

                $query = "  INSERT INTO transactions    (userID, transactionDescription, amount, transactionDate) 
                            VALUES                      ($userID, '$transactionType', '$amount', '$now');";
                $result = mysqli_query ($db, $query);
                if ($result) {
                    echo '<script>alert("Thanks for the donation!.")</script>'; 
                    echo "<script>location.href='donate.php';</script>";
                    exit();
                }
            }
    }

    if (isset ($_POST['updateProfile'])) {
        $fName              = $_POST['fName'];
        $lName              = $_POST['lName'];
        $address            = $_POST['address'];
        $email              = $_POST['email'];
        $atmNumber          = $_POST['atmNumber'];
        $confirmPassword    = $_POST['confirmPassword'];
        
        $query = "SELECT * FROM users WHERE atmNumber = '$atmNumber'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
        if ($confirmPassword == $row['password']) {
            if ($result) {
                $query = "UPDATE users SET fName = '$fName', lName='$lName', address='$address', email='$email' WHERE atmNumber='$atmNumber'";
                $result = mysqli_query ($db, $query);
    
                if ($result) {
                    echo '<script>alert("Update successful!")</script>'; 
                    echo "<script>location.href='profile.php';</script>";
                    exit();
                }
            }
        } else {
            echo '<script>alert("Wrong password!")</script>'; 
            echo "<script>location.href='profile.php';</script>";
            exit();
        }
    }

    if (isset ($_POST['deposit'])) {
        $userID             = $_SESSION ['userID'];
        $amount             = $_POST ['amount'];
        $confirmPassword    = $_POST ['confirmPassword'];
        $transactionType    = $_POST ['transactionType'];

        $sql = "SELECT * FROM users WHERE userID='$userID'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  

        if ($confirmPassword === $row['password']) {
            $sql = "INSERT INTO transactions    (userID, transactionDescription, amount, transactionDate)
            VALUES                              ($userID, '$transactionType', '$amount', now());";
            $output = mysqli_query ($db, $sql);

            $query ="   UPDATE users 
                        SET balance = balance + '$amount' 
                        WHERE userID='$userID';";
            $result = mysqli_query($db, $query);

            if ($result && $output) {
                echo '<script>alert("Deposit Successful!.")</script>'; 
                echo "<script>location.href='dashboard.php';</script>";
                exit();
            } else {
                echo '<script>alert("Deposit Failed!.")</script>'; 
                echo "<script>location.href='deposit.php';</script>";
                exit();
            }
        } else {
            echo '<script>alert("Wrong Password!.")</script>'; 
            echo "<script>location.href='deposit.php';</script>";
            exit();
        }
    }

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
            $sql = "SELECT transactionID FROM transactions WHERE userID='$userID' AND transactionDescription='$transactionType' AND amount='$amount' AND transactionDate='$now'";
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

    if (isset ($_POST['forgotpassword'])) {
        $atm            = $_POST['atmNumber'];
        $recoveryQues   = $_POST['recoveryQuestion'];
        $recoveryAns    = $_POST['recoveryAnswer'];

        $sql = "SELECT * FROM users WHERE atmNumber='$atm'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);

        //Check if account exists
        if($count == 1){
            $query  = "SELECT * FROM users WHERE atmNumber = '$atm'";
            $result = mysqli_query($db, $sql);
            $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if ($recoveryQues == $row['recoveryQuestion'] && $recoveryAns == $row['recoveryAnswer']) {
                echo '<script>alert("Account details:<br>ATM Number: '.$row['atmNumber'].'<br>Password:'.$row['password'].'")</script>'; 
                echo "<script>location.href='index.php';</script>";
                exit();
            }
        } else {
                echo '<script>alert("Account does not exist!")</script>'; 
                echo "<script>location.href='forgot-password.php#login';</script>";
                exit();
        }
    }
}
>>>>>>> Stashed changes
?>