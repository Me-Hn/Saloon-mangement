<?php
include('connection.php');
require 'dompdf/autoload.inc.php'; // Adjust the path based on your directory structure

use Dompdf\Dompdf;
use Dompdf\Options;

session_start();

if (isset($_POST['download'])) {
    // Retrieve the cart data
    $cartData = unserialize($_POST['cart_data']);
    
    // Initialize Dompdf
    $options = new Options();
    $options->set('defaultFont', 'Arial');
    $dompdf = new Dompdf($options);
    
    // Create HTML content for the invoice
    $html = '<h1>Invoice</h1>';
    $html .= '<p>Generated on: ' . date('Y-m-d') . '</p>';
    $html .= '<table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>';
    
    $total = 0;
    foreach ($cartData as $item) {
        $description = htmlspecialchars($item['pname']);
        $quantity = 1; // Change if needed
        $unitPrice = 100; // Change according to your data
        $lineTotal = $quantity * $unitPrice;
        
        $html .= '<tr>
                    <td>' . $description . '</td>
                    <td>' . $quantity . '</td>
                    <td>$' . number_format($unitPrice, 2) . '</td>
                    <td>$' . number_format($lineTotal, 2) . '</td>
                  </tr>';
        $total += $lineTotal;
    }
    
    $html .= '</tbody></table>';
    $html .= '<h3>Total: $' . number_format($total, 2) . '</h3>';
    
    // Load HTML content
    $dompdf->loadHtml($html);
    
    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');
    
    // Render the HTML as PDF
    $dompdf->render();
    
    // Output the generated PDF to browser
    $dompdf->stream('invoice.pdf', ['Attachment' => true]); // 'true' for download
    exit;
}
?>
