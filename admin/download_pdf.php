<?php
include "../assets/db/connect.php";
require "fpdf/fpdf.php";

if (!isset($_GET['id'])) {
    die("No application selected.");
}

$id = intval($_GET['id']);

// Fetch application from DB
$sql = "SELECT * FROM application_form WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Application not found.");
}

$row = $result->fetch_assoc();

// Create PDF
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0, 12, "STUDENT APPLICATION FORM", 0, 1, 'C');
$pdf->Ln(10);

// Add image if available
if (!empty($row['passport'])) {
    $imagePath = "../assets/images/application-form/passport/" . $row['passport'];

    if (file_exists($imagePath)) {
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, "Passport:", 0, 1);
        $pdf->Image($imagePath, 10, $pdf->GetY(), 80);
    }
}

// Line separator
$pdf->SetLineWidth(0.5);
$pdf->Line(10, 28, 200, 28);
$pdf->Ln(55);

$pdf->SetFont('Arial', '', 12);

function addRow($pdf, $label, $value) {
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(50, 10, $label, 1, 0); 
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(130, 10, $value, 1, 1);
}

addRow($pdf, "Student Name", $row['student_name']);
addRow($pdf, "Preferred School", $row['school']);
addRow($pdf, "Age", $row['student_age']);
addRow($pdf, "Guardian Name", $row['guardian_name']);
addRow($pdf, "Email", $row['email']);
addRow($pdf, "Phone", $row['phone']);
addRow($pdf, "Location", $row['location']);
addRow($pdf, "Past School", $row['past_school']);

$pdf->Ln(5);

// Message (bigger box)
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, "Message:", 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 8, $row['message'], 1);


$pdf->Output("D", "Application_$id.pdf");
?>