<?php
session_start();
$idu = $_SESSION["log"];
if(!isset($_SESSION["log"])){
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
      <title>Résultats</title>
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
    <br>
    <center>
        <div id="Titre">
            <h1>RESULTAT</h1>
        </div>
    </center>
    <div id="resultat">
        <?php
            

            $id = mysqli_connect("172.20.111.124","abass", "abass", "autoecole");
        // print_r($_POST);
            echo "<hr>";
            $note = 0;
            $i =1;
            foreach($_POST as $question=>$reponse)
            {
                if($question!="bout"){
                    echo "<h3>Pour la question $i :</h3>";
                    $req = "select * from reponses where idr = $reponse and verite=1";
                    $res = mysqli_query($id, $req);
                    $req2 = "select * from questions where idq = $question";
                    $res2 = mysqli_query($id,$req2);
                    $ligne2 = mysqli_fetch_assoc($res2);
                    if(mysqli_num_rows($res)>0)
                    {
                        echo "<h4 style='color:green;'>Bien joué!! </h4>"."<br>";
                        $note += 2; 
                    }else{
                        echo "<h4 style='color: red;'>Aie raté!!</h4>";
                        $req3 = "select * from reponses where idq=$question and verite=1";
                        $res3 = mysqli_query($id,$req3);
                        $ligne3 = mysqli_fetch_assoc($res3);
                        echo "<h4>Il fallait répondre : ".$ligne3["libeller"]."</h4><br>";
                    }
                }
                $i++;

            }

            echo "<br><h3>Vous avez eu $note / 20 à ce test....</h3><br>";
            $req = "insert into resultats (idu,note,date_ex)
                        values ('$idu','$note',now())";
            mysqli_query($id,$req);

        ?>
    </div>
</body>
</html>