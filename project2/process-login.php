<?php
session_start();
require_once("settings.php");

// fails if username is null
if (empty($_POST["username"])) {
    die("Please enter username.");
}

// fails if password is null
if (empty($_POST["password"])) {
    die("A password is required.");
}

$input_username = $_POST['username'];
$input_password = $_POST['password'];

// check credentials with prepared statement
$stmt = $conn->prepare("
    SELECT username, passwordhash, failed_attempts, locked_until
    FROM managers
    WHERE username = ?
");
$stmt->bind_param("s", $input_username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {

    if (!empty($user['locked_until']) &&
        $user['locked_until'] !== '0000-00-00 00:00:00' &&
        strtotime($user['locked_until']) > time()
    ) {
        die("Account locked due to multiple failed login attempts. Please try again later.");
    }

    if (password_verify($input_password, $user["passwordhash"])) {

        $reset = $conn->prepare("
            UPDATE managers
            SET failed_attempts = 0, locked_until = NULL
            WHERE username = ?
        ");
        $reset->bind_param("s", $input_username);
        $reset->execute();

        $_SESSION['username'] = $user['username'];
        header("Location: manage.php");
        exit();

    } else {

        $attempts = $user['failed_attempts'] + 1;

        if ($attempts >= 3) {

            $lock_time = date("Y-m-d H:i:s", strtotime("+15 minutes"));
            $update = $conn->prepare("
                UPDATE managers
                SET failed_attempts = ?, locked_until = ?
                WHERE username = ?
            ");
            $update->bind_param("iss", $attempts, $lock_time, $input_username);
            $update->execute();

            echo "<p>Too many failed login attempts. Account locked for 15 minutes.</p>";
            echo '<p><a href="login.php">Go back to login</a></p>';
            exit();
        } else {
            $update = $conn->prepare("
                UPDATE managers
                SET failed_attempts = ?
                WHERE username = ?
            ");
            $update->bind_param("is", $attempts, $input_username);
            $update->execute();

            echo "<p>Incorrect username or password. Please try again.</p>";
            echo '<p><a href="login.php">Go back to login</a></p>';
        }
    }

} else {
    echo "<p>Incorrect username or password. Please try again.</p>";
    echo '<p><a href="login.php">Go back to login</a></p>';
}
?>