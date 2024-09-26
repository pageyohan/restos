<?php
include_once "$racine/modele/bd.resto.php";
include_once "$racine/modele/bd.photo.php";
include_once "$racine/modele/bd.typecuisine.php";
include_once "$racine/modele/bd.critiquer.php";
include_once "$racine/modele/Authentification.php";
include_once "$racine/modele/bd.aimer.php";



// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"#top","label"=>"Le restaurant");
$menuBurger[] = Array("url"=>"#adresse","label"=>"Adresse");
$menuBurger[] = Array("url"=>"#photos","label"=>"Photos");
$menuBurger[] = Array("url"=>"#horaires","label"=>"Horaires");
$menuBurger[] = Array("url"=>"#crit","label"=>"Critiques");

// recuperation des donnees GET, POST, et SESSION
;

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$lesRestos = getLesRestos();

$detailresto = getLesDetails($_GET["leresto"]);
$mailU = getMailULoggedOn();
$id = $detailresto->idR;
    

if (isset($_GET["aimer"]) ){
    
    addAimer($mailU,$id);
}
if (isset($_GET["pasaimer"]) ){
    delAimer($id,$mailU);
}
if (isset($_GET["supprimer"]) ){
    delCritiquer($id,$mailU);
}




if (isset($_POST["insert"]) ){
    addCritiquer($id, $mailU, $_POST["note"], $_POST["commentaire"]);
}

$Lescritiques=getCritiquerByIdR($_GET["leresto"],$mailU);








;

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Détail d'un restaurant";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueDetailResto.php";
include "$racine/vue/pied.html.php";
?>