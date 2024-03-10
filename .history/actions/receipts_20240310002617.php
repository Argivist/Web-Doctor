<?php
require_once('../imports/fpdf.php'); // Include FPDF library

include '../settings/connection.php';
session_start();

// Create a new PDF document
$pdf = new FPDF();

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', '', 12);

// Check if cart items are available in the session
if(isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items'])) {
    // Loop through each cart item
    foreach($_SESSION['cart_items'] as $item) {
        // Get medication information
        $query = "SELECT * FROM medicine WHERE medicine_id = '" . $item['med_id'] . "'";
        $result = mysqli_query($conn, $query);
        $med = mysqli_fetch_assoc($result);

        // Output the details of each item
        $pdf->Cell(0, 10, 'Medicine Name: ' . $med['medicine_name'], 0, 1);
        $pdf->Cell(0, 10, 'Quantity: ' . $item['qty'], 0, 1);
        $pdf->Cell(0, 10, 'Price: ' . $med['price'], 0, 1);
        $pdf->Cell(0, 10, 'Total Cost: ' . $item['total_cost'], 0, 1);
        $pdf->Cell(0, 10, '------------------------------------', 0, 1);
    }
} else {
    // Display a message if the cart is empty
    $pdf->Cell(0, 10, 'Your cart is empty.', 0, 1);
}

// Output the PDF to the browser
$pdf->Output('receipt.pdf', 'D');
?>
