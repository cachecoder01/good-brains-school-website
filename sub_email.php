<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/mobile.css" />
    <link rel="shortcut icon" type="image/icon" href="./assets/images/brand-images/brand-logo1.png" />

    <title>Good Brains Diamond School | Thank You</title>
</head>
<body>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        include './assets/db/connect.php';

        $email = trim($_POST['email']);
        $email = htmlspecialchars(strip_tags($email), FILTER_VALIDATE_EMAIL);

        $stmt = $conn -> prepare("SELECT * FROM subscribers");
        $stmt -> execute();
        $check = $stmt -> Get_Result(); 
        if ($check -> num_rows > 0) {
             echo "<div class='form_message'>
                    <div class='green'>Email already subscribed</div>
                    <div>Thank You 🎉</div>
                    <div><a href='index.php'>OK</a></div>
                </div>";
        }else {
            $stmt = $conn -> prepare("INSERT INTO subscribers(email)VALUE(?)");
            $stmt -> bind_param("s", $email);
            $result = $stmt -> execute();
            if ($result) {
                echo "<div class='form_message'>
                        <div class='green'>Submitted</div>
                        <div>Thank You 🎉</div>
                        <div><a href='index.php'>OK</a></div>
                    </div>";
            }else {
                echo 'unable to subscribe';
            }
        }        

    }else {
        die("INVALID REQUEST");
    }
?>
</body>
</html>