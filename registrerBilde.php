<?php
include("start.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innlevering 2</title>
</head>
<body>
    <article>
        <h2>Registrer bilde</h2>
        <form method="post" id="registrerBilde" name="registrerBilde" enctype="multipart/form-data">
            Bildenummer <input type="number" id="bildenr" name="bildenr" required> <br>
            Beskrivelse <input type="text" id="beskrivelse" name="beskrivelse" required> <br>
            Bilde <input type="file" id="fil" name="fil"> <br>
            <input type="submit" value="Registrer bilde" id="registrerKnapp" name="registrerKnapp">
            <input type="reset" value="Nullstill">
        </form>
    </article>

    <?php
    if(isset($_POST["registrerKnapp"]))
    {
        $bildenr = $_POST["bildenr"];
        $beskrivelse = $_POST["beskrivelse"];

        $filnavn=$_FILES["fil"]["name"];
        $filtype=$_FILES["fil"]["type"];
        $filstorelse=$_FILES["fil"]["size"];
        $tmpnav=$_FILES["fil"]["tmp_name"];
        $nyttnavn="bilder/".$filnavn; 

        if (!$bildenr || !$beskrivelse || !$filnavn)
        {
            print ("<article>Alle felt m&aring; fylles ut og bilde m&aring; velges</article>"); 
        }
        else if ($filtype!="image/gif" && $filtype!="image/jpeg" && $filtype!="image/png" && $filtype!="image/webp")
        {
            print("<article>Det er kun tillatt å laste opp bilder</article>");
        }
        else if ($filstorelse>5000000) 
        {
            print("<article>Bildet er for stort</article>");
        }
        else
        {
            include("db-tilkobling.php"); 

            $sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';";
            $sqlResultat=mysqli_query($db,$sqlSetning) or die ("<article>ikke mulig &aring; hente data fra databasen</article>");
            $antallRader=mysqli_num_rows($sqlResultat); 

            if ($antallRader != 0)
            {
                print("<article>Bildenummeret er brukt fra før</article>");
            }
            else
            {
                move_uploaded_file($tmpnav,$nyttnavn) or die("<article>ikke mulig å laste opp fil</article>");

                $sqlSetning="INSERT INTO bilde VALUES('$bildenr','$filnavn','$beskrivelse');";
                if(mysqli_query($db,$sqlSetning))
                {
                    print("<article>Følgende bilde er nå registrert:<br>Bildenummer: $bildenr<br> Filnavn: $filnavn<br> Beskrivelse: $beskrivelse </article>");
                }
                else
                {
                    print("<article>Ikke mulig å registrere i databasen</article>");
                    unlink($nyttnavn) or die ("<article>ikke mulig å slette</article>");
                }
            }
        }
    }
    ?>
</body>
</html>