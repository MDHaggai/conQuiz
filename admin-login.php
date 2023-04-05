<?php
session_start();

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'control');

// Initialize variables
$username = "";
$errors = array(); 

// If the login form is submitted
if (isset($_POST['login_user'])) {
  // Get the submitted username and password
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // Validate that both fields are filled in
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  // If there are no errors, try to log in the user
  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);

    // If the user is found, log them in and redirect to the upload page
    if (mysqli_num_rows($result) == 1) {
      $_SESSION['username'] = $username;
      header('location: upload.php');
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
?>
