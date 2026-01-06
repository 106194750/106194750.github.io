<?php require_once 'settings.php';
// header('Location: index.php');
// makes eoi table 
$query = "CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    jobref VARCHAR(20) NOT NULL,
    fname VARCHAR(20) NOT NULL,
    lname VARCHAR(20) NOT NULL,
    dob VARCHAR(10) NOT NULL,
    phone VARCHAR(8) NOT NULL,
    email VARCHAR(40) NOT NULL,
    street VARCHAR(40) NOT NULL,
    suburb VARCHAR(40) NOT NULL,
    addressZone INT(2) NOT NULL,
    city ENUM('Doha', 'Al Wakra', 'Al Khor', 'Dukhan', 'Al Shamal', 'Mesaieed', 'Ras Laffan') NOT NULL,
    skill1 VARCHAR(30) NOT NULL,
    skill2 VARCHAR(30) NOT NULL,
    skill3 VARCHAR(30) NOT NULL,
    skill4 VARCHAR(30) NOT NULL,
    otherSkills VARCHAR(500),
    eoiStatus ENUM('New', 'Current', 'Final') NOT NULL
);";

$result = mysqli_query($conn, $query);
// echo $result; <- nevermind, was using this for testing

if (mysqli_num_rows($result) > 0) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // get and sanitize the input. originally i was using htmlchar but that doesnt deal with sql injection
  $jobref = mysqli_real_escape_string($conn, $_POST['jobref']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $addressZone = mysqli_real_escape_string($conn, $_POST['zone']);
  $street = mysqli_real_escape_string($conn, $_POST['street']);
  $suburb = mysqli_real_escape_string($conn, $_POST['suburb']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $skill1 = mysqli_real_escape_string($conn, $_POST['linux']);
  $skill2 = mysqli_real_escape_string($conn, $_POST['netpluscert']);
  $skill3 = mysqli_real_escape_string($conn, $_POST['bachelors']);
  $skill4 = mysqli_real_escape_string($conn, $_POST['Java']);
  $otherSkills = mysqli_real_escape_string($conn, $_POST['otherskills']);

  $query2 = "
  INSERT INTO eoi
  (jobref, fname, lname, dob, phone, email, street, suburb, addressZone, city,
   skill1, skill2, skill3, skill4, otherSkills, eoiStatus)
  VALUES
  ('$jobref', '$fname', '$lname', '$dob', '$phone', '$email',
   '$street', '$suburb', '$addressZone', '$city',
   '$skill1', '$skill2', '$skill3', '$skill4', '$otherSkills', 'New')
  ";

  mysqli_query($conn, $query2);
};
};
?>