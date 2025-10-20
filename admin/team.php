<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="../assets/fonts/css/all.min.css" />
    <link rel="shortcut icon" type="image/icon" href="../assets/images/brand-images/‎brand-logo.jpeg" />
    <link rel="stylesheet" href="./css/style.css">

    <title>vq | Admin</title>
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include "../assets/db/connect.php";

        $name = trim($_POST["name"]);
        $name = htmlspecialchars(strip_tags($name), ENT_QUOTES, 'UTF-8');
        
        $role = trim($_POST["role"]);
        $role = htmlspecialchars(strip_tags($role), ENT_QUOTES, 'UTF-8');

        $bio = trim($_POST["bio"]);
        $bio = htmlspecialchars(strip_tags($bio), ENT_QUOTES, 'UTF-8');

        $i_link = trim($_POST["i_links"]);
        $i_link = htmlspecialchars(strip_tags($i_link), ENT_QUOTES, 'UTF-8');

        $f_link = trim($_POST["f_links"]);
        $f_link = htmlspecialchars(strip_tags($f_link), ENT_QUOTES, 'UTF-8');

        $l_link = trim($_POST["l_links"]);
        $l_link = htmlspecialchars(strip_tags($l_link), ENT_QUOTES, 'UTF-8');

        $t_link = trim($_POST["t_links"]);
        $t_link = htmlspecialchars(strip_tags($t_link), ENT_QUOTES, 'UTF-8');

        $p_img = "";
        if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
            $p_img = $_FILES["img"]["name"];
        }
    
        if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
    
            $targetDir = "../assets/images/teams/";
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
    
            $imgName = time() . "_" . basename((string)$_FILES["img"]["name"]);
    
            $targetFile = $targetDir . $imgName;
                
            $check = getimagesize($_FILES["img"]["tmp_name"]);

            $allowed_types = ['image/jpeg', 'image/png', 'image/webp'];
            if (!in_array($check['mime'], $allowed_types)) {
                die('Only PNG, JPEG, AND WebP are allowed');
                exit();
            }
                
            if ($check) {
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
                    $imgPath = (string)$targetFile;
                    $p_img = $imgName;
                }
            }else {
                echo 'upload error'. $_FILES["img"]["error"];
                exit();
            }
    
        }elseif ($_FILES['img']['error'] !== 4) {
            echo "upload error: " .$_FILES['img']['error'];
            exit();
        }

        $stmt = $conn -> prepare("INSERT INTO team(name, role, img, bio, i_link, f_link, l_link, t_link)VALUE(?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt -> bind_param("ssssssss", $name, $role, $p_img, $bio, $i_link, $f_link, $l_link, $t_link);

        $result = $stmt -> execute();
        if ($result) {
            echo "<div class='form_message'>
                    <div>New team added</div>
                    <div><a href='team.html'>OK</a></div>
                </div>";
        }else {
            die("unable to add team");
        }

    }else {
        die("INVALID REQUEST");
    }
    $stmt->close();
?>
</body>
</html>