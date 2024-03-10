<?php
require_once('../imports/fpdf.php'); // Include FPDF library

include '../settings/connection.php';
session_start();

// Create a new PDF document
$pdf = new FPDF();

// Define header callback function
$pdf->SetHeaderCallback(function($pdf) {
    // Add an image (replace 'logo.png' with the path to your logo)
    $pdf->Image('logo.png', 10, 10, 30);
    // Set font for header
    $pdf->SetFont('Arial', 'B', 12);
    // Add company name and information
    $pdf->Cell(0, 10, 'Company Name', 0, 1, 'R');
    $pdf->Cell(0, 10, 'Address, City, Country', 0, 1, 'R');
});

// Define footer callback function
$pdf->SetFooterCallback(function($pdf) {
    // Set font for footer
    $pdf->SetFont('Arial', 'I', 8);
    // Add page number
    $pdf->Cell(0, 10, 'Page ' . $pdf->PageNo(), 0, 0, 'C');
});

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', '', 12);

// Check if cart items are available in the session
if(isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items'])) {
    // Loop through each cart item
    foreach($_SESSION['cart_items'] as $item) {
        // Get medication information
        $query = "SELECT * FROM medicine_inventory WHERE medicine_id = '" . $item['med_id'] . "'";
        $result = mysqli_query($conn, $query);
        $med = mysqli_fetch_assoc($result);

        // Output the details of each item
        $pdf->Cell(0, 10, 'Medicine Name: ' . $med['medicine_name'], 0, 1);
        $pdf->Cell(0, 10, 'Quantity: ' . $item['qty'], 0, 1);
        $pdf->Cell(0, 10, 'Price: ' . $med['medicine_price'], 0, 1);
        $pdf->Cell(0, 10, 'Total Cost: ' . $item['total_cost'], 0, 1);
        $pdf->Cell(0, 10, '------------------------------------', 0, 1);
    }
} else {
    // Display a message if the cart is empty
    $pdf->Cell(0, 10, 'Your cart is empty.', 0, 1);
}

// Output the PDF to the browser
$pdf->Output('receipt.pdf', 'D');

// Clear the cart items from the session
unset($_SESSION['cart_items']);

// Redirect to the home page
header('Location: ../view/home.php');
?>
