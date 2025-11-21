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
                <li><a href="gallery_form.php" class="active"><i class="fa fa-caret-down"></i> Gallery</a></li>
    		    <li><a href="event_page.php"><i class="fa fa-caret-right"></i> Events/Annoucement</a></li>
                <li><a href="event_page.php"><i class="fa fa-caret-right"></i> Application List</a></li>
            </ul>
		</div>
	</section>
    
    <main>        
        <section class="content-container">
            <div class="page-name">
                <h2>Gallery</h2>
            </div>
            <div class="white-container gallery">
                <h2>Add New Photo to Gallery</h2>
                <div class="gallery-form-container">
                    <div class="child">
                        <div class="img-container">
                            <img id="preview" style="display: none" src="img.jpeg">
                        </div>
                    </div>
                    <div class="child form-container">
                        <form method="POST" action="add_gallery.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" name="img" id="file" required>
                            </div>
                            <div class="form-group">
                            <input type="text" name="category" list="category" placeholder="Enter Event Category" required>
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
                            <input type="submit" class="submit" value="POST">
                        </div>
                        </form>
                    </div>
                </div>                
            </div>

            <div class="white-container gallery">
                <h2>Gallery Posts</h2>
                <div class="gallery-list">
                    <div class="gallery-list-child "><h1>#GP1</h1></div>
                    <div class="gallery-list-child child"><img src="../assets/images/gallery/view-diverse-adolescents-practicing-health-wellness-activities-themselves-their-community.jpg"></div>
                    <div class="gallery-list-child child"><div class="event">Sport Day</div></div>
                    <div class="gallery-list-child child">2025-10-25</div>
                    <div class="gallery-list-child child"><div class="delete">Delete</div></div>
                </div>
                
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