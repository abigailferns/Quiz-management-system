<?php
include("connection.php");

// Retrieve username and password from form
$user_id =  $_POST['user_id'];
$password = $_POST['password'];
$email = $_POST['email'];

// Check if username exists

$sql = "SELECT * FROM user WHERE user_id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Username already exists. Please choose a different username.";
} else {
    // Insert new user into the database
    $sql = "INSERT INTO user_details (user_id,email,password) VALUES ('$user_id','$email','$password')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully";
       // header("Location: quiz.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
