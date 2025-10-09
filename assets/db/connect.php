<?php
    $conn = mysqli_connect("localhost", "root", "", "veracity");
    if (!$conn) {
        die("unable to connect to db" . mysqli_connect_erro());
    }
?>