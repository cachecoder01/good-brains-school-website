<?php
    session_start();
    if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== TRUE) {
        header("location: index.html");
        exit();
    }

    include '../assets/db/connect.php';
    $count_applications = 0;
    $count_subscribers = 0;
    $count_gallery = 0;
    $count_events = 0;

    $r = $conn->query("SELECT COUNT(*) AS c FROM application_form");
    if ($r) { $count_applications = (int) $r->fetch_assoc()['c']; }

    $r = $conn->query("SELECT COUNT(*) AS c FROM subscribers");
    if ($r) { $count_subscribers = (int) $r->fetch_assoc()['c']; }

    $r = $conn->query("SELECT COUNT(*) AS c FROM gallery");
    if ($r) { $count_gallery = (int) $r->fetch_assoc()['c']; }

    $r = $conn->query("SELECT COUNT(*) AS c FROM event");
    if ($r) { $count_events = (int) $r->fetch_assoc()['c']; }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/mobile.css">
    <link rel="stylesheet" href="../assets/fonts/css/all.min.css" />
    <link rel="shortcut icon" type="image/icon" href="../assets/images/brand-images/brand-logo1.png" />    

    <title>Good Brains Diamond School | Admin</title>
</head>
<body>
    <header>
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
    </header>

    <section id="side-bar">
		<div class="side-bar">
            <ul>
                <li><a href="application_list.php"><i class="fa fa-caret-right"></i> Application List</a></li>
                <li><a href="email_list.php"><i class="fa fa-caret-right"></i> Subscribers List</a></li>
                <li><a href="gallery_form.php"><i class="fa fa-caret-right"></i> Gallery</a></li>
    		    <li><a href="event_page.php"><i class="fa fa-caret-right"></i> Events/Annoucement</a></li>
            </ul>
		</div>

        <div class="menu_bar">
            <h3 class="title">What do you want to do?</h3>
            <div class="menu"><a href="application_list.php">Application List <i class="fa fa-arrow-right"></i></a></div>
            <div class="menu"><a href="email_list.php">Subscribers List <i class="fa fa-arrow-right"></i></a></div>
            <div class="menu"><a href="gallery_form.php">Post new photos to gallery  <i class="fa fa-arrow-right"></i></a></div>
            <div class="menu"><a href="event_page.php">Post Events/Annoucement  <i class="fa fa-arrow-right"></i></a></div>
        </div>
	</section>

    <main>
        <section class="dashboard-home">
            <div class="page-name">
                <h2>Dashboard</h2>
            </div>

            <div class="dashboard-stats">
                <a href="application_list.php" class="stat-card">
                    <div class="stat-card-icon blue"><i class="fas fa-user-graduate"></i></div>
                    <div class="stat-card-value"><?= $count_applications ?></div>
                    <div class="stat-card-label">Applications</div>
                </a>
                <a href="email_list.php" class="stat-card">
                    <div class="stat-card-icon teal"><i class="fas fa-envelope"></i></div>
                    <div class="stat-card-value"><?= $count_subscribers ?></div>
                    <div class="stat-card-label">Subscribers</div>
                </a>
                <a href="gallery_form.php" class="stat-card">
                    <div class="stat-card-icon navy"><i class="fas fa-images"></i></div>
                    <div class="stat-card-value"><?= $count_gallery ?></div>
                    <div class="stat-card-label">Gallery Photos</div>
                </a>
                <a href="event_page.php" class="stat-card">
                    <div class="stat-card-icon red"><i class="fas fa-calendar-alt"></i></div>
                    <div class="stat-card-value"><?= $count_events ?></div>
                    <div class="stat-card-label">News & Events</div>
                </a>
            </div>

            <div class="menu-page">
                <img src="../assets/images/brand-images/brand-logo1.png" alt="Good Brains Diamond School">
                <h2>Good Brains Diamond School of Scholars International</h2>
            </div>
        </section>
    </main>
</body>
</html>