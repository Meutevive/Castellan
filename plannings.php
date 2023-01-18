<?php
session_start();

$_SESSION["log"];

if (!isset($_SESSION["log"])) {
    header("location:connexionm.php");
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
    <title>Compte</title>
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
            <a href="comptem.php" style="padding-left: 5px; margin-top: 12px; margin-right : 30px;">Accueil</a>
            <a href="plannings.php" style="margin-top: 12px; margin-right: 30px;">Planning</a>
            <a href="chats.php" style="margin-top: 12px; margin-right: 30px;">Messagerie</a>
            <a href="deconnexion.php" style="padding-left: 7px; margin-top:12px; margin-right: 30px;">Deconnexion</a>
        </div>
    </div>
    <br><br>
    <div class="calendrier">
        <h1>Agenda</h1>
        <br>
        <table>
            <tr>
                <th> lun. </th>
                <th> mard. </th>
                <th> mer. </th>
                <th> jeu. </th>
                <th> ven. </th>
            </tr>

            <?php
            $id = mysqli_connect("172.20.111.124", "abass", "abass", "autoecole"); //connexion au serveur mysql
            mysqli_query($id, "SET NAMES 'utf8'");

            $requete1 = "select * from planning where MONTH(Date)=MONTH(CURDATE()) and DAYOFWEEK(Date)=2 order by Date";
            $reponse1 = mysqli_query($id, $requete1);

            $requete2 = "select * from planning where MONTH(Date)=MONTH(CURDATE()) and DAYOFWEEK(Date)=3 order by Date";
            $reponse2 = mysqli_query($id, $requete2);

            $requete3 = "select * from planning where MONTH(Date)=MONTH(CURDATE()) and DAYOFWEEK(Date)=4 order by Date";
            $reponse3 = mysqli_query($id, $requete3);

            $requete4 = "select * from planning where MONTH(Date)=MONTH(CURDATE()) and DAYOFWEEK(Date)=5 order by Date";
            $reponse4 = mysqli_query($id, $requete4);

            $requete5 = "select * from planning where MONTH(Date)=MONTH(CURDATE()) and DAYOFWEEK(Date)=6 order by Date";
            $reponse5 = mysqli_query($id, $requete5);
            ?>
            <tr>
                <?php
                while ($ligne1 = mysqli_fetch_assoc($reponse1)) {
                    echo "<td>" .
                        $ligne1["Date"] . "<br>" .
                        $ligne1["titre"] . "</td>";
                }
                ?>

                <?php
                while ($ligne2 = mysqli_fetch_assoc($reponse2)) {
                    echo "<td>" . $ligne2["Date"] . "<br>"
                        . $ligne2["titre"] . "</td>";
                }
                ?>

                <?php
                while ($ligne3 = mysqli_fetch_assoc($reponse3)) {
                    echo "<td>"
                        . $ligne3["Date"] . "<br>"
                        . $ligne3["titre"] . "</td>";
                }
                ?>

                <?php
                while ($ligne4 = mysqli_fetch_assoc($reponse4)) {
                    echo "<td>"
                        . $ligne4["Date"] . "<br>"
                        . $ligne4["titre"] . "</td>";
                }
                ?>

                <?php
                while ($ligne5 = mysqli_fetch_assoc($reponse5)) {
                    echo "<td>"
                        . $ligne5["Date"] . "<br>"
                        . $ligne5["titre"] . "</td>";
                }
                ?>
            </tr>

        </table>

    </div>
</body>

</html>