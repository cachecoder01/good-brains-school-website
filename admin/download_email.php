<?php
include '../assets/db/connect.php';

// Set headers so the browser downloads the file
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=email_list.csv');

// Open output stream
$output = fopen('php://output', 'w');

// Write column headers
fputcsv($output, ['Email']);

// Fetch emails from DB
$sql = "SELECT email FROM subscribers"; 
$result = $conn->query($sql);

// Write data rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

fclose($output);
exit;
?>