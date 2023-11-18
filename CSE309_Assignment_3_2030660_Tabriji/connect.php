<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$message = $_POST['message'];
$number = $_POST['number'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration(firstName, lastName, gender, email, message, number) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $message, $number);

    if ($stmt->execute()) {
        echo "Contacted us successfully";
    } else {
        echo "Error: Contact submission failed";
    }

    $stmt->close();
    $conn->close();
}
