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

    <title>Good Brains Diamond School | School Gallery</title>
</head>
<body>
    <header class="about-page">
        <div class="hero">
            <nav id="navbar">
                <div class="nav-child">
                    <a href="index.php">
                        <div class="brand">
                            <div class="brand-img">
                                <img src="assets/images/brand-images/brand-logo1.png" width="75">
                            </div>
                            <div class="brand-name">
                                <h2>Good Brains Diamond School</h2>                                
                            </div>
                        </div>
                    </a>
                </div>
                <div class="nav-child">
                    <div class="nav-menu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="academics.html">Academics</a></li>
                            <li><a href="gallery.php" class="active">Gallery</a></li>
                            <li><a href="index.php#News">News</a></li>
                            <li><a href="index.php#Reviews">Reviews</a></li>
                            <li><a href="#Contact">Contact</a></li>
                        </ul>
                        <div class="apply-btn"><a href="enrollment.html">Apply Now</a></div>
                    </div>
                </div>
                <div class="menu">
                    <button id="menu-toggle" class="hamburger">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </button>
                </div>                

                <div id="side-menu" class="side-menu">
                    <ul>
                        <li><a href="about.html">About</a></li>
                        <li><a href="academics.html">Academics</a></li>
                        <li><a href="gallery.html" class="active">Gallery</a></li>
                        <li><a href="index.php#News">News</a></li>
                        <li><a href="index.php#Reviews">Reviews</a></li>
                        <li><a href="#Contact">Contact</a></li>
                    </ul>
                    <div class="apply-btn"><a href="enrollment.html">Apply Now</a></div>

                    <div class="social-links">
                        <div class="link-container"><a href="https://www.facebook.com/profile.php?id=61582771016980"><i class="fab fa-facebook"></i></a></div>
                        <div class="link-container"><a href="https://www.instagram.com/goodbrainsdiamondschool?igsh=MTQwODAyOHR1M2pmcw=="><i class="fab fa-instagram"></i></a></div>
                    </div>
                </div>

            </nav>
        </div>
    </header>

    <main>
        <section>
            <div class="header">
                <div class="header-content">
                    <div class="section-title">School Gallery</div>
                    <div class="tag">Take a glimpse into life at Good Brains Daimond School</div>
                </div>      
            </div>
        </section>

        <section id="Gallery">
            <div class="gallery-page">
                <div >
                    <?php
                        include './assets/db/connect.php';
                        $stmt = $conn -> prepare("SELECT DISTINCT category FROM gallery ORDER BY category asc");
                        $stmt -> execute();
                        $result = $stmt -> Get_Result();
                        if ($result -> num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {
                                $event = $row["category"];

                            echo '<div class="gallery">
                            <div class="category-name"> - '.$event.' -</div>';
                            echo '<div class="img-container">';
                            $stmt2 = $conn -> prepare("SELECT * FROM gallery WHERE category=?");
                            $stmt2 -> bind_param("s", $event);
                            $stmt2 -> execute();
                            $result2 = $stmt2 -> Get_Result();
                            if ($result2 -> num_rows > 0) {
                                while ($row = $result2 -> fetch_assoc()) {
                                    $img = $row["image"];
                                    echo '<div class="img">
                                            <img src="assets/images/gallery/'.$img.'">
                                        </div>';
                                }
                            }
                            echo '</div>';
                            echo '</div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </section>

        <!-- Lightbox structure -->
        <div id="lightbox" class="lightbox">
            <span class="close" onclick="closeLightbox()">&times;</span>
            <img id="lightbox-img" src="" alt="">
            <span class="prev" onclick="changeImage(-1)">&#10094;</span>
            <span class="next" onclick="changeImage(1)">&#10095;</span>
        </div>

        <section id="Contact">
            <div class="contact">
                <div class="section-title">- Contact Us -</div>
                <p class="section-description">Get in touch with us for admissions, inquiries, or to schedule a visit</p>
                <div class="contact-container">
                    <div class="contact-container-child">
                        <div class="div-title">Get In Touch</div>
                        <div>
                            <div>
                                <div class="contact-info">
                                    <div class="fa-container"><i class="fas fa-map-marker-alt"></i></div>
                                    <div>
                                        <strong>Our Location</strong>
                                        <span>Madam Mercy Road, Opp. Big Mosque Dagiri Gwagwalada, F.C.T Abuja</span>
                                    </div>
                                </div>
                                <div class="contact-info">
                                    <div class="fa-container"><i class="fas fa-phone"></i></div>
                                    <div>
                                        <strong>Phone</strong>
                                        <span><a href="tel:+234 08063320006">+234 08063320006</a></span>
                                    </div>
                                </div>
                                <div class="contact-info">
                                    <div class="fa-container"><i class="far fa-envelope"></i></div>
                                    <div>
                                        <strong>Email</strong>
                                        <span><a href="mailto:goodbrainsdiamondschool@gmail.com">goodbrainsdiamondschool<span class="br">@gmail.com</span></a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="school-hour">
                                <div class="div-title">school hours</div>
                                <p>Monday - Friday: 7:30 AM - 3:00 PM</p>
                                <p>Saturday - Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                    <div class="contact-container-child">
                        <div class="form-container">
                            <form data-aos="fade-left" action="https://api.web3forms.com/submit" method="POST">
                                
                                <input type="hidden" name="access_key" value="31083e90-e6a1-4fb9-84d9-d21e4a99738d">
                                <!-- Honeypot Spam Protection -->
                                <input type="checkbox" name="botcheck" class="hidden" style="display: none;">
                                
                                <h2>Send Us a Message</h2>
                                
                                <input type="hidden" name="subject" value="Contact Form Message" required>
                                <input type="text" name="name" placeholder="Enter Name*" required>
                                <input type="email" name="email" placeholder="Enter Email*" required>
                                <textarea name="message" placeholder="Enter Your Message" required></textarea>

                                <input type="hidden" name="redirect" value="http://localhost/goodbrains/thanks.html">

                                <input type="submit" class="submit" value="send">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="footer-container">
                <div class="footer-container-child">
                    <div class="div-title">Good Brains Diamond School</div>
                    <p>Nurturing bright minds for a better tomorrow through quality education and holistic development.</p>
                </div>
                <div class="footer-container-child">
                    <div class="div-title">Quik links</div>
                    <p><a href="about.html">About</a></p>
                    <p><a href="academics.html">Academics</a></p>
                    <p><a href="#Gallery">Gallery</a></p>
                    <p><a href="index.php#News">News</a></p>
                    <p><a href="index.php#Reviews">Reviews</a></p>

                </div>
                <div class="footer-container-child">
                    <div class="div-title">Contact</div>
                    <p>Madam Mercy Road, Opp. Big Mosque Dagiri Gwagwalada, F.C.T Abuja</p>
                    <p><a href="tel:+234 08063320006">+234 08063320006</a></p>
                    <p><a href="mailto:goodbrainsdiamondschool@gmail.com">goodbrainsdiamondschool@gmail.com</a></p>
                </div>
                <div class="footer-container-child">
                    <div class="div-title">follow us</div>
                    <div class="social-links">
                        <div class="link-container"><a href="https://www.facebook.com/profile.php?id=61582771016980"><i class="fab fa-facebook"></i></a></div>
                        <div class="link-container"><a href="https://www.instagram.com/goodbrainsdiamondschool?igsh=MTQwODAyOHR1M2pmcw=="><i class="fab fa-instagram"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="copyrights">
                <div class="copyrights-child">
                    <p><span id="footerDate"></span> Good Brains Diamond School | <span class="me">Designed and Developed by <a href="https://cachecoder.site" target="_blank">CacheCoder</a></span></p>
                </div>
                <div class="copyrights-child">
                    <p class="right">All rights reserved</p>
                </div>
            </div>    
        </footer>

    </main>
    
    <script src="assets/js/script.js" defer></script>
    <script src="assets/js/aos.js"></script>

    <script>
        window.addEventListener('scroll', () => {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        if (window.innerWidth < 768) {
            document.querySelectorAll('[data-aos]').forEach(el => {
                el.removeAttribute('data-aos');
            });
        } else {
            AOS.init({
                duration: 1000,
                once: true
            });
        }
        });
    </script>

    <script src="assets/js/light_box.js" defer></script>

    <script>
        const startYear = 2024;
        const currentYear = new Date().getFullYear();
        const footerDateEl = document.getElementById("footerDate");

        if (footerDateEl) {
        footerDateEl.textContent =
            `© ${startYear}` + (currentYear > startYear ? ` - ${currentYear}` : '');
        }
    </script>

</body>
</html>