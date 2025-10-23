<?php
    session_start();
    if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== TRUE) {
        header("location: index.html");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="../assets/fonts/css/all.min.css" />
    <link rel="shortcut icon" type="image/icon" href="../assets/images/brand-images/brand-logo1.png" />
    <link rel="stylesheet" href="./css/style.css">

    <title>Good Brains Diamond School | Admin</title>
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();

        include '../assets/db/connect.php';

        $cat = trim($_POST["category"]);
        $cat = htmlspecialchars(strip_tags($cat), ENT_QUOTES, 'UTF-8');

        $img = "";
        if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
            $img = $_FILES['img']['name'];
        }

        if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {

            $targetDir = "../assets/images/gallery/";
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, TRUE);
            }

            $imgName = time() . "_" . basename((string)$_FILES['img']['name']);

            $targetFile = $targetDir . $imgName;

            $check = getimagesize($_FILES['img']['tmp_name']);

            $allowedType = ['image/jpeg', 'image/png', 'image/webp'];
            if (!in_array($check['mime'], $allowedType)) {
                die('File Format Not Allowed');
            }

            if ($check) {
                if (move_uploaded_file($_FILES['img']['tmp_name'], $targetFile)) {
                    $imgPath = (string) $targetFile;
                    $imp = $imgName;
                }
            }else {
                echo 'Upload error:'. $_FILES['img']['error'];
                exit();
            }

        }elseif ($_FILES['img']['error'] !== 4) {
            echo 'Upload error:'. $_FILES['img']['error'];
            exit();
        }

        $stmt = $conn ->prepare("INSERT INTO gallery(category, image)VALUE(?, ?)");
        $stmt ->bind_param("ss", $cat, $img);

        $result = $stmt ->execute();
        if ($result) {
            echo "<div class='form_message'>
                    <div>Photo Posted</div>
                    <div><a href='add_gallery.html'>OK</a></div>
                </div>";
        }else {
            echo "Unable to insert";
        }
    }else {
        die("INVALID REQUEST");
    }
?>
</body>
</html>