<?php 

$db = mysqli_connect ("localhost", "root", "", "unitybank");

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
                echo '<script>alert("ATM Number: '.$row['atmNumber'].' \tPassword: '.$row['password'].'")</script>'; 
                echo "<script>location.href='../../index.php';</script>";
                exit();
            } else {
                echo '<script>alert("Invalid information!")</script>'; 
                echo "<script>location.href='../../forgot-password.php#login';</script>";
                exit();
            }
        } else {
            echo '<script>alert("Account does not exist!")</script>'; 
            echo "<script>location.href='../../forgot-password.php#login';</script>";
            exit();
        }
    }

?>