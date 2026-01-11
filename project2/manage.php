<?php
session_start();
require_once "settings.php";

$action = $_POST["action"] ?? "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Manage EOIs</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <meta charset="utf-8">
  <meta name="description" content="form for managers of our website"> 
  <meta name="keywords" content="login, manages">
  <meta name="author" content="asma hossain"> 
  <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<?php include 'nav.inc'; ?>

<h1>Manage EOIs</h1>
<?php if (isset($_SESSION["username"])):?>

<form method="post"> 
  <input type="hidden" name="action" value="list_all">
  <button type="submit">List all EOIs</button>
</form>

<article class="flexb">

<form method="post">
  <h2>List EOIs by Job Reference Number</h2>
  <input type="hidden" name="action" value="list_job">
  <label for="jobref_list">Job Reference Number:</label>
  <input type="text" name="jobref" id="jobref_list">
  <button type="submit">Search</button>
</form>

<form method="post">
  <h2>List EOIs by Applicant Name</h2>
  <input type="hidden" name="action" value="list_name">
  <label for="firstname">First Name:</label>
  <input type="text" name="firstname" id="firstname">
  <label for="lastname">Last Name:</label>
  <input type="text" name="lastname" id="lastname">
  <button type="submit">Search</button>
</form>


<form method="post">
  <h2>Delete EOIs by Job Reference Number</h2>
  <input type="hidden" name="action" value="delete_job">
  <label for="jobref_delete">Job Reference Number:</label>
  <input type="text" name="jobref" id="jobref_delete">
  <button type="submit">Delete</button>
</form>


<form method="post">
  <h2>Change EOI Status</h2>
  <input type="hidden" name="action" value="change_status">
  <label for="eoi_id">EOI ID:</label>
  <input type="text" name="eoi_id" id="eoi_id">

  <label for="status">Status:</label>
  <select name="status" id="status">
    <option value="New">New</option>
    <option value="Current">Current</option>
    <option value="Final">Final</option>
  </select>

  <button type="submit">Update</button>
</form>
</article>
<?php else:?>
  <article><p>Please<a href="login.php"> log in </a>or  <a href="register.php">register</a></p></article>
<?php
endif;

if ($action == "list_all") {
  $sql = "SELECT * FROM eoi";
  $result = mysqli_query($conn, $sql);
}


if ($action == "list_job") {
  $jobref = $_POST["jobref"];
  $sql = "SELECT * FROM eoi WHERE job_ref_number = '$jobref'";
  $result = mysqli_query($conn, $sql);
}


if ($action == "list_name") {
  $fname = $_POST["firstname"];
  $lname = $_POST["lastname"];

  if ($fname != "" && $lname != "") {
    $sql = "SELECT * FROM eoi WHERE fname = '$fname' AND lname = '$lname'";
  } else if ($fname != "") {
    $sql = "SELECT * FROM eoi WHERE fname = '$fname'";
  } else {
    $sql = "SELECT * FROM eoi WHERE lname = '$lname'";
  }

  $result = mysqli_query($conn, $sql);
}


if ($action == "delete_job") {
  $jobref = $_POST["jobref"];
  $sql = "DELETE FROM eoi WHERE jobref = '$jobref'";
  mysqli_query($conn, $sql);
  echo "<p>EOIs deleted.</p>";
}


if ($action == "change_status") {
  $id = $_POST["eoi_id"];
  $status = $_POST["status"];

  $sql = "UPDATE eoi SET eoiStatus = '$status' WHERE EOInumber = $id";
  mysqli_query($conn, $sql);
  echo "<p>Status updated.</p>";
}


if (isset($result)) {
  echo "<table border='1'>";
  echo "<tr>
          <th>EOI ID</th>
          <th>Job Ref</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Status</th>
        </tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['eoi_id']}</td>";
    echo "<td>{$row['job_ref_number']}</td>";
    echo "<td>{$row['first_name']}</td>";
    echo "<td>{$row['last_name']}</td>";
    echo "<td>{$row['status']}</td>";
    echo "</tr>";
  }

  echo "</table>";
}

mysqli_close($conn);
?>
<?php include 'footer.inc'; ?>

</body>
</html>