<?php
include_once "$racine/modele/bd.resto.php";
include_once "$racine/modele/bd.photo.php";
include_once "$racine/modele/bd.typecuisine.php";


$lesRestos = getLesRestos();



$titre = "Mon compte";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueMonCompte.php";
include "$racine/vue/pied.html.php";
?>