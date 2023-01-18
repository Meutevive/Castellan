<?php

   session_start();

      $id = mysqli_connect("172.20.111.124","abass", "abass", "autoecole");
            mysqli_query($id,"SET NAMES 'utf8'");
   
   if(isset ($_POST["submit_bt"]))
      {
         $civilite=$_POST["civilite"];
         $nom=$_POST["nom"];
         $prenom=$_POST["prenom"];
         $adresse=$_POST["adresse"];
         $datenaisse=$_POST["datenaisse"];
         $tel=$_POST["tel"];
         $type_de_permis=$_POST["type_de_permis"];
         $mail=$_POST["mail"];
         $mdp=$_POST["mdp"]; 
            
         $_SESSION["log"]="$prenom";

         $requete = "INSERT INTO eleve(civilite, nom, prenom, adresse, datenaisse, tel, type_de_permis, mail, mdp)
               VALUES ('$civilite','$nom','$prenom','$adresse','$datenaisse', '$tel','$type_de_permis','$mail','$mdp')";
         $reponse = mysqli_query($id,$requete);
         $ligne = mysqli_fetch_assoc($reponse);
               header("location: compte.php");
               
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
      <title>Inscription</title>
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
   </head>

    <body class="main-layout">
      
      <div class="wrapper">
      <div class="sidebar">
         <!-- Sidebar  -->
        <nav id="sidebar">

            <div id="dismiss">
                <i class="fa fa-arrow-left"></i>
            </div>

            <ul class="list-unstyled components">
                
                <li class="active">
                    <a href="index.php">Accueil</a>
                </li>
                <li>
                    <a href="select.php">Mon Compte</a>
                </li>
                <li>
                    <a href="inscription.php">S'inscrire</a>
                </li>
                <li>
                    <a href="index.php#about">Permis de conduire</a>
                </li>
                <li>
                    <a href="index.php#contact">Contact</a>
                </li>
            </ul>

        </nav>
      </div>

      <div id="content">
      <!-- section -->
      <section id="home" class="top_section">
         <div class="row">
            <div class="col-lg-12">
               <!-- header -->
      <header>
         <!-- header inner -->
         <div class="container">
            <div class="row">
               <div class="col-lg-3 logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo"> <a href="index.php"><img src="images/logo3.png" alt="#"></a> </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9">
                  <div class="right_header_info">
                     <ul>
                        <li><img style="margin-right: 15px;" src="images/phone_icon.png" alt="#" /><a href="#">+33 7 53 60 82 46</a></li>
                        <li><img style="margin-right: 15px;" src="images/mail_icon.png" alt="#" /><a href="https://mail.google.com/mail/u/0/#sent?compose=new">castauto@gmail.com</a></li>
                        <li><img src="images/search_icon.png" alt="#" /></li>
                         <li>
                           <button type="button" id="sidebarCollapse">
                              <img src="images/menu_icon.png" alt="#" />
                           </button>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
            <br>
            
            <div class="connexion">
               <h1>INSCRIPTION</h1>
               
               <form action="" method="post">
                  <fieldset class="row">

                        Civilité: <br>
                        <select name="civilite">
                           <option value="Mr">Mr</option>
                           <option value="Mme">Mme</option>
                           <option value="Autre">Autre</option>
                        </select>
                        <div class="full field">
                           <input type="text" name="nom" placeholder="Entrez votre nom: " required>
                        </div>
                        <div class="full field">
                           <input type="text" name="prenom" placeholder="Entrez votre prenom" required>
                        </div>
                        <div class="full field">
                           <input type="text" name="adresse" placeholder="Entrez votre adresse" required>
                        </div>
                        <div class="full field">
                           <input type="date" name="datenaisse" placeholder="Entrez votre date de naissance (ex: AAAA-MM-AA)" required>
                        </div>
                        <div class="full field">
                           <input type="tel" name="tel" placeholder="Entrez votre numero de telephone">
                        </div>
                        Choisir type de permis: <br>
                        <select name="type_de_permis">
                           <option value="permisb">Permis B</option>
                           <option value="permisa1">Permis A1</option>
                           <option value="permisa2">Permis A2</option>
                        </select>
                           <br>
                           
                        <div class="full field">
                           <input type="email" placeholder="Email" name="mail">
                        </div>
                        <div class="full field">
                           <input type="password" placeholder="Mot de passe" name="mdp">
                        </div>
                        <div class="full field">
                           <input type="submit" name="submit_bt" value="S'INSCRIRE">
                        </div>
                  </fieldset>
               </form>
            
            </div>
            <br><br><br>

            <!--------------------------FOOTER----------------------------->
          <footer>
         <div class="container">
           <div class="row">
              <div class="col-md-6">
                <div class="full">
                  <h3>CASTELLANE AUTO</h3>
                </div>
              </div>
              <div class="col-md-6">
                <div class="full">
                   <ul class="social_links">
                      <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                   </ul>
                </div>
              </div>
              <div class="col-md-4">
                 <div class="full">
                    <h4 class="widget_heading">Newsletter</h4>
                 </div>
                 <div class="full subribe_form">
                    <form>
                      <fieldset>
                         <div class="field">
                           <input type="email" name="mail" placeholder="Enter your email" />
                         </div>
                         <div class="field">
                           <button class="submit_bt">Soumettre</button>
                         </div>
                      </fieldset>
                    </form>
                 </div>
              </div>
              <div class="col-md-4">
                 <div class="full">
                   <h4 class="widget_heading">Liens</h4>
                 </div>
                 <div class="full f_menu">
                    <ul>
                       <li><a href="index.php">Accueil</a></li>
                       <li><a href="index.php#about">A Propos</a></li>
                       <li><a href="#">Services</a></li>
                       <li><a href="index.php#testimonial">Temoignages</a></li>
                       <li><a href="index.php#contact">Contact</a></li>
                    </ul>
                 </div>
              </div>
              <div class="col-md-4">
                 <div class="full">
                   <h4 class="widget_heading">Location</h4>
                   <div class="full cont_footer">
                     <p><strong>Adresse</strong><br><br>27 Bd du General-de-Gaulle, 83100 TOULON Cedex<br>+33 7 53 60 82 46<br>castauto@gmail.com</p>
                   </div>
                 </div>
              </div>
           </div>
         </div>
      </footer>
      <!-- end footer -->

      <!-- copyright -->

      <div class="cpy_right">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <p>© 2021 All Rights Reserved.</p>
                     </div>
                  </div>
              </div>
          </div>
      </div>
      </div>
   </div>
</div>
</div>
      <!-- right copyright -->
      <div class="overlay"></div>
      
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <!-- Scrollbar Js Files -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
      </script>

      </body>