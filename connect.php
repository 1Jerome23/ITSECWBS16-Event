<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'eventplify');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, email, phoneNumber, password, confirmPassword) VALUES (?, ?, ?, ?, ?, ?)");
    // Bind parameters
    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $phoneNumber, $password, $confirmPassword);
    // Execute the statement
    $stmt->execute();
    // Close the statement
    $stmt->close();
    // Close the connection
    $conn->close();
}
?>
