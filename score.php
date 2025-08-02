<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FactGeo - Leaderboard</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #11819F;
}
.banner {
    background-color: #CEE7F1;
    text-align: center;
    height: 200px;
    
}

.banner img {
    max-width: 400px;
    height: auto;
}
        .congobanner {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-bottom: 20px;
            margin-top:20px;
        }
        .congrats {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-family:'Lucida Handwriting', 'Brush Script MT', cursive;
            font-weight:bold;
        }
        h1 {
            text-align: center;
            color: white;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 12px 15px;
            text-align: left;
        }
        table th {
            background-color: #4CAF50;
            border-bottom: 2px solid #ddd;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f2f2f2;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            background-color: #4CAF50;
            color: black;
            font-weight:bold;
            padding: 10px 20px;
            border-radius: 5px;
            font-size:16px;
        }
    </style>
</head>
<body>
    
    <div class="banner">
            <img src="newlogo.png" alt="FactGeo Logo">
    </div> 
    <?php
    include("connection.php");
    session_start();
    // Assuming the current user's ID and score are available in session variables
    $sql_score = "SELECT score FROM leaderboard WHERE userr_id = '{$_SESSION['user_id']}'";
    $result= $conn->query($sql_score);
    $row = $result->fetch_assoc();
    $currentScore = $row["score"];
    $currentUser = ucfirst($_SESSION['user_id']);

    // Display current user's score in the banner
    echo "<div class='congobanner'>";
    echo "<h1>Congratulations, $currentUser! Your score: $currentScore/8</h1>";
    echo "</div>";
    ?>
   
    <div class="congrats">
        <p>Congratulations on completing the quiz! Check out the leaderboard below:</p>
    </div>
    <h1>Leaderboard</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Score</th>
        </tr>
        <?php
    $sql = "SELECT userr_id, score FROM leaderboard ORDER BY score DESC";
    $result = $conn->query($sql);
if ($result->num_rows > 0){
    //echo "<table><tr><th>user_id</th><th>Score</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo  "<td>" . $row["userr_id"] . "</td>";
        echo  "<td>" . $row["score"] . "</td>";
        echo "</tr>";
    }
    //echo "</table>";
}
else {
    echo "<tr><td colspan='2'>0 results</td></tr>";
}
//header("location:home.php");
?>  
</table>

<div class="try-again-container">
    <a href="menu.html">Return to Home Page</a> 
</div>
</body>
</html>
