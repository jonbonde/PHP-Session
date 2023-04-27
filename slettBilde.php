<?php
include("start.php");
?>

<article>
    <h2>Slett ett bilde</h2>
    <form method="post" id="slettBilde" name="slettBilde">
        Bilde: <select name="bilde" id="bilde">
        <?php print("<option value='' disabled selected>Velg bilde</option>");
        include("sjekk.php"); listeboksBilde(); ?>
        </select> <br>
        <input type="submit" value="Velg bilde" id="velgBilde" name="velgBilde">
    </form>
</article>

<?php
if (isset($_POST["velgBilde"]))
{
    $bilde = $_POST["bilde"];

    if (!$bilde)
    {
        print("<article>Det er ikke valgt noe bilde</article>");
    }
    else
    {
        include("db-tilkobling.php");

        $sqlSetning = "DELETE FROM bilde WHERE filnavn='$bilde';";
        mysqli_query($db, $sqlSetning) or die ("<article>Ikke mulig å slette fra databasen</article>");

        print("<article>Du har slettet $bilde</article>");
        unlink("bilder/$bilde");
    }
}
?>