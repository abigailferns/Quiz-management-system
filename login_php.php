<?php
include("connection.php");
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "post") {
    $user_id = $_POST["user_id"];
    $email=$_POST["email"];
    $password = $_POST["password"];
    
    //This below line is a code to Send form entries to database
    $sql = "INSERT INTO user_details VALUES ('$user_id', '$email', '$password')";
    
    //fire query to save entries and check it with if statement
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        echo "Message has been sent successfully!";
    }
    else{
        echo "Error, Message didn't send! Something's Wrong."; 
    }
    //connection closed.
    mysqli_close($con);

    // Add your authentication logic here
    $sql = "SELECT * FROM user WHERE user_id='$user_id' AND password='$password'";
    $result = $conn->query($sql);
    /*
    $sql = "SELECT * FROM user WHERE user_id='$user_id' AND password='$password'";: This line constructs a SQL query string that selects all columns from the "user" table where the "user_id" and "password" match the values entered in the login form. Note: Using user input directly in SQL queries can be a security risk. Consider using prepared statements or other methods to prevent SQL injection.
    $result = $conn->query($sql);: This line executes the SQL query using the database connection ($conn) and stores the result in the variable $result.
    */

   if ($result->num_rows == 1) {
    $_SESSION['user_id'] = $user_id;
    //header("Location: quiz.html");
   exit;// Redirect to welcome page on successful login
   }
    else {
        echo "Invalid username or password.";
    }
}
?>
