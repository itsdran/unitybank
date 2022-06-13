<?php 
    $db = mysqli_connect ("localhost", "root", "", "unitybank");

    if(isset($_POST['signup'])){
        $f_name             = $_POST ['fName'];
        $l_name             = $_POST ['lName'];
        $add                = $_POST ['address'];
        $mail               = $_POST ['email'];
        $pass               = $_POST ['password'];
        $atm                = $_POST ['atmNumber'];

        $sql = "SELECT * FROM users WHERE atmNumber='$atm'";
        $results = mysqli_query($db, $sql);

        if(mysqli_num_rows($results) > 0){
            echo "<script>alert('ATM Number exists already. Log in instead.');</script>";
            echo "<script>location.href='index.php';</script>";
            exit ();
        } else {
            $query = "INSERT INTO users     (fName, lName, address, email, password, atmNumber) VALUES 
                                            ('$f_name', '$l_name', '$add', '$mail', '$pass', '$atm');";
            mysqli_query($db, $query);

            echo "<script>alert('You now have an Unitybank ATM account');</script>";
            echo "<script>location.href='index.php';</script>";
            exit();
        }     
    }
    if(isset($_POST['login'])){
        session_start();
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

        if($count == 1){  
            $_SESSION ['atmNumber']     = $atm;
            $_SESSION ['userID']         = $id;
            echo "<script>alert('You are successfully logged in!');</script>";
            echo "<script>location.href='../../dashboard.php';</script>";
            exit();            
        }  
        else{  
            echo '<script>alert("Login failed.")</script>';  
            echo "<script>location.href='../../index.php';</script>";
            exit();
        }
    }
    if (isset ($_POST["donate"])) {

        $userID             = $_SESSION ['userID'];
        $email              = $_POST['email'];
        $transactionType    = $_POST['transactionType'];
        $amount             = $_POST['amount'];

        $result = mysqli_query ($db, "SELECT * FROM users WHERE userID = '$id'");
        $row = mysqli_fetch_assoc($result);
        $balance = $row['balance'];

        if ($amount < $balance) {//Insufficient balance, failed transaction
            echo '<script>alert("Transaction fail, insufficient funds.")</script>'; 
            echo "<script>location.href='donate.php';</script>";
        } else {
            $query = "  INSERT INTO donations       (userID, email, time, amount) 
                        VALUES                      ($userID, '$email', now(), '$amount');";
            $result = mysqli_query ($db, $query);

            if ($result) {
                $sql = "UPDATE users
                        SET balance=balance-'$amount'";
                mysqli_query ($db, $sql);

                $query = "  INSERT INTO transactions    (userID, transactionDescription, transactionDate) 
                        VALUES                          ($userID, '$transactionType', now());";
                $result = mysqli_query ($db, $query);
                if ($result) {
                    echo '<script>alert("Thanks for the donation!.")</script>'; 
                    echo "<script>location.href='donate.php';</script>";
                }
            }
    }

    if (isset ($_POST['updateProfile'])) {
        $userID             = $_SESSION ['userID'];
        $atmNumber         = $_POST ['atmNumber'];
        $confirmPassword   = $_POST ['confirmPassword'];
        $sql = "SELECT * FROM users WHERE atmNumber='$atmNumber'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  

        if ($confirmPassword === $row['password']) {
            $fName             = $_POST ['fName'];
            $lName             = $_POST ['lName'];
            $address           = $_POST ['address'];
            $email             = $_POST ['email'];
            $atmNumber         = $_POST ['atmNumber'];
            $confirmPassword   = $_POST ['confirmPassword'];

            $sql = "INSERT INTO transactions    (userID, transactionDescription, transactionDate)
                    VALUES                      ($userID, '$transactionType', now());";
            $output = mysqli_query ($db, $sql);

            $query ="   UPDATE users 
                        SET fName='$fName', lName='$lName', address='$address', email='$email', atmNumber='$atmNumber' 
                        WHERE atmNumber='$atmNumber';";
            $result = mysqli_query($db, $query);

            if ($result && $output) {
                echo '<script>alert("Update Successful!.")</script>'; 
                echo "<script>location.href='dashboard.php';</script>";
            } else {
                echo '<script>alert("Wrong password!.")</script>'; 
                echo "<script>location.href='profile.php';</script>";
            }
        }
        }

    }
?>