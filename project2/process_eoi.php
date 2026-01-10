<?php require_once 'settings.php';
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: apply.php");
    exit();
}

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Database connection failed");
}


// header('Location: index.php');
// makes eoi table 
$query = "CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    jobref VARCHAR(20) NOT NULL,
    fname VARCHAR(20) NOT NULL,
    lname VARCHAR(20) NOT NULL,
    dob VARCHAR(10) NOT NULL,
    gender ENUM('Male','Female','Other') NOT NULL,
    phone VARCHAR(8) NOT NULL,
    email VARCHAR(40) NOT NULL,
    street VARCHAR(40) NOT NULL,
    suburb VARCHAR(40) NOT NULL,
    addressZone INT(2) NOT NULL,
    city ENUM('Doha', 'Al Wakra', 'Al Khor', 'Dukhan', 'Al Shamal', 'Mesaieed', 'Ras Laffan') NOT NULL,
    skill1 VARCHAR(30),
    skill2 VARCHAR(30),
    skill3 VARCHAR(30),
    skill4 VARCHAR(30),
    otherSkills VARCHAR(500),
    eoiStatus ENUM('New', 'Current', 'Final') NOT NULL
);";


// echo $result; <- nevermind, was using this for testing

if ($result) 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
  // get and sanitize the input. originally i was using htmlchar but that doesnt deal with sql injection
  $jobref = mysqli_real_escape_string($conn, clean_input ($_POST['jobref']));
  $email = mysqli_real_escape_string($conn, clean_input ($_POST['email']));
  $fname = mysqli_real_escape_string($conn, clean_input ($_POST['fname']));
  $lname = mysqli_real_escape_string($conn, clean_input ($_POST['lname']));
  $dob = mysqli_real_escape_string($conn, clean_input ($_POST['dob']));
  $gender = mysqli_real_escape_string($conn, clean_input($_POST['gender'] ?? ''));
  $phone = mysqli_real_escape_string($conn, clean_input ($_POST['phone']));
  $addressZone = mysqli_real_escape_string($conn, clean_input ($_POST['zone']));
  $street = mysqli_real_escape_string($conn, clean_input ($_POST['street']));
  $suburb = mysqli_real_escape_string($conn, clean_input ($_POST['suburb']));
  $city = mysqli_real_escape_string($conn, clean_input ($_POST['city']));
  $errors = [];
  $validCities = ['Doha','Al Wakra','Al Khor','Dukhan','Al Shamal','Mesaieed','Ras Laffan'];
if (!in_array($city, $validCities)) {
    $errors[] = "Invalid city selected.";
}
$skills = $_POST['category'] ?? [];
$skill1 = in_array('linux', $skills) ? 'Linux' : '';
$skill2 = in_array('netpluscert', $skills) ? 'Networkpluscert' : '';
$skill3 = in_array('bachelors', $skills) ? 'Bachelors' : '';
$skill4 = in_array('Java', $skills) ? 'Java' : '';

$otherSkills = mysqli_real_escape_string(
    $conn,
    clean_input($_POST['otherskills'] ?? '')
);
if (empty($gender)) {
    $errors[] = "Gender is required.";
}

if (empty($jobref)) $errors[] = "Job reference number is required.";

if (!preg_match("/^[A-Za-z]{1,20}$/", $fname))
    $errors[] = "First name must be alphabetic and max 20 characters.";

if (!preg_match("/^[A-Za-z]{1,20}$/", $lname))
    $errors[] = "Last name must be alphabetic and max 20 characters.";

if (!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $dob))
    $errors[] = "Date of birth must be in dd/mm/yyyy format.";

if (!preg_match("/^[0-9]{8}$/", $phone))
    $errors[] = "Phone number must be exactly 8 digits.";

if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    $errors[] = "Invalid email address.";

if (empty($street) || strlen($street) > 40)
    $errors[] = "Street address is required (max 40 characters).";

if (empty($suburb) || strlen($suburb) > 40)
    $errors[] = "Suburb is required (max 40 characters).";

if (!preg_match("/^[0-9]{2}$/", $addressZone))
    $errors[] = "Zone must be a two-digit number.";

if (!empty($errors)) {
    echo "<h2>Application Error</h2>";
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    echo "<a href='apply.php'>Return to Application Form</a>";
    mysqli_close($conn);
    exit();
}

  $query2 = "
  INSERT INTO eoi
  (jobref, fname, lname, dob, phone, email, street, suburb, addressZone, city,
   skill1, skill2, skill3, skill4, otherSkills, eoiStatus)
  VALUES
  ('$jobref', '$fname', '$lname', '$dob', '$gender', '$phone', '$email',
   '$street', '$suburb', '$addressZone', '$city',
   '$skill1', '$skill2', '$skill3', '$skill4', '$otherSkills', 'New')
  ";

if (mysqli_query($conn, $query2)) {
$eoiNumber = mysqli_insert_id($conn);
echo "<h2>Application Submitted Successfully</h2>";
echo "<p>Your Expression of Interest number is <strong>$eoiNumber</strong></p>";
} else {
echo "<p>Error submitting application.</p>";
}
mysqli_close($conn);
?>