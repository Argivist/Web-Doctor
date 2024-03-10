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
// Set header
$pdf->Cell(0, 10, 'Web Doctors', 0, 1, 'C'); // Adjust the alignment as needed
$pdf->Cell(0, 10, 'Ghana', 0, 1, 'C'); 
$pdf->Ln(); // Add some space between header and content
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
// Set footer
$pdf->SetY(-15); // Position at 15 mm from the bottom
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 10, 'Page ' . $pdf->PageNo(), 0, 0, 'C'); // Page number
// Output the PDF to the browser
$pdf->Output('receipt.pdf', 'D');
// Clear the cart items from the session
unset($_SESSION['cart_items']);
// Redirect to the home page
// header('Location: ../view/home.php');
?>
