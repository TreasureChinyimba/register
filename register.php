<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Handle file uploads
    $avatarName = $_FILES["avatar"]["name"];
    $avatarTemp = $_FILES["avatar"]["tmp_name"];
    move_uploaded_file($avatarTemp, "uploads/$avatarName");
    
    $videoName = $_FILES["video"]["name"];
    $videoTemp = $_FILES["video"]["tmp_name"];
    move_uploaded_file($videoTemp, "uploads/$videoName");
    
    // Save data to a file or database
    $userData = "$fullName|$email|$message|$avatarName|$videoName\n";
    file_put_contents("registered_users.txt", $userData, FILE_APPEND);
    
    // Redirect back to the form page
    header("Location: index.html");
    exit();
}
?>
