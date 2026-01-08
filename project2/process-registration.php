<?php 
require_once("settings.php");

// fails if username is null
if (empty($_POST["username"])) { 
    die("Please enter username.");}
// fails if password is null
if (empty($_POST["password"])) {
    die("A password is required.");}

$query = "CREATE TABLE IF NOT EXISTS managers(managerID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(20) NOT NULL UNIQUE,
    passwordhash VARCHAR(300) NOT NULL);";
$result = mysqli_query($conn, $query);

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Bad request!");}

if ($result) {
    // get and sanitize the input. so theres no sql injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $hashed_pw = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $query2 = "
    INSERT INTO managers
    (username, passwordhash)
    VALUES
    ('$username', '$hashed_pw')
    ";
    mysqli_query($conn, $query2); 
    if (!mysqli_query($conn, $query2)) {
    die("There was an error with inserting to the database: " . mysqli_error($conn));
} else {
    echo "success!";
}
}else {
  echo "Please try again. There was an SQL error.";
};

?>