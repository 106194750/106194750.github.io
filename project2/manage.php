<?php
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
  <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<h1>Manage EOIs</h1>

<!-- 1. List all EOIs -->
<form method="post">
  <input type="hidden" name="action" value="list_all">
  <button type="submit">List all EOIs</button>
</form>

 <article class="flexb">
<!-- 2. List EOIs by Job Reference Number -->
<form method="post">
  <input type="hidden" name="action" value="list_job">
  Job Reference Number:
  <input type="text" name="jobref">
  <button type="submit">Search</button>
</form>



<!-- 3. List EOIs by Applicant Name -->
<form method="post">
  <input type="hidden" name="action" value="list_name">
  First Name:
  <input type="text" name="firstname">
  Last Name:
  <input type="text" name="lastname">
  <button type="submit">Search</button>
</form>



<!-- 4. Delete EOIs by Job Reference Number -->
<form method="post">
  <input type="hidden" name="action" value="delete_job">
  Job Reference Number:
  <input type="text" name="jobref">
  <button type="submit">Delete</button>
</form>



<!-- 5. Change EOI Status -->
<form method="post">
  <input type="hidden" name="action" value="change_status">
  EOI ID:
  <input type="text" name="eoi_id">

  Status:
  <select name="status">
    <option value="New">New</option>
    <option value="Current">Current</option>
    <option value="Final">Final</option>
  </select>

  <button type="submit">Update</button>
</form>
</article>
<hr>

<?php
// 1. List all EOIs
if ($action == "list_all") {
  $sql = "SELECT * FROM eoi";
  $result = mysqli_query($conn, $sql);
}

// 2. List EOIs by job reference
if ($action == "list_job") {
  $jobref = $_POST["jobref"];
  $sql = "SELECT * FROM eoi WHERE job_ref_number = '$jobref'";
  $result = mysqli_query($conn, $sql);
}

// 3. List EOIs by applicant name
if ($action == "list_name") {
  $fname = $_POST["firstname"];
  $lname = $_POST["lastname"];

  if ($fname != "" && $lname != "") {
    $sql = "SELECT * FROM eoi WHERE first_name = '$fname' AND last_name = '$lname'";
  } else if ($fname != "") {
    $sql = "SELECT * FROM eoi WHERE first_name = '$fname'";
  } else {
    $sql = "SELECT * FROM eoi WHERE last_name = '$lname'";
  }

  $result = mysqli_query($conn, $sql);
}

// 4. Delete EOIs by job reference
if ($action == "delete_job") {
  $jobref = $_POST["jobref"];
  $sql = "DELETE FROM eoi WHERE job_ref_number = '$jobref'";
  mysqli_query($conn, $sql);
  echo "<p>EOIs deleted.</p>";
}

// 5. Change EOI status
if ($action == "change_status") {
  $id = $_POST["eoi_id"];
  $status = $_POST["status"];

  $sql = "UPDATE eoi SET status = '$status' WHERE eoi_id = $id";
  mysqli_query($conn, $sql);
  echo "<p>Status updated.</p>";
}

// Display results
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

</body>
</html>