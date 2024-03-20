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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Handle file uploads
    $avatarName = $_FILES["avatar"]["name"];
    $avatarTemp = $_FILES["avatar"]["tmp_name"];
    move_uploaded_file($avatarTemp, "uploads/$avatarName");
    
    $videoName = $_FILES["video"]["name"];
    $videoTemp = $_FILES["video"]["tmp_name"];
    move_uploaded_file($videoTemp, "uploads/$videoName");
    
    // Insert data into the database
    $sql = "INSERT INTO users (fullName, email, message, avatar, video)
            VALUES ('$fullName', '$email', '$message', '$avatarName', '$videoName')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Redirect back to the form page
    header("Location: index.html");
    exit();
}

$conn->close();
?>
