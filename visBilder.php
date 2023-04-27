<?php
include("start.php");
?>

<article>
    <h2>Vis alle bilder</h2>
</article>

<?php
include("db-tilkobling.php");

$sqlSetning = "SELECT * FROM bilde ORDER BY bildenr;";
$sqlResultat = mysqli_query($db,$sqlSetning) or die ("<article>Ikke mulig å hente data fra databasen</article>");
$antallRader = mysqli_num_rows($sqlResultat);

echo "<article>";

for ($i = 0; $i<$antallRader; $i++)
{
    $rad = mysqli_fetch_array($sqlResultat);
    $bildenr = $rad["bildenr"];
    $filnavn = $rad["filnavn"];
    echo "<img src=\"bilder/$filnavn\" height=\"500\"><br>";
}

echo "</article>"
?>


