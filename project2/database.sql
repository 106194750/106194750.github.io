USE haz

CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    jobref VARCHAR(20) NOT NULL,
    fname VARCHAR(20) NOT NULL,
    lname VARCHAR(20) NOT NULL,
    dob VARCHAR(10) NOT NULL,
    phone INT(8) NOT NULL,
    email VARCHAR(40) NOT NULL,
    skill1 VARCHAR(30) NOT NULL,
    skill2 VARCHAR(30) NOT NULL,
    skill3 VARCHAR(30) NOT NULL,
    skill4 VARCHAR(30) NOT NULL,
    skill5 VARCHAR(30) NOT NULL,
    otherSkills VARCHAR(500)
    eoiStatus ENUM('New', 'Current', 'Final')
);

CREATE TABLE IF NOT EXISTS address (
    addressID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    street VARCHAR(40) NOT NULL,
    suburb VARCHAR(40) NOT NULL,
    addressZone INT(2) NOT NULL,
    city ENUM('Doha', 'Al Wakra', 'Al Khor', 'Dukhan', 'Al Shamal', 'Mesaieed', 'Ras Laffan') NOT NULL,
    FOREIGN KEY (EOInumber)  REFERENCES eoi(EOInumber)
);

    CREATE TABLE jobs (
id INT AUTO_INCREMENT PRIMARY KEY,
Job_title VARCHAR(100) NOT NULL,
Job_description TEXT NOT NULL,
Reference_Number VARCHAR (5) NOT NULL,
Salary_Range VARCHAR (100) NOT NULL,
Reports_to VARCHAR (100) NOT NULL,
Key_Responsibilities TEXT NOT NULL,
Essential_Qualifications TEXT NOT NULL,
Preferred_Skills TEXT NOT NULL,
Programming_Languages TEXT);



INSERT INTO jobs
(Job_title, Job_description, Reference_Number, Salary_Range, Reports_to,
 Key_Responsibilities, Essential_Qualifications, Preferred_Skills, Programming_Languages)
VALUES
('Network Administrator',
 'An IT professional who can ensure the company''s network is stable and secure while also providing technical support.',
 'NA942',
 '$3000-$5000',
 'Senior IT Manager',
 'Monitor network performance; Troubleshoot connectivity; Manage firewalls and VPNs; Ensure network security',
 'Bachelor degree in IT; 3 years experience; CompTIA certification; Cloud networking knowledge',
 'Problem solving; Time management; Critical thinking',
 NULL),

('Back-end Developer',
 'A software developer who can build server-side logic and maintain databases.',
 'BD609',
 '$4000-$6300',
 'Lead Software Engineer',
 'Manage databases; Test and debug systems; Build server-side logic; Maintain APIs',
 'Bachelor degree in CS; 3 years experience; Database knowledge; Server management',
 'Problem solving; Communication; Attention to detail',
 'Java; SQL; Python');

