<?php
    $query = "SELECT balance FROM users WHERE atmNumber = '$atmNumber'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $number = $row['balance'];

    if ($number < 1000000) {
        // Anything less than a million
        $format = number_format($number);
    } else if ($number < 1000000000) {
        // Anything less than a billion
        $format = number_format($number / 1000000, 2) . 'M';
    } else {
        // At least a billion
        $format = number_format($number / 1000000000, 0) . 'B';
    }
?>