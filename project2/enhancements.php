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
                <li><a href="#sort">Sorting Records</a></li>    
                <li><a href="#register">Manager Registration</a></li>
                <li><a href="#login">Manager Login</a>- after three invalid attempts, accounts are temporarily locked.</li>
            </ol>
            <div class="flexb">
    <figure id="sort" >
        <img src="images/managesort.png"  class="e" alt="Sorting EOIs">
        <figcaption>Managers are able to sort records on manage.php by various parameters, such as name and reference number.</figcaption>
    </figure>
    <figure id="register" >
        <img src="images/register.png"  class="e" alt="Manager Registration">
        <figcaption>Managers can register accounts through register.php, and their details will be stored in our database.</figcaption>
    </figure>
    <figure id="login">
        <img src="images/plzlogin.png"  class="e" alt="Manager Login">
        <figcaption>Managers can only access the contents of manage.php if they are logged in to their accounts</figcaption>
    </figure>
    </div>
        </article>
<?php include 'footer.inc'; ?>
    </body>
</html>