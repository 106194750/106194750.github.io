<!DOCTYPE html>
<html lang="en">
    <head>
         <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta charset="utf-8">
        <meta name="description" content="page detailing enhancements made to our website"> 
        <meta name="keywords" content="enhancements">
        <meta name="author" content="hana ouaida, asma hossain"> 
        <title>Enhancements</title>
       <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
<?php include 'nav.inc'; ?>
        <article>
            <h1>Enhancements</h1>
            <h2>Enhancements we made to our site</h2>
            <ol>
                <li>Sorting Records</li>    
                <li>Manager Registration</li>
                <li>Manager Login</li>
            </ol>
            <div class="flexb">
    <figure>
        <img src="images/managesort.png" alt="Sorting EOIs">
        <figcaption>Managers are able to sort records on manage.php by various parameters, such as name and reference number.</figcaption>
    </figure>
    <figure>
        <img src="images/register.png" alt="Manager Registration">
        <figcaption>Managers can register accounts through register.php, and their details will be stored in our database.</figcaption>
    </figure>
    <figure>
        <img src="images/plzlogin.png" alt="Manager Login">
        <figcaption>Managers can only access the contents of manage.php if they are logged in to their accounts</figcaption>
    </figure>
    </div>
        </article>
<?php include 'footer.inc'; ?>
    </body>
</html>