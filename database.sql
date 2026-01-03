CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    jobref VARCHAR(20) NOT NULL,
    fname VARCHAR(20) NOT NULL,
    lname VARCHAR(20) NOT NULL,
    phone INT(8) NOT NULL,
    email VARCHAR(40) NOT NULL,
    skill1 VARCHAR(30) NOT NULL,
    skill2 VARCHAR(30) NOT NULL,
    skill3 VARCHAR(30) NOT NULL,
    skill4 VARCHAR(30) NOT NULL,
    skill5 VARCHAR(30) NOT NULL,
    otherSkills VARCHAR(500)
    status ENUM('New', 'Current', 'Final')
);

CREATE TABLE IF NOT EXISTS address (
    addressID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    street VARCHAR(40) NOT NULL,
    suburb VARCHAR(40) NOT NULL,
    addressZone INT(2) NOT NULL,
    city ENUM('Doha', 'Al Wakra', 'Al Khor', 'Dukhan', 'Al Shamal', 'Mesaieed', 'Ras Laffan') NOT NULL,
    postcode INT(10) NOT NULL, 
    FOREIGN KEY (EOInumber)  REFERENCES eoi(EOInumber),
);