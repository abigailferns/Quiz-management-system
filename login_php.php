<?php
include("connection.php");
session_start();
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $password = $_POST["password"];
    
    // Add your authentication logic here
    $sql = "SELECT * FROM user_details WHERE user_id='$user_id' AND password='$password'";
    $result = $conn->query($sql);
    /* Explanation
    $sql = "SELECT * FROM user WHERE user_id='$user_id' AND password='$password'";: This line constructs a SQL query string that selects all columns from the "user" table where the "user_id" and "password" match the values entered in the login form. Note: Using user input directly in SQL queries can be a security risk. Consider using prepared statements or other methods to prevent SQL injection.
    $result = $conn->query($sql);: This line executes the SQL query using the database connection ($conn) and stores the result in the variable $result.
    */
    //fire query to save entries and check it with if statement
   if ($result->num_rows == 1) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['password'] = $password;
    header("Location: menu.html");
   }
    else {
  header("Location: notlogin.html");
    }
}
?>
