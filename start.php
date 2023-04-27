<?php
session_start();
$innloggetBruker = $_SESSION["brukernavn"];

if(!$innloggetBruker)
{
    print("<meta http-equiv='refresh' content='0;url=index.php'>");
}
?>

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
    <nav>
        <a href="hoved.php">Hjem</a>
        <a href="registrerBilde.php">Registrer bilde</a>
        <a href="visBilder.php">Vis alle bilder</a>
        <a href="slettBilde.php">Slett bilde</a>
        <a href="loggUt.php">Logg ut</a>
    </nav>
</body>
</html>