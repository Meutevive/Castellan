<?php
session_start();
$_SESSION["log"];

if(!isset($_SESSION["log"])){
    header("location:connect.php");
}

$id = mysqli_connect("172.20.111.124","abass", "abass", "autoecole");//connexion au serveur mysql
            mysqli_query($id,"SET NAMES 'utf8'");

    if(isset($_POST["ajout"])){
        $date = $_POST["date"];
        $titre = $_POST["titre"];
        $heure_deb = $_POST["heure_deb"];
        $heure_fin = $_POST["heure_fin"];

        $requete = "insert into planning(titre, date, heure_deb, heure_fin)
                    values ('$titre','$date','$heure_deb','$heure_fin')";
        mysqli_query($id, $requete);
        echo "<h3>Ajout effectué</h3>";
        header("refresh:5; url= administrateur.php");
    }

    if(isset($_POST["suppr"])){
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];

        $req = "delete from eleve where nom = '$nom' and prenom = '$prenom' ";
        mysqli_query($id, $req);
        echo "<h3> Compte supprimé </h3>";
        header("refresh:5; url= administrateur.php");
    }
    
    if(isset($_POST["supp"])){
        $nomM = $_POST["nomM"];
        $prenomM = $_POST["prenomM"];

        $rqst = "delete from moniteur where nomM = '$nomM' and prenomM = '$prenomM' ";
        mysqli_query($id, $rqst);
        echo "<h3> Compte supprimé </h3>";
        header("refresh:5; url= administrateur.php");
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
      <!-- -->
      <link href='fullcalendar-5.10.2/lib/main.css' rel='stylesheet' />
     <!-- -->
     <link href='fullcalendar-5.10.2/lib/main.css' rel='stylesheet' />
      <!-- -->
      <script src='fullcalendar-5.10.2/lib/main.js'></script>
      <!-- -->
      <script src='fullcalendar-5.10.2/lib/locales/fr.js'></script>
      <!-- -->
    
        
</head>
<body style="background-color:whitesmoke;">
    <div class="topnav">
    <a href="index.php"><img src="images/logo3.png" alt="#"></a>
        <div id="service">
            <a href="administrateur.php"style="padding-left: 5px; margin-top: 12px; margin-right : 30px;">Accueil</a>
            <a href="inscrip.php"style="margin-top: 12px; margin-right: 30px;">Compte</a>
            <a href="vehicule.php"style="margin-top: 12px; margin-right: 30px;">Véhicule</a>
            <a href="deconnexion.php"style="padding-left: 7px; margin-top:12px; margin-right: 30px;">Deconnexion</a>
        </div>
    </div>
    <br><br>
    <div class="calendrier">
        <h1>Ajouter un événement</h1>
        <br>
        <form action="" method="post">
            &nbsp;
        Date <input type="date" name="date" placeholder="" required> &nbsp;&nbsp;
        Titre <input type="text" name="titre" placeholder="" required>&nbsp;&nbsp;
        Debut <input type="time" name="heure_deb" placeholder="" required>&nbsp;&nbsp;
        Fin <input type="time" name="heure_fin" placeholder="" required>&nbsp;&nbsp;
        <input type="submit" value="AJOUTER" name="ajout">
        </form>
        <br><br>
        <h1>Supprimer un compte Eleve</h1>
        <br>
        <form action="" method="post">
            &nbsp;
            Nom <input type="text" name="nom" placeholder="" required>&nbsp;&nbsp;
            Prénom <input type="text" name="prenom" placeholder="" required>&nbsp;&nbsp;
            <input type="submit" value="SUPPRIMER" name="suppr">
        </form>
        <br><br>
        <h1>Supprimer un compte Moniteur</h1>
        <br>
        <form action="" method="post">
            &nbsp;
            Nom <input type="text" name="nomM" placeholder="" required>&nbsp;&nbsp;
            Prénom <input type="text" name="prenomM" placeholder="" required>&nbsp;&nbsp;
            <input type="submit" value="SUPPRIMER" name="supp">
        </form>
    </div>
</body>
</html>