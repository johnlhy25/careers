<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'third_party/tcpdf/tcpdf.php'; // Adjust the path as per your setup

function get_tcpdf_instance() {
    return new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
}

function sign_pdf_with_pem($pdf, $pem_file, $passphrase = null) {
    // Read PEM file
    $pem_content = file_get_contents($pem_file);

    // Extract private key
    $private_key = openssl_get_privatekey($pem_content, $passphrase);

    if (!$private_key) {
        die('Error: ' . openssl_error_string());
    }

    // Example of signing content (adjust as per your requirement)
    $data = 'Example data to sign';
    $signature = '';
    $result = openssl_sign($data, $signature, $private_key, OPENSSL_ALGO_SHA256);

    if (!$result) {
        die('Error: Failed to create signature');
    }

    // Optionally, add the signature to the PDF
    // Example: $pdf->SetSignature($signature);

    openssl_free_key($private_key);
}
?>
