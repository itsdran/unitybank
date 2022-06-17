<?php 

    $db = mysqli_connect ("localhost", "root", "", "unitybank");

    if (isset($_POST['deleteAccount'])) {

        $proceed = "<script> return confirm('Are you sure you want to delete this account?')</script>";

        if ($proceed) {
            $query = "DELETE FROM users WHERE atmNumber = " .$_SESSION['atmNumber'] . ";";
            $result = mysqli_query($db, $query);

            if ($result) {
                echo "<script>alert('Account deletion successful. You will be redirected to the homepage.')</script>"; 
                echo "<script>location.href='index.php';</script>";
                exit();
            } else {
                echo "<script>alert('Account deletion fail.')</script>"; 
                echo "<script>location.href='settings.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Account deletion fail.')</script>"; 
            echo "<script>location.href='settings.php';</script>";
            exit();
        }
        
    } 

?>
