<?php
session_start();
if(!isset($_SESSION["log"])){
    header("location:connect.php");
}
$id = mysqli_connect("172.20.111.124","abass", "abass", "autoecole");//connexion au serveur mysql
            mysqli_query($id,"SET NAMES 'utf8'");

    if(isset($_POST["inscrire"])){
        $type=$_POST["type"];
        $marque=$_POST["marque"];
        $modele=$_POST["modele"];
        $transmission=$_POST["transmission"];
        $immatriculation=$_POST["immatriculation"];
        $etat=$_POST["etat"];
        

        $requete = "insert into vehicule(type, marque, modele, transmission,immatriculation, etat)
                    VALUES ('$type','$marque','$modele','$transmission','$immatriculation','$etat')";
        mysqli_query($id, $requete);
        
        echo "<h3>Ajout effectuée</h3>";
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
      <title>Ajout Vehicule</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="Abass Diene">
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
    <a href="index.php"><img src="images/logo3.png" alt="#"></a>
        <div id="service">
            <a href="administrateur.php"style="padding-left: 5px; margin-top: 12px; margin-right : 30px;">Accueil</a>
            <a href="inscrip.php"style="margin-top: 12px; margin-right: 30px;">Compte</a>
            <a href="vehicule.php"style="margin-top: 12px; margin-right: 30px;">Véhicule</a>
            <a href="deconnexion.php"style="padding-left: 7px; margin-top:12px; margin-right: 30px;">Deconnexion</a>
        </div>
    </div>
    <br><br>
    &nbsp;
    <h1>Ajout d'un nouveau véhicule</h1>
    <br>
    <form action="" method="post">
        &nbsp; Type <select name="type">
            <option >Voiture</option>
            <option >Moto</option>
        </select><br><br>
        &nbsp; Marque <input type="text" name="marque" placeholder="" required><br><br>
        &nbsp; Modèle <input type="text" name="modele" placeholder="" required><br><br>
        &nbsp; Transmission <select name="transmission" >
            <option >Manuelle</option>
            <option >Automatique</option>
        </select><br><br>
        &nbsp; Immatriculation <input type="text" name="immatriculation" placeholder="" required><br><br>
        &nbsp; Etat <select name="etat" >
            <option >Disponible</option>
            <option >En attente</option>
        </select><br><br>
        
        &nbsp;<input type="submit" value="AJOUTER" name="inscrire">
    </form>
</body>
</html>