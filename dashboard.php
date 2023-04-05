<?php
// start the session
session_start();

// redirect to the login page if the user is not logged in
if (!isset($_SESSION["username"])) {
  header("Location: login.php");
}

// display the dashboard content
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
  </head>
  <body>
    <h1>Welcome, <?php echo $_SESSION["username"]; ?></h1>
    <p>This is the dashboard.</p>
    <a href="logout.php">Logout</a>
  </body>
</html>
