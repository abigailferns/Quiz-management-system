<?php
include("connection.php");
session_start();

// Retrieve username, password, and email from form
$user_id =  $_POST['user_id'];
$password = $_POST['password'];
$email = $_POST['email'];

// Check if username exists
$sql_check = "SELECT * FROM user_details WHERE user_id='$user_id'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    echo '<script type="text/javascript">';
echo 'alert("Username already exists! Please choose a different username");';
echo 'setTimeout(function(){window.location.href="signin.html";}, 200);';
echo '</script>'; 
} else {
    // Insert new user into the database
    $sql_insert = "INSERT INTO user_details (user_id, email, password) VALUES ('$user_id', '$email', '$password')";
    if ($conn->query($sql_insert) === TRUE) {echo '<script type="text/javascript">';
echo 'alert("Registered successfully!");';
echo 'setTimeout(function(){window.location.href="login.html";}, 200);';
echo '</script>'; 
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

$conn->close();
?>
