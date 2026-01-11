<!DOCTYPE html>
<html lang="en">
    <head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta charset="UTF-8">
<title>About Us</title>
<link rel="stylesheet" href="styles/styles.css">

</head>
<body>
<?php include 'nav.inc'; ?>
<article>
    <h1>About Us</h1> 
    <section>    <figure>
        <img src="images/pic.jpeg" alt="HAZ Group Photo">
        <figcaption>Our Team - HAZ Web Designs</figcaption>
    </figure></section>

    <section id="id">
            <h2>Our Group HAZ Skillz</h2>
<ol >
    <li>Hana Ouaida</li>
    <ul><li>ID 106194750</li></ul>
    <li>Asma Hossain</li>
    <ul><li>ID 106196099</li></ul>
    <li>Zahra Hossain</li>
    <ul><li>ID 106232278</li></ul>
</ol>
    </section>
    
<section>
    <h2>Contributions</h2>
    <dl>
    <dt>Hana Ouaida</dt>    
    <dd>Wrote the HTML for apply.html and about.html, created reusable PHP includes for the menu and footer, designed the general CSS, built a manager registration page with server-side validation enforcing unique usernames and password rules, stored manager data in a database table, and implemented login control for manage.php to restrict access based on username and password.</dd>
    <dt>Asma Hossain</dt>
    <dd>Wrote the manage.php, implemented features to list all EOIs, list EOIs by job reference number, list EOIs by applicant name, delete EOIs by job reference number, change the status of an EOI, updated the CSS for accessibility, modified the about.html page, and added the ability for the manager to select the field to sort EOI records.</dd>
    <dt>Zahra Ahmad</dt>
    <dd>Wrote the settings.php, implemented data sanitization, server-side validation, and prevented direct URL access, created an error page for invalid responses in apply.php, edited apply.php to work with process_eoi.php,  wrote the HTML for jobs.html, and styled the form in apply.html using CSS.</dd>
</dl>

</section>

<section class="tab"><table>
    
    <caption>Our Interests</caption>
    <tr>
        <th>Name</th>
        <th>Country of origin</th>
        <th>Favourite song</th>
        <th>Favourite book</th>
        <th colspan="3">Interests</th>
    </tr>
    <tr>
        <td>Hana Ouaida</td>
        <td>Lebanon</td>
        <td>No Release by Micheal Bowman</td>
        <td>Never Let Me Go by Kazuo Ishiguro</td>
        <td>Scifi</td>
        <td>Crochet</td>
        <td>Linux</td>
    </tr>
    <tr>
        <td>Asma Hossain</td>
        <td>Bangladesh</td>
        <td>Banana by the Minions</td>
        <td>1Q48 Haruki Murakami</td>
        <td>Reading</td>
        <td>Table tennis</td>
        <td>Formula 1</td>
    </tr>
    <tr>
        <td>Zahra Ahmad</td>
        <td>Pakistan</td>
        <td>Sweater Weather by The Neighborhood </td>
        <td>Cinder Marissa Meyer</td>
        <td>Astronomy</td>
        <td>Writing</td>
        <td>Video games</td>
    </tr>
</table></section>

</article>
<?php include 'footer.inc'; ?>
</body>

</html>
