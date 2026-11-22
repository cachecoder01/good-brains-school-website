<?php
    session_start();
    include '../assets/db/connect.php';

    $id = $_GET["id"];

    $stmt = $conn -> prepare("DELETE FROM gallery WHERE id=?");
    $stmt -> bind_param("i", $id);

    $result = $stmt -> execute();
    if ($result) {
        header('location: gallery_form.php');
    }else {
        echo 'Unable to delete';
    }
?>