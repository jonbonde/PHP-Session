<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innlevering 2</title>
    <link rel="stylesheet" href="oblig2.css">
</head>
<body>
    <h1>Innlevering 2</h1>
    <article>
        <h2>Registrer bruker</h2>
        <form id="registrerBruker" name="registrerBruker" method="post">
            Brukernavn <input type="text" id="brukernavn" name="brukernavn" requred> <br>
            Passord <input type="password" id="passord" name="passord" required> <br>
            <input type="submit" value="Registrer bruker" id="registrerKnapp" name="registrerKnapp">
            <input type="reset">
        </form>
    </article>

    <?php
    if (isset($_POST["registrerKnapp"]))
    {
        include("db-tilkobling.php");

        $brukernavn = $_POST["brukernavn"];
        $passord = md5($_POST["passord"]);

        if (!$brukernavn || !$passord)
        {
            print("<article>Brukernavn og passord må fylles ut");
        }
        else
        {
            $sqlSetning = "INSERT INTO bruker VALUES('$brukernavn', '$passord');";
            mysqli_query($db, $sqlSetning) or die ("<article>Ikke mulig å registrere i databasen</article>");

            print("<article> Du har registrert deg med brukernavnet: $brukernavn </article>");
        }
    }
    ?>
    <article><a href='index.php'>Gå til inloggings siden</a></article>
</body>
</html>