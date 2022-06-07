<?php 
    $db = mysqli_connect ("localhost", "root", "", "unitybank");

    if(isset($_POST['signup'])){
        echo '<script>alert("You now have an Unitybank ATM account.")</script>';
        $f_name             = $_POST ['fName'];
        $l_name             = $_POST ['lName'];
        $add                = $_POST ['address'];
        $mail               = $_POST ['email'];
        $pass               = $_POST ['password'];
        $atm                = $_POST ['atmNumber'];

        $query = "INSERT INTO users     (fName, lName, address, email, password, atmNumber) VALUES 
                                        ('$f_name', '$l_name', '$add', '$mail', '$pass', '$atm');";
        mysqli_query($db, $query);
    }
    if(isset($_POST['login'])){
        $atm = $_POST['atmNumber'];  
        $pass = $_POST['password'];  
        
        $atm = stripcslashes($atm);
        $pass = stripcslashes($pass);
        
        $atm = mysqli_real_escape_string ($db, $atm); 
        $pass = mysqli_real_escape_string ($db, $pass); 

        $query = "SELECT atmNumber, password FROM users WHERE atmNumber = '$atm' and password = '$pass'";
        $result = mysqli_query($db, $query);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

        if($count == 1){  
            echo '<script>alert("Login success.")</script>';
            
        }  
        else{  
            echo '<script>alert("Login failed.")</script>';  
        }
    }

?>