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
                <li><a href="application_list.php" class="active"><i class="fa fa-caret-down"></i> Application List</a></li>
                <li><a href="gallery_form.php"><i class="fa fa-caret-right"></i> Gallery</a></li>
    		    <li><a href="event_page.php"><i class="fa fa-caret-right"></i> Events/Annoucement</a></li>
            </ul>
		</div>
	</section>
    
    <main>
        <section class="content-container">
            <div class="page-name">
                <h2>Application List</h2>
            </div>

            <div class="white-container application">
                <h2>Applied Student Form</h2>
                <?php
                    include '../assets/db/connect.php';

                        $stmt = $conn -> prepare ("SELECT * FROM application_form ORDER BY id desc");
                        $stmt -> execute();
                        $result = $stmt->Get_Result();
                        if ($result -> num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {
                                $id = $row["id"];
                                $img = $row["passport"];
                                $name = $row["student_name"];
                                $school = $row["school"];
                                $date = $row["date"];

                        echo '<div class="gallery-list">
                                <div class="gallery-list-child "><h1>#AP'.$id.'</h1></div>
                                <div class="gallery-list-child"><img src="../assets/images/application-form/passport/'.$img.'"></div>
                                <div class="gallery-list-child child">'.$name.'</div>
                                <div class="gallery-list-child child">'.$school.'</div>
                                <div class="gallery-list-child child">'.$date.'</div>
                                <div class="gallery-list-child "><a href="view_applicant.php?id='.$id.'" class="delete">View</a></div>
                            </div>';
                        }
                    }
                ?>
            </div>
        </section>
    </main>
    
    <script>
        const image = document.querySelector("#preview"),
        input = document.querySelector("input");

        input = addEventListener("change", () => {
            image.style.display = "block";
            image.src = URL.createObjectURL(input.files[0]);
        });
    </script>
</body>
</html>