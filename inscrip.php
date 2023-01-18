<?php
session_start();
if(!isset($_SESSION["log"])){
    header("location:connect.php");
}
$id = mysqli_connect("172.20.111.124","abass", "abass", "autoecole");//connexion au serveur mysql
            mysqli_query($id,"SET NAMES 'utf8'");

    if(isset($_POST["inscrire"])){

        $nomM=$_POST["nomM"];
        $prenomM=$_POST["prenomM"];
        $telM=$_POST["telM"];
        $mailM=$_POST["mailM"];
        $mdp=$_POST["mdp"];
        $date_embauche=$_POST["date_embauche"];

        $requete = "INSERT INTO moniteur(nomM, prenomM, telM, mailM, mdp, date_embauche)
                    VALUES ('$nomM','$prenomM','$telM','$mailM','$mdp','$date_embauche')";
        $reponse = mysqli_query($id, $requete);
        $ligne = mysqli_fetch_assoc($reponse);
        echo "<h3>Inscription effectuée</h3>";
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
      <title>Inscription Moniteur</title>
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
    <h1>Inscription Moniteur</h1>
    <br>
    <form action="" method="post">
        &nbsp; Nom <input type="text" name="nomM" placeholder="" required><br><br>
        &nbsp; Prenom <input type="text" name="prenomM" placeholder="" required><br><br>
        &nbsp; Telephone <input type="tel" name="telM" placeholder="" required><br><br>
        &nbsp; Mail <input type="email" name="mailM" placeholder="" required><br><br>
        &nbsp; Mot de passe <input type="password" name="mdp" placeholder="" required><br><br>
        &nbsp; Date d'embauche <input type="date" name="date_embauche" placeholder="" required><br><br>
        <input type="submit" value="INSCRIRE" name="inscrire">
    </form>
</body>
</html>