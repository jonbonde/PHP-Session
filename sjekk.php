<?php
function sjekkBruker($brukernavn, $passord)
{
    include("db-tilkobling.php");

    $lovligbruker = true;

    $sqlSetning="SELECT * FROM bruker WHERE brukernavn='$brukernavn';";
    $sqlResultat=mysqli_query($db,$sqlSetning);

    if (!$sqlResultat)
    {
        $lovligbruker = false;
    }
    else
    {
        $rad=mysqli_fetch_array($sqlResultat);
        $lagretPassord=$rad["passord"];

        if($passord!=$lagretPassord)
        {
            $lovligbruker=false;
        }
    }

    return $lovligbruker;
}

function listeboksBilde()
{
    include("db-tilkobling.php");

    $sqlSetning = "SELECT * FROM bilde ORDER BY filnavn;";
    $sqlResultat = mysqli_query($db, $sqlSetning) or die ("<article>Ikke mulig å hente data fra databasen</article>");

    $antallRader = mysqli_num_rows($sqlResultat);

    for ($i = 0; $i < $antallRader; $i++)
    {
        $rad = mysqli_fetch_array($sqlResultat);
        $filnavn = $rad["filnavn"];

        print("<option value='$filnavn'>$filnavn</option>");
    }
}
?>