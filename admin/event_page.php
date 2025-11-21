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
                <div class="logout"><a onclick="return confirm('Are you sure you want to LogOut?')" href="logout.php">LogOut</a></div>
            </div>
        </nav>
    </header>

    <section id="side-bar">
		<div class="side-bar">
            <ul>
                <li><a href="application_list.php"><i class="fa fa-caret-right"></i> Application List</a></li>
                <li><a href="gallery_form.php" ><i class="fa fa-caret-down"></i> Gallery</a></li>
    		    <li><a href="event_page.php" class="active"><i class="fa fa-caret-down"></i> Events/Annoucement</a></li>
            </ul>
		</div>
	</section>

   <main>
        <section class="content-container">
            <div class="page-name">
                <h2>Events/Announcement</h2>
            </div>
            <div class="white-container event">
                <h2>Post News update</h2>
                <div class="event-container">
                    <div class="child">
                        <div class="news-box">
                            <div class="news-head">
                                <div class="child">
                                    <div class="category">Announcement</div>
                                </div>
                                <div class="child">
                                    <div class="date "><i class="fa fa-calendar-alt"></i> Oct 5, 2025</div>
                                </div>                                
                            </div>
                            <h2>Parent-Teacher Conference</h2>
                            <p>Student are hereby informed that the midterm break begins immediately. Regular academic activities will resume on the schedule school day which is on Monday 24th, of Nov, 2025. Parents/guardians are advised to ensure students return prepared and ready.</p>
                            <div>04 : 30 pm</div>
                        </div>
                    </div>
                    <div class="form-container child">
                        <form method="POST" action="event.php">
                            <div class="form-group">
                                <select input type="text" name="category">
                                    <option>-- Select Category</option>
                                    <option>Event</option>
                                <option>Annoucement</option>
                                </select>
                            </div>
                            <div class="form-group">
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
                            </div>
                            <div class="form-group">
                                <input type="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <div style="display: flex; gap: 10px; width: 100%;">
                                    <input type="time" name="time" class="time" required>
                                    <select input type="text" name="am" class="am">
                                        <option>Am</option>
                                        <option>Pm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="description" maxlength="355" placeholder="Enter a short description, character(355)" required></textarea>
                            </div>
                            <div >
                                <input type="submit" class="submit" value="POST">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="white-container event">                
                <h2>Posted News update</h2>
                <div class="news-container">
                    <?php
                        include '../assets/db/connect.php';
                        $stmt = $conn ->prepare("SELECT * FROM event ORDER BY date desc");
                        $stmt -> execute();
                        $result = $stmt -> Get_result();
                        if ($result -> num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {
                                $id = $row["id"];
                                $cat = $row["category"];
                                $date = $row["event_date"];
                                $title = $row["type"];
                                $desc = $row["description"];
                                $time = $row["time"];
                                $am = $row["am"];

                            echo '<div data-aos="fade-left" class="news-box">
                                    <div class="news-head">
                                        <div class="child">
                                            <div class="category">'.$cat.'</div>
                                        </div>
                                        <div class="child">
                                            <div class="date"><i class="fa fa-calendar-alt"></i> '.$date.'</div>
                                        </div>                                
                                    </div>
                                    <h2>'.$title.'</h2>
                                    <p>'.$desc.'</p>
                                    <div>'.$time.' '.$am.'</div>';?>
                                    <a href="delete_news.php?id=<?= $id ?>" onclick="return confirm('Are you sure you want to Delete Photo News <?= $id ?>?')" class="delete">Delete</a>
                                <?php
                                echo '</div>';
                            }
                        }else {
                            echo '<p>No news update';
                        }
                    ?>
                </div>
            </div>
        </section>        
    </main>
    
</body>
</html>