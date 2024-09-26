<?php
include "$racine/modele/Authentification.php";
logout();   
$titre = "Déconnexion";

include "$racine/vue/entete.html.php";
include "$racine/vue/vueAuthentification.php";
include "$racine/vue/pied.html.php";
