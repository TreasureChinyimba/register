<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "register";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fullName = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    
    
    // Insert data into the database
    $sql = "INSERT INTO users (name, email, age)
            VALUES ('$fullName', '$email', '$age')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Redirect back to the form page
    header("Location: index.html");
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn->close();
?>
