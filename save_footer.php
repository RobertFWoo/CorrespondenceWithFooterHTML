<?php
// Path to the JSON file
$jsonFilePath = 'footers.json';

// Get the JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Extract the footer text and type
$footer = $data['footer'] ?? '';
$type = $data['type'] ?? '';

// Initialize the footers array
$footers = [];

// Read the existing data from the JSON file
if (file_exists($jsonFilePath)) {
    $jsonContent = file_get_contents($jsonFilePath);
    $footers = json_decode($jsonContent, true);
}

// Update the footer text based on the type
if ($type && $footer) {
    $footers[$type] = $footer;

    // Save the updated data to the JSON file
    file_put_contents($jsonFilePath, json_encode($footers));

    // Respond with a success message
    echo json_encode(['status' => 'success']);
} else {
    // Respond with an error message
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
}
?>
