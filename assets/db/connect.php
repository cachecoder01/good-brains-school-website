<?php
    $conn = mysqli_connect("localhost", "root", "", "goodbrains");
    if (!$conn) {
        die("unable to connect to db" . mysqli_connect_erro());
    }
?>