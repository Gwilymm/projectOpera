<?php

// Set up error handling
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define the path to the SQLite database
// Ensure this path matches the mounted volume path in Docker
$databasePath = './data/carnet.sqlite';

try {
    // Create a new database if it doesn't exist and set the connection
    $db = new PDO('sqlite:' . $databasePath);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the table if it doesn't exist
    $db->exec("CREATE TABLE IF NOT EXISTS journal (id INTEGER PRIMARY KEY, date TEXT, title TEXT, story TEXT)");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Handle GET and POST requests
$requestMethod = $_SERVER['REQUEST_METHOD'];

header('Content-Type: application/json'); // Set Content-Type for JSON response

if ($requestMethod == 'GET') {
    // Return all entries
    $result = $db->query('SELECT * FROM journal');
    echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));
} elseif ($requestMethod == 'POST') {
    // Add a new entry
    $data = json_decode(file_get_contents('php://input'), true);
    // Consider validating and sanitizing $data here
    $stmt = $db->prepare("INSERT INTO journal (date, title, story) VALUES (:date, :title, :story)");
    $stmt->execute([
        ':date' => $data['date'],
        ':title' => $data['title'],
        ':story' => $data['story'],
    ]);
    echo json_encode(['message' => 'Journal entry added successfully']);
} else {
    // Handle other HTTP request methods
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
}
