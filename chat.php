<?php
session_start();

$_SESSION["log"];

if(!isset($_SESSION["log"])){
    header("location:connexion.php");
}

$id = mysqli_connect("172.20.111.124","abass", "abass", "autoecole");
 mysqli_query($id,"SET NAMES 'utf8'");
 
    if(isset($_POST["send"]))
    {
        $message = $_POST["message"];
        $_SESSION["log"];

        $requete = "insert into chat (idC, message, date, expediteur)
                    values (null,'$message',now(),'$_SESSION[log]')";
        mysqli_query($id, $requete);
    }
   
            $req= "select * from chat
                    order by idC ";
            $res = mysqli_query($id,$req);
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
            <a href="compte.php"style="padding-left: 5px; margin-top: 12px; margin-right : 30px;">Accueil</a>
            <a href="planning.php"style="margin-top: 12px; margin-right: 30px;">Planning</a>
            <a href="defis.php"style="margin-top: 12px; margin-right: 30px;">Défis Code</a>
            <a href="chat.php"style="margin-top: 12px; margin-right: 30px;">Messagerie</a>
            <a href="deconnexion.php"style="padding-left: 7px; margin-top:12px; margin-right: 30px;">Deconnexion</a>
        </div>
    </div>
    <br><br>
    <center>
    <div id="box">
        <form action="" method="POST">
            <div class="Titre">
                <h1>Conversation</h1>
            </div>
            <div id='Message'><br>
                <div id="prompt">
                    <?php 
                        while($ligne= mysqli_fetch_assoc($res)){
                        echo
                        "<p id='text7' class='chatlog'>".$ligne['expediteur'].": ".$ligne['message']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."-- ".$ligne['date']."</p>";
                            
                        }
                    ?>
                </div><br>
                <input type="text" name="message" id="chatbox" placeholder="Ecrivez votre message" required><br><br>
                <!--<input type="text" name="pseudo" id="chatbox" placeholder="Entrez votre pseudo" required><br><br>-->
                    <br>
                <input type="submit" id="bouton" value="Envoyer" name="send">
            </div>  
        </form>
    </div>
    <br><br>
    </center>
</body>
</html> 