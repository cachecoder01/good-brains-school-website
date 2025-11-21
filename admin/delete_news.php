<?php
    session_start();
    include '../assets/db/connect.php';

    $id = $_GET["id"];

    $stmt = $conn -> prepare("DELETE FROM event WHERE id=?");
    $stmt -> bind_param("i", $id);

    $result = $stmt -> execute();
    if ($result) {
        header('location: event_page.php');
    }else {
        echo 'Unable to delete';
    }
?>