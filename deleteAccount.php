<?php 
    include ("templates/php/functions.php");
    session_start();

    if (!isset ($_SESSION ['atmNumber'])) {
        $_SESSION['atmNumber'] = $_POST['atmNumber'];
        echo "<script>alert('You must log in first.');</script>";
    } else {
        //$atmNumber = $_SESSION['atmNumber'];
        $query = "DELETE FROM users WHERE atmNumber = '$atm'";
        $result = mysqli_query($db, $query);
    }
    /*echo '<script type="text/javascript">';
    echo 'function openurl(newurl) {';  
        echo 'if (confirm("Are you sure you want to delete this account?")) {';
        echo 'document.location = newurl;';
        echo '}';
    echo'}';
    echo'</script>';*/
    if ($result) {
        echo "<script>alert('Account deletion successful. You will be redirected to the homepage.')</script>"; 
        echo "<script>location.href='index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Account deletion fail.')</script>"; 
        echo "<script>location.href='settings.php';</script>";
    }
?>
