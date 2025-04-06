<?php
// Path to the JSON file
$jsonFilePath = 'footers.json';

// Initialize the footers array
$footers = [
    "testimony" => "If you have been blessed by the Most-High through Sabbath Keepers Fellowship, please include a short 1 to 2 paragraph testimonial to that effect for use on our website and other outreaches we have to the people who support us. They care and want to see you to know how their efforts are used. Thank you, from us and all of them.",
    "florida" => "Thank you for your support and contributions. Your feedback and testimonials help us improve our services and reach more people. We appreciate your time and effort in providing us with valuable insights."
];

// Check if the JSON file exists and read its content
if (file_exists($jsonFilePath)) {
    $jsonContent = file_get_contents($jsonFilePath);
    $savedFooters = json_decode($jsonContent, true);
    if (is_array($savedFooters)) {
        $footers = array_merge($footers, $savedFooters);
    }
}

// Respond with the footers
echo json_encode($footers);
?>
