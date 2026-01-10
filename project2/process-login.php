<?php
session_start();
require_once("settings.php");

// fails if username is null
if (empty($_POST["username"])) { 
    die("Please enter username.");}
// fails if password is null
if (empty($_POST["password"])) {
    die("A password is required.");}

$input_username = $_POST['username'];
$input_password = $_POST['password'];

// check credentials
$query = "SELECT * FROM managers WHERE username = '$input_username' AND password = '$input_password'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($user) {
  $_SESSION['username'] = $user['username'];

  header("Location: manage.php");
  exit();
} else {
  echo "Incorrect username or password, please try again.";
}
?>