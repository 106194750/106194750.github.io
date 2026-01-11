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

        
        $update = $conn->prepare("
            UPDATE managers
            SET failed_attempts = failed_attempts + 1
            WHERE username = ?
        ");
        $update->bind_param("s", $input_username);
        $update->execute();

        $lock = $conn->prepare("
        UPDATE managers
        SET locked_until = NOW() + INTERVAL 15 MINUTE
        WHERE username = ? AND failed_attempts >= 3
        ");
       $lock->bind_param("s", $input_username);
       $lock->execute();

        $stmt = $conn->prepare("
            SELECT failed_attempts, locked_until
            FROM managers
            WHERE username = ?
        ");
        $stmt->bind_param("s", $input_username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        $lockedUntil = strtotime($user['locked_until'] ?? '');
        if ($lockedUntil && $lockedUntil > time()) {
            echo "<p>Too many failed login attempts. Account locked for 15 minutes.</p>";
            echo '<p><a href="login.php">Go back to login</a></p>';
            exit();
        } else {
            echo "<p>Incorrect username or password. Please try again.</p>";
            echo '<p><a href="login.php">Go back to login</a></p>';
        }
    }

} else {
    echo "<p>Incorrect username or password. Please try again.</p>";
    echo '<p><a href="login.php">Go back to login</a></p>';
}
?>
