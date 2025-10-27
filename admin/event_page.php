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
    <link rel="stylesheet" href="./css/mobile.css">
    <link rel="stylesheet" href="../assets/fonts/css/all.min.css" />
    <link rel="shortcut icon" type="image/icon" href="../assets/images/brand-images/brand-logo1.png" />

    <title>Good Brains Diamond School | Admin</title>
</head>
<body>
    <header>
        <div class="hero" style="background-color: #0a0f1f;">
            <nav>
                <div class="back"><a href="menu.php"><i class="fa fa-angle-left"></i></a></div>
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
        <div class="event-form">
            <form method="POST" action="event.php">
                <select input type="text" name="category">
                    <option>-- Select Category</option>
                    <option>Event</option>
                    <option>Annoucement</option>
                </select>
                <input type="text" name="type" list="category" placeholder="Enter Event/Annoucement Day" required>
                    <datalist id="category">
                        <option value="Sport Day"></option>
                        <option value="Graduation Day"></option>
                        <option value="Speech Giving Day"></option>
                        <option value="Cultural Day"></option>
                        <option value="Career Day"></option>
                        <option value="Colour Day"></option>
                        <option value="Fruit Day"></option>
                        <option value="Social Day"></option>
                        <option value="Excursion Day"></option>
                    </datalist>
                <input type="date" name="date" required>
                <div style="display: flex;width: 100%;">
                    <input type="time" name="time" class="time" required>
                    <select input type="text" name="am" class="am">
                        <option>Am</option>
                        <option>Pm</option>
                    </select>
                </div>                
                <textarea name="description" maxlength="255" placeholder="Enter a short description, character(255)" required></textarea>
                <input type="submit" class="submit" value="POST">
            </form>
        </div>
    </main>
    
</body>
</html>