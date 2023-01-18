<?php

session_start();
echo "Deconnexion en cours...";
session_destroy();
header("refresh:3; url=index.php");

?>