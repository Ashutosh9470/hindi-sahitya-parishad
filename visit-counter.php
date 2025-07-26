<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

$counterFile = 'visit-count.json';

// Initialize counter file if it doesn't exist
if (!file_exists($counterFile)) {
    file_put_contents($counterFile, json_encode(['visits' => 0, 'last_updated' => date('Y-m-d H:i:s')]));
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Return current count
    $data = json_decode(file_get_contents($counterFile), true);
    echo json_encode(['visits' => $data['visits'] ?? 0]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Increment count
    $data = json_decode(file_get_contents($counterFile), true);
    $data['visits'] = ($data['visits'] ?? 0) + 1;
    $data['last_updated'] = date('Y-m-d H:i:s');
    
    file_put_contents($counterFile, json_encode($data));
    echo json_encode(['visits' => $data['visits']]);
}
?> 