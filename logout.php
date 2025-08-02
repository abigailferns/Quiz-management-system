<?php
// Initialize the session.
session_start();

echo '<script type="text/javascript">';
echo 'alert("You have logged out successfully!");';
echo 'setTimeout(function(){window.location.href="index.html";}, 200);';
echo '</script>'; 

// Unset all of the session variables.
$_SESSION = array();
// If it's desired to kill the session, also delete the session cookie.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
?>
