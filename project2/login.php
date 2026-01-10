<!DOCTYPE html>
<html lang="en">
    <head>
         <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta charset="utf-8">
        <meta name="description" content="form for loggging in as a manager of our website"> 
        <meta name="keywords" content="login, manages">
        <meta name="author" content="hana ouaida"> 
        <title>Manager Registration</title>
       <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
<?php include 'nav.inc'; ?>
        <article>
            <h1>Log in as a manager</h1>
         <form method="post" action="process-login.php">
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type= "submit" value="Submit">
            <input type= "reset" value="Reset Form">
        </form>
        </article>
<?php include 'footer.inc'; ?>

    </body>

</html>