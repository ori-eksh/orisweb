<?php
include 'config.php';
include 'sendMail.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('display_errors', value: 0); // Disable error display
ini_set('log_errors', 1); // Enable error logging
ini_set('error_log', __DIR__ . '/error.log'); // Set the error log file path

// Set Content-Type header
header('Content-Type: application/json');


// Add an ad
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    $token = bin2hex(random_bytes(16));

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO ads (name, email, content, date_posted, deletion_token) VALUES (?, ?, ?, NOW(), ?)");
    $stmt->bind_param("ssss", $name, $email, $content, $token);

    if ($stmt->execute()) {
         // Send a confirmation email
         $emailSent = sendConfirmationEmail($email, $name);
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }

    $stmt->close();
    exit;
}

// Fetch ads
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT name, content, date_posted FROM ads ORDER BY date_posted DESC";
    $result = $conn->query($sql);

    if (!$result) {
        echo json_encode(["success" => false, "error" => $conn->error]);
        exit;
    }

    $ads = [];
    while ($row = $result->fetch_assoc()) {
        $ads[] = $row;
    }

    // Send JSON data to the frontend
    echo json_encode($ads);
    exit;
}

