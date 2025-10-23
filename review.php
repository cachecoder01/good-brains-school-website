<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="assets/fonts/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/mobile.css" />
    <link rel="shortcut icon" type="image/icon" href="./assets/images/brand-images/brand-logo1.png" />
    <link rel="stylesheet" href="assets/css/aos.css" />

    <title>Good Brains Diamond School | Review</title>

</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        include './assets/db/connect.php';

        $name = trim($_POST["name"]);
        $name = htmlspecialchars(strip_tags($name), ENT_QUOTES, 'UTF-8');

        $email = trim($_POST["email"]);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        $role = trim($_POST["role"]);
        $role = htmlspecialchars(strip_tags($role), ENT_QUOTES, 'UTF-8');

        $review = trim($_POST["review"]);
        $review = htmlspecialchars(strip_tags($review), ENT_QUOTES, 'UTF-8');

        $stmt = $conn -> prepare("INSERT INTO review(name, email, role, review)VALUE(?, ?, ?, ?)");
        $stmt -> bind_param("ssss", $name, $email, $role, $review);

        $result = $stmt -> execute();
        if ($result) {

            echo "<div class='form_message'>
                    <div>Review Submited</div>
                    <div><a href='review.html'>OK</a></div>
                </div>";
        }else {
            die("Unable to submit");
        }
        
    }else {
        die('INVALID REQUEST');
    }
?>
</body>
</html>