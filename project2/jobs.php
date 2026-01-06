<!DOCTYPE html>
<html lang="en">
    <head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta charset="UTF-8">
<title>Job Descriptions</title>
<link rel="stylesheet" href="styles/styles.css">

</head>
<body>

<?php
require_once "settings.php";
include 'header.inc';
include 'nav.inc';

$query = "SELECT Job_title, Reference_Number, Salary_Range, Reports_to, Key_Responsibilities, Essential_Qualifications, Preferred_Skills, Programming_Languages FROM jobs";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    echo "<h1>Job Openings Description</h1>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<section>";
        echo "<h2>" . $row['Job_title'] . "</h2>";
        echo "<p><strong>Reference Number:</strong> " . $row['Reference_Number'] . "</p>";
        echo "<p><strong>Salary Range:</strong> " . $row['Salary_Range'] . "</p>";
        echo "<p><strong>Reports To:</strong> " . $row['Reports_to'] . "</p>";

        echo "<h3>Key Responsibilities</h3>";
        echo "<p>" . $row['Key_Responsibilities'] . "</p>";

        echo "<h3>Essential Qualifications</h3>";
        echo "<p>" . $row['Essential_Qualifications'] . "</p>";

        echo "<h3>Preferred Skills</h3>";
        echo "<p>" . $row['Preferred_Skills'] . "</p>";

        if (!empty($row['Programming_Languages'])) {
            echo "<h3>Programming Languages</h3>";
            echo "<p>" . $row['Programming_Languages'] . "</p>";
        }

        echo "</section><hr>";
    }

    mysqli_free_result($result);
} else {
    echo "<p>No jobs found.</p>";
}

mysqli_close($conn);
include 'footer.inc';
?>
</body>
</html>