<?php
    session_start();
    include ("templates/php/functions.php");

    if (!isset ($_SESSION ['atmNumber'])) {
    $_SESSION['atmNumber'] = $_POST['atmNumber'];
    echo "<script>alert('You must log in first.');</script>";
    echo "<script>location.href='index.php';</script>";
    exit();
    } else {
    $atmNumber = $_SESSION['atmNumber'];
    //$id = $_SESSION ['userID'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates/css/navbarfixed_style.css">
    <link rel="stylesheet" href="templates/css/features_style.css">
    <link rel="stylesheet" href="templates/css/footer_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Navbar sample</title>
</head>
<body>
    <?php include ("templates/php/navbarfixed.php");?>
    <div class="body">
            <div class="row">
                <center>
                    <img src="templates/img/features.png" class="about"/>
                </center>
            </div>
        </div>
    </div>
    <?php include ('templates/php/footer.php');?>
</body>
</html>
<?php } ?>