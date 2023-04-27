<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <title>Innlevering 2</title>
    <link rel="stylesheet" href="oblig2.css">
</head>
<body>
    <h1>Innlevering 2</h1>
    <article>
        <h2>Innlogging</h2>
        <form action="" method="post" id="innloggingSkjema" name="innloggingSkjema">
            Brukernavn <input type="text" id="brukernavn" name="brukernavn"> <br>
            Passord <input type="password" id="passord" name="passord"> <br>
            <input type="submit" value="Logg inn" id="logginnKnapp" name="logginnKnapp">
            <input type="reset" value="nullstill">
        </form>
        <p>
            <br>
            Ny bruker?
            <br> 
            <a href="registrerBruker.php">Registrer deg her</a>
        </p>
    </article>
    <?php
        if (isset($_POST["logginnKnapp"]))
        {
            include("sjekk.php");
            
            $brukernavn = $_POST["brukernavn"];
            $passord = $_POST["passord"];

            if (sjekkBruker($brukernavn, md5($passord)) == 0)
            {
                print("<article>Feil brukernavn eller passord</article>");
            }
            else
            {
                session_start();
                $_SESSION["brukernavn"] = $brukernavn;
                print("<meta http-equiv='refresh' content='0;url=hoved.php'>");
            }
        }
    ?>
</body>
</html>