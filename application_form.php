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

    <title>Good Brains Diamond School | Application Form</title>

    <style>
        body {
            background-color: #f6f4f4fe;
        }
        .contact {
            background-color: white;
            padding: 20px 30px;
            margin: 50px auto;
        }
    </style>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include './assets/db/connect.php';

            $name = trim($_POST["student_name"]);
            $name = htmlspecialchars(strip_tags($name), ENT_QUOTES, 'UTF-8');

            $school = trim($_POST['school']);
            $school = htmlspecialchars(strip_tags($school), ENT_QUOTES, 'UTF-8');

            $age = trim($_POST['age']);
            $age = filter_var(strip_tags($age), FILTER_VALIDATE_INT);

            $guardian_name = trim($_POST['gurdian_name']);
            $guardian_name = htmlspecialchars(strip_tags($guardian_name), ENT_QUOTES, 'UTF-8');

            $email = trim($_POST['email']);
            $email = htmlspecialchars(strip_tags($email), ENT_QUOTES, 'UTF-8');

            $phone = trim($_POST['phone']);
            $phone = htmlspecialchars(strip_tags($phone), ENT_QUOTES, 'UTF-8');

            $location = trim($_POST['location']);
            $location = htmlspecialchars(strip_tags($location), ENT_QUOTES, 'UTF-8');

            $past_school = trim($_POST['past_school']);
            $past_school = htmlspecialchars(strip_tags($past_school), ENT_QUOTES, 'UTF-8');

            $past_class = trim($_POST['past_class']);
            $past_class = htmlspecialchars(strip_tags($past_class), ENT_QUOTES, 'UTF-8');

            $message = trim($_POST['message']);
            $message = htmlspecialchars(strip_tags($message), ENT_QUOTES, 'UTF-8');

            $img = "";
            if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
                $img = $_FILES['img']['name'];
            }

            if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
                $targetDir = './assets/images/application-form/passport/';
                if (!is_dir($targetDir)) {
                    mkdir ($targetDir, 07777, TRUE);
                }

                $imageName = time() . "_" . basename((string)$_FILES["img"]["name"]);

                $targetFile = $targetDir . $imageName;

                $check = getimagesize($_FILES["img"]["tmp_name"]);

                $allowedType = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
                if (!in_array($check['mime'], $allowedType)) {
                    die("Image Not Allowed");
                    header('location: enrollment.html');
                    exit();
                }

                if ($check) {
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
                        $imgPath = (string) $targetFile;
                        $img = $imageName;
                    }
                }else {
                    die('Upload error: ' .$_FILES["img"]["error"]);
                    header('location: enrollment.html');
                    exit();
                }
                
            }elseif ($_FILES['img']['error'] !== 4) {
                die('Upload error: ' .$_FILES["img"]["error"]);
                header('location: enrollment.html');
                exit();
            };

            $stmt = $conn -> prepare("INSERT INTO application_form(student_name, school, student_age, guardian_name, email, phone, location, past_school, past_class, passport, message)VALUE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt -> bind_param("ssississsss", $name, $school, $age, $guardian_name, $email, $phone, $location, $past_school, $past_class, $img, $message);

            $result = $stmt ->execute();
            if ($result) {
                header('location: thanks.html');
            }else {
                echo "Unable to insert";
            }

            // ---------- SEND TO WEB3FORMS ----------
$web3forms_url = "https://api.web3forms.com/submit";

$data = [
    "access_key" => "31083e90-e6a1-4fb9-84d9-d21e4a99738d", // your key
    "subject"    => "New Student Application",
    "Student Name" => $name,
    "School Applied" => $school,
    "Age" => $age,
    "Guardian Name" => $guardian_name,
    "Email" => $email,
    "Phone" => $phone,
    "Location" => $location,
    "Past School" => $past_school,
    "Past Class" => $past_class,
    "Message" => $message,
    "Passport" => "Passport uploaded. View it in the admin dashboard: goodbrains/admin/application_form.php"
];

$ch = curl_init($web3forms_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);
            
        }else {
            die("INAVLID REQUEST");
        }
    ?>
</body>
</html>