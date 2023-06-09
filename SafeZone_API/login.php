<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "safezone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from the login form
$username = $_POST['id'];
$password = $_POST['password'];

// Prepare and execute the login query
$stmt = $conn->prepare("SELECT * FROM parents WHERE id = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Login successful
    $row = $result->fetch_assoc();
    $userId = $row['id'];
    $username = $row['username'];
    // Add additional logic or return data as needed
    echo "Login successful!";
} else {
    // Login failed
    echo "Login failed!";
}

$stmt->close();
$conn->close();
?>
