<?php
// start the session
session_start();

// unset all session variables and destroy the session
session_unset();
session_destroy();

// redirect to the login page
header("Location: login.php");
?>
