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
    
?>