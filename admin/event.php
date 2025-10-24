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
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="../assets/fonts/css/all.min.css" />
    <link rel="shortcut icon" type="image/icon" href="../assets/images/brand-images/brand-logo1.png" />
    <link rel="stylesheet" href="./css/style.css">

    <title>Good Brains Diamond School | Admin</title>
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include "../assets/db/connect.php";

        $cat = trim($_POST["category"]);
        $cat = htmlspecialchars(strip_tags($cat), ENT_QUOTES, 'UTF-8');
        
        $type = trim($_POST["type"]);
        $type = htmlspecialchars(strip_tags($type), ENT_QUOTES, 'UTF-8');

        $date = trim($_POST["date"]);
        $date = htmlspecialchars(strip_tags($date), ENT_QUOTES, 'UTF-8');

        $time = trim($_POST["time"]);
        $time = htmlspecialchars(strip_tags($time), ENT_QUOTES, 'UTF-8');

        $am = trim($_POST["am"]);
        $am = htmlspecialchars(strip_tags($am), ENT_QUOTES, 'UTF-8');

        $desc = trim($_POST["description"]);
        $desc = htmlspecialchars(strip_tags($desc), ENT_QUOTES, 'UTF-8');

        echo $time;
        exit();

        $stmt = $conn -> prepare("INSERT INTO event(category, type, event_date, time, am, description)VALUE(?, ?, ?, ?, ?, ?)");
        $stmt -> bind_param("sssss", $cat, $type, $date, $time, $am, $desc);

        $result = $stmt -> execute();
        if ($result) {
            echo "<div class='form_message'>
                    <div>News Post Added</div>
                    <div><a href='event.html'>OK</a></div>
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