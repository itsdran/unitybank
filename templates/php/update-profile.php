<?php

    $db = mysqli_connect ("localhost", "root", "", "unitybank");

    if (isset ($_POST['updateProfile'])) {
        $userID            = $_SESSION ['userID'];
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
            $transactionType   = $_POST ['transactionType'];
            $now               = date("Y-m-d H:i:s");
            $sql = "INSERT INTO transactions    (userID, transactionDescription, transactionDate)
                    VALUES                      ($userID, '$transactionType', '$now');";
            $output = mysqli_query ($db, $sql);

            $query ="   UPDATE users 
                        SET fName='$fName', lName='$lName', address='$address', email='$email', atmNumber='$atmNumber' 
                        WHERE atmNumber='$atmNumber';";
            $result = mysqli_query($db, $query);

            if ($result && $output) {
                echo '<script>alert("Update Successful!.")</script>'; 
                echo "<script>location.href='dashboard.php';</script>";
            } else {
                echo '<script>alert("Error!.")</script>'; 
                echo "<script>location.href='profile.php';</script>";
            }
        } else {
            echo '<script>alert("Wrong password!.")</script>'; 
            echo "<script>location.href='profile.php';</script>";
        }
    }   

?>