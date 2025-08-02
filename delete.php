<?php
include("connection.php");
session_start();

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Delete associated records from the leaderboard table
    $delete_leaderboard = "DELETE FROM leaderboard WHERE userr_id = '$user_id'";
    $result_leaderboard = $conn->query($delete_leaderboard);

    if ($result_leaderboard !== false || $conn->affected_rows == 0) {
        // Now attempt to delete from user_details after deleting related records
        $delete_user_details = "DELETE FROM user_details WHERE user_id = '$user_id'";
        $result_user_details = $conn->query($delete_user_details);

        if ($result_user_details !== false) {
echo '<script type="text/javascript">';
echo 'alert("Deleted successfully!");';
echo 'setTimeout(function(){window.location.href="index.html";}, 200);';
echo '</script>'; 
            exit();
        } else {
            echo "Account deletion failed: " . $conn->error;
        }
    } else {
        echo "Deleting related records failed: " . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    echo "User not logged in."; 
}
?>
