<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $position = $_POST['position'];
    $signature = $_POST['signature'];
    $public_key = $_POST['public_key'];
    $private_key = $_POST['private_key'];
    $rsa_signature = $_POST['rsa_signature'];

    // Handle file uploads
    $id_picture = file_get_contents($_FILES['id_picture']['tmp_name']);
    $resume = file_get_contents($_FILES['resume']['tmp_name']);

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO applications (name, age, birthday, address, position, id_picture, resume, signature, public_key, private_key, rsa_signature) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisssssssss", $name, $age, $birthday, $address, $position, $id_picture, $resume, $signature, $public_key, $private_key, $rsa_signature);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo json_encode(['message' => 'Application submitted successfully.']);
    } else {
        echo json_encode(['message' => 'Error submitting application.']);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
