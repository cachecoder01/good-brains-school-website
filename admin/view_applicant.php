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
            <div class="back"><a href="javascript:history.back()"><i class="fa fa-angle-left"></i></a></div>
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
                <h2>Applied Students</h2>
                <?php
                    include '../assets/db/connect.php';
                    $id = $_GET["id"];

                        $stmt = $conn -> prepare ("SELECT * FROM application_form WHERE id=?");
                        $stmt -> bind_param("i", $id);
                        $stmt -> execute();
                        $result = $stmt->Get_Result();
                        if ($result -> num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {
                                $id = $row["id"];
                                $img = $row["passport"];
                                $name = $row["student_name"];
                                $school = $row["school"];
                                $past_school = $row["past_school"];
                                $past_class = $row["past_class"];
                                $age = $row["student_age"];
                                $g_name = $row["guardian_name"];
                                $email = $row["email"];
                                $phone = $row["phone"];
                                $location = $row["location"];
                                $message = $row["message"];
                                $date = $row["date"];                       
                        }
                    }
                ?>
                <div class="application-container">
                    <div class="flex">
                        <div class="child center"><img src="../assets/images/application-form/passport/<?= $img ?>"></div>
                        <div class="flex child">
                            <p>Name: <span><?= $name ?></span></p>
                            <p>School Applied For: <span><?= $school ?></span></p>
                            <p>Current/Past School: <span><?= $past_school ?></span></p>
                            <p>Current/Past Class: <span><?= $past_class ?></span></p>
                            <p>Studet Age: <span><?= $age ?></span></p>
                            <p>Guardian Name: <span><?= $g_name ?></span></p>
                            <p>Email: <span><?= $email ?></span></p>
                            <p>Phone: <span><?= $phone ?></span></p>
                            <p>Location: <span><?= $location ?></span></p>
                            <p>Date: <span><?= $date ?></span></p>
                        </div>
                    </div>
                    <div class="border">
                        <h2>Subjects to be offered</h2>
                        <div class="flex">
                            <table class="child border">
                                <tr>
                                    <th>S/NO</th><th>Subjects Title</th>
                                </tr>
                                <tr>
                                    <td class="center">1</td><td>English Language</td>
                                </tr>
                                <tr>
                                    <td class="center">2</td><td>English Language</td>
                                </tr>
                                <tr>
                                    <td class="center">3</td><td>English Language</td>
                                </tr>
                                <tr>
                                    <td class="center">4</td><td>English Language</td>
                                </tr>
                                <tr>
                                    <td class="center">5</td><td>English Language</td>
                                </tr>
                                <tr>
                                    <td class="center">6</td><td>English Language</td>
                                </tr>
                            </table>
                            <table class="child border">
                                <tr>
                                    <th>S/NO</th><th>Subjects Title</th>
                                </tr>
                                <tr>
                                    <td class="center">7</td><td>English Language</td>
                                </tr>
                                <tr>
                                    <td class="center">8</td><td>English Language</td>
                                </tr>
                                <tr>
                                    <td class="center">9</td><td>English Language</td>
                                </tr>
                                <tr>
                                    <td class="center">10</td><td>English Language</td>
                                </tr>
                                <tr>
                                    <td class="center">11</td><td>English Language</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="border">
                        <h2>Student Message</h2>
                        <p class="center"><?= $message ?></p>
                    </div>
                </div>
                <div class="btn-container">
                    <div class="dl-btn"><a href="#" >Download</a></div>
                    <div class="dl-btn"><a href="#" >Print</a></div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>