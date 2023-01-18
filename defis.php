<?php
session_start();
if (!isset($_SESSION["log"])) {
    header("location:connexion.php");
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Défis Code</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body style="background-color:whitesmoke;">
    <div class="topnav">
        <a href="#"><img src="images/logo3.png" alt="#"></a>
        <div id="service">
            <a href="compte.php" style="padding-left: 5px; margin-top: 12px; margin-right : 30px;">Accueil</a>
            <a href="planning.php" style="margin-top: 12px; margin-right: 30px;">Planning</a>
            <a href="defis.php" style="margin-top: 12px; margin-right: 30px;">Défis Code</a>
            <a href="chat.php" style="margin-top: 12px; margin-right: 30px;">Messagerie</a>
            <a href="deconnexion.php" style="padding-left: 7px; margin-top:12px; margin-right: 30px;">Deconnexion</a>
        </div>
    </div>
    <br>
    <center>
        <div id="Titre">
            <h1>QCM</h1>
        </div>
    </center>
    <div id="qcm">
        <form action="resultats.php" method="post">
            <?php
            $id = mysqli_connect("172.20.111.124", "abass", "abass", "autoecole");
            echo "<hr>";
            $req = "select * from questions order by rand() limit 10";
            $res = mysqli_query($id, $req);
            $i = 1;
            while ($ligne = mysqli_fetch_assoc($res)) {
                echo
                "<img id='codes' src='code/" . $ligne["photos"] . "'alt'image'/>" .
                    "<br>" .
                    "<h3> Question " . $i . "</h3>";
                $i++;
                $idq = $ligne["idq"];

                $req2 = "select * from reponses
                    where idq = $idq";
                $res2 = mysqli_query($id, $req2);
                while ($ligne2 = mysqli_fetch_assoc($res2)) {
                    $idr = $ligne2["idr"];
                    echo "<h4><input type='radio' name='$idq' value='$idr' > " . $ligne2["libeller"] . "</h4>";
                }
            }
            ?>
            <input type="submit" value="Envoyer" name="bout">
            <br><br>

        </form>
    </div>
</body>

</html>