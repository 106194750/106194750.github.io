<!DOCTYPE html>
<html lang="en">
    <head>
         <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta charset="utf-8">
        <meta name="description" content="form for job applications for HAZ Web Design"> 
        <meta name="keywords" content="vacancies, jobs, applications">
        <meta name="author" content="hana ouaida"> 
        <title>Vacancies and Job Applications</title>
       <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
<?php include 'nav.inc'; ?>

                

        <article>
            
            <h1>Apply for a position at HAZ Web Design</h1>
    
            <form method="post" novalidate="novalidate" action="process_eoi.php">
            <p>
                <label for="jobref">Job Reference Number</label>
                <select name="jobref" id="jobref" required>
                    <option value="">Please select</option>
                    <option value="BD609">BD609</option>
                    <option value="NA942">NA942</option>
                </select>
            </p>
            <div class="flexb" id="formflex">
            <fieldset>
                <legend>Personal Information</legend>
                <p><label for="fname">First Name</label> 
                    <input type="text" name= "fname" id="fname" pattern="^[A-Za-z]{0,20}$" required>
                </p>
                <p><label for="lname">Last Name</label>
                    <input type="text" name= "lname" id="lname" pattern="^[A-Za-z]{0,20}$" required>
                </p>
                <p>
                    <label for="dob">Date of birth</label>
                    <input type="text" name="dob" id="dob" placeholder="dd/mm/yyyy" pattern="^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" required>
                </p>
                </fieldset>
                <fieldset>
                 <legend>Gender</legend>
                 <input type="radio" name="gender" value="Male" required> Male
                 <input type="radio" name="gender" value="Female"> Female
                 <input type="radio" name="gender" value="Other"> Other
                 </fieldset>

                <fieldset>
                    <legend>Address</legend>
                <p><label for="city">City</label>
                   <select name="city" id="city" required>
                   <option value="">Please select</option>
                   <option value="Doha">Doha</option>
                   <option value="Al Wakra">Al Wakra</option>
                <option value="Al Khor">Al Khor</option>
                 <option value="Dukhan">Dukhan</option>
                 <option value="Al Shamal">Al Shamal</option>
                 <option value="Mesaieed">Mesaieed</option>
                  <option value="Ras Laffan">Ras Laffan</option>
                </select>
                </p>
                <p><label for="zone">Zone</label> 
                    <input type="text" name= "zone" id="zone" pattern="^[0-9]{0,2}$" required>
                </p>
                <p><label for="street">Street</label> 
                    <input type="text" name= "street" id="street" required>
                </p>
                <p><label for="suburb">Suburb</label> 
                    <input type="text" name= "suburb" id="suburb" required>
                </p>
                </fieldset>
                <fieldset>
                    <legend>Contact Information</legend>
                <p><label for="email">Email Address</label> 
                    <input type="text" name= "email" id="email" pattern="^\w+@\w+\.\w+.$" required>
                </p>
                <p><label for="phone">Phone Number</label> 
                    <input type="text" name= "phone" id="phone" pattern="^[0-9 ]{8,12}$" required>
                </p>
                </fieldset>
                <fieldset>
                    <legend>Technical Skills</legend>
                    <p>
                        <input type="checkbox" id="linux" name="category[]" value="linux" checked="checked">                       
                        <label for="linux">Familiarity with Linux servers</label> 
                    </p>
                    <p>
                        <input type="checkbox" id="netpluscert" name="category[]" value="netpluscert">
                        <label for="netpluscert">Network+ Certification</label>
                    </p>
                    <p>
                        <input type="checkbox" id="bachelors" name="category[]" value="bachelors">
                        <label for="bachelors">Bachelor's degree in Computer Science</label>
                    </p>
                    <p>
                        <input type="checkbox" id="Java" name="category[]" value="Java">
                        <label for="Java">Proficient in Java</label>
                    </p>
                    <p>
                        <label for="otherskills">Other Skills</label> <br>
                        <textarea id="otherskills" name="otherskills" rows="4" cols="40" placeholder="If you have other skills, let us know here..."></textarea>
                    </p>
            
                    </fieldset>
                    </div>
            <input type= "submit" value="Apply">
            <input type= "reset" value="Reset Form">
        </form>
        </article>
<?php include 'footer.inc'; ?>

    </body>

</html>