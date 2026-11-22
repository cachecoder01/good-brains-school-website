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
        <nav>
            <div class="back"><a href="menu.php"><i class="fa fa-angle-left"></i></a></div>
            <div class="brand-img">
                <img src="../assets/images/brand-images/brand-logo1.png" width="80">
            </div>
            <div class="brand-name">
                <h2>Good Brains Diamond School</h2>
            </div>
            <div >
                <div class="logout"><a href="logout.php" onclick="return confirm('Are you sure you want to LogOut?')">LogOut</a></div>
            </div>
        </nav>
    </header>

    <section id="side-bar">
		<div class="side-bar">
            <ul>
                <li><a href="application_list.php"><i class="fa fa-caret-right"></i> Application List</a></li>
                <li><a href="email_list.php" class="active"><i class="fa fa-caret-down"></i> Subscribers List</a></li>
                <li><a href="gallery_form.php"><i class="fa fa-caret-right"></i> Gallery</a></li>
    		    <li><a href="event_page.php"><i class="fa fa-caret-right"></i> Events/Annoucement</a></li>
            </ul>
		</div>
	</section>
    
    <main>
        <section class="content-container">
            <div class="page-name">
                <h2>Subscribers</h2>
            </div>
            <div class="white-container email">
                <h2>Subscribers List</h2> 
                <a href="download_email.php" class="dl-btn">Download CSV</a>
                <div class="email-container">
                    <?php
                        include '../assets/db/connect.php';

                        $stmt = $conn -> prepare ("SELECT * FROM subscribers ORDER BY id desc");
                        $stmt -> execute();
                        $result = $stmt->Get_Result();
                        if ($result -> num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {
                                $id = $row["id"];
                                $sub_email = $row["email"];

                                echo '<div class="flex">
                                        <div class="id">#S'.$id.'</div>
                                        <div class="email-list" id="email-'.$id.'">'.$sub_email.'</div>
                                        <div class="copy">
                                            <button onclick="copyEmail('.$id.')"><i class="fa fa-copy"></i></button>
                                        </div>
                                    </div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>
    
    <script>
        function copyEmail(id) {
    const emailText = document.getElementById('email-' + id).innerText;

    navigator.clipboard.writeText(emailText)
        .then(() => {
            alert("Email copied: " + emailText);
        })
        .catch(err => {
            console.error("Failed to copy: ", err);
        });
}
    </script>
</body>
</html>