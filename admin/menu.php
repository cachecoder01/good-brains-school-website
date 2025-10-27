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

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href=".css/mobile.css">
    <link rel="stylesheet" href="../assets/fonts/css/all.min.css" />
    <link rel="shortcut icon" type="image/icon" href="../assets/images/brand-images/brand-logo1.png" />    

    <title>Good Brains Diamond School | Admin</title>
</head>
<body>
    <header>
        <div class="hero" style="background-color: #0a0f1f;">
            <nav>
                <div class="brand-img">
                    <img src="../assets/images/brand-images/brand-logo1.png" width="80">
                </div>
                <div class="brand-name">
                    <h2>Good Brains Diamond School</h2>
                </div>
                <div >
                    <div class="logout"><a onclick="return confirm('Are you sure you want to LogOut?')" href="logout.php">LogOut</a></div>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <section>
            <div class="menu_bar">
                <h3 class="title">What do you want to do?</h3>
                <div class="menu"><a href="gallery_form.php">Post new photos to gallery  <i class="fa fa-arrow-right"></i></a></div>
                <div class="menu"><a href="event_page.php">Post Events/Annoucement  <i class="fa fa-arrow-right"></i></a></div>
            </div>
        </section>
    </main>
</body>
</html>