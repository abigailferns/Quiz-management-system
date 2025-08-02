<?php
include("connection.php");
session_start();
if(isset($_POST['Submit'])){
// getting and storing inputs in varaibles
    $ans1 = $_POST["opt1"];
    $ans2 = $_POST["opt2"];
    $ans3 = $_POST["opt3"];
    $ans4 = $_POST["opt4"];
    $ans5 = $_POST["opt5"];
    $ans6 = $_POST["opt6"];
    $ans7 = $_POST["opt7"];
    $ans8 = $_POST["opt8"];
    //compare answers with actual answers stored in variables
    $count = 0;
    if($ans1=="a"){
        $count++;
    }
    if($ans2=="c")
    {
        $count++;
    }
    if($ans3=="b")
    {
        $count++;
    }
    if($ans4=="c"){
        $count++;
    }
    if($ans5=="a")
    {
        $count++;
    }
    if($ans6=="b"){
        $count++;
    }    
    if($ans7=="c"){
        $count++;
    }
    if($ans8=="c"){
        $count++;
    }
    $sql1 = "SELECT userr_id FROM leaderboard WHERE userr_id='{$_SESSION['user_id']}'";
    $result = $conn->query($sql1);
   if ($result->num_rows == 1) {
        $sql = "UPDATE leaderboard SET score=$count WHERE userr_id = '{$_SESSION['user_id']}'";
   }
    else {
        $sql = "INSERT INTO leaderboard VALUES ('{$_SESSION['user_id']}','$count')";
        // After the quiz is completed and the score is calculated
// Store the score in a session variable
//$_SESSION['user_score'] = $userScore; // Replace $userScore with the actual score value

    }
    //echo "SQL Statement: " . $sql;
    if ($conn->query($sql) == TRUE) {
        //echo "Score submitted";
        header("location:score.php"); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 
}
?>
