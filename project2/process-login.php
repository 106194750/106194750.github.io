<?php
session_start();
require_once("settings.php");

// fails if username is null
if (empty($_POST["username"])) {
    die("Please enter username.");
}

// fails if password is null
if (empty($_POST["password"])) {
    die("A password is required.");}

$input_username = $_POST['username'];
$input_password = $_POST['password'];

// check credentials with prepared statement - see week 11 for more...
$stmt = $conn->prepare("SELECT username, passwordhash FROM managers WHERE username = ?");
$stmt->bind_param("s", $input_username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    if (password_verify($input_password, $user["passwordhash"])) {
        $_SESSION['username'] = $user['username'];
        header("Location: manage.php");
        exit();
    } else {
        echo "Incorrect username or password, please try again.";
    }
} else {
    echo "Incorrect username or password, please try again.";
}
?>