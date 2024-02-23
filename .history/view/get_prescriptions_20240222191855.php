<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Validation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .prescription-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .prescription {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }
        .prescription img {
            max-width: 100%;
        }
        .validation-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="prescription-container">
        <?php
        // Check if there are prescriptions waiting for validation
        // For demonstration purposes, here we simulate prescriptions with dummy data
        $prescriptions = array(
            array('id' => 1, 'customer_name' => 'John Doe', 'image' => 'prescription1.jpg'),
            array('id' => 2, 'customer_name' => 'Alice Smith', 'image' => 'prescription2.jpg'),
            array('id' => 3, 'customer_name' => 'Bob Johnson', 'image' => 'prescription3.jpg')
            // Add more prescriptions here as needed
        );

        // Display each prescription
        foreach ($prescriptions as $prescription) {
            echo "<div class='prescription'>";
            echo "<h3>Prescription for " . $prescription['customer_name'] . "</h3>";
            echo "<img src='prescriptions/" . $prescription['image'] . "' alt='Prescription'>";
            echo "<button class='validation-button' onclick='validatePrescription(" . $prescription['id'] . ")'>Validate Prescription</button>";
            echo "</div>";
        }
        ?>

        <!-- JavaScript for prescription validation -->
        <script>
            function validatePrescription(prescriptionId) {
                // Send an AJAX request to a PHP script to handle prescription validation
                // You can implement this part based on your server-side validation process
                // For demonstration purposes, we'll just show an alert
                alert("Prescription ID " + prescriptionId + " validated successfully!");
                // You may want to reload the page or update the UI after validation
            }
        </script>
    </div>
</body>
</html>