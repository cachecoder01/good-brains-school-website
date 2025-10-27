<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href=".css/mobile.css">
    <link rel="shortcut icon" type="image/icon" href="../assets/images/brand-images/brand-logo1.png" />
    <link rel="stylesheet" href="../assets/fonts/css/all.min.css" />

    <title>Good Brains Diamond School | Admin</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    
    $email = trim($_POST["email"]);
    $email = htmlspecialchars(strip_tags($email), ENT_QUOTES, 'UTF-8');

    $pass = trim($_POST["pass"]);
    $pass = htmlspecialchars(strip_tags($pass), ENT_QUOTES, 'UTF-8');

    $s_email = 'goodbrainsdiamondschool@gmail.com';
    $pass_hash = '$2y$10$zTeW930VT0X2QrzoeyzQkuZkiUnC3NpfWaFNKDArdS.xU.vzi1UGu';

    if (password_verify($pass, $pass_hash) AND $email == $s_email) {

        header("location: menu.php");
        $_SESSION["admin_logged_in"] = TRUE;

    }else {

        echo "<div class='form_message'>
                <div>PassKey do not match</div>
                <div><a href='index.html'>Try Again</a></div>
            </div>";
    }

}else{

    die("INVALID REQUEST");
}

?>
</body>
</html>