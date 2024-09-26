<?php
include_once "$racine/modele/bd.resto.php";
include_once "$racine/modele/bd.photo.php";
include_once "$racine/modele/bd.typecuisine.php";
include_once "$racine/modele/bd.critiquer.php";

// creation du menu burger

$critere='nom';
$menuBurger = array();
$menuBurger[] = array("url" => "./?action=recherche&critere=nom", "label" => "Recherche par nom");
$menuBurger[] = array("url" => "./?action=recherche&critere=adresse", "label" => "Recherche par adresse");
$menuBurger[] = array("url" => "./?action=recherche&critere=type", "label" => "Recherche par type de cuisine");


// recuperation des donnees GET, POST, et SESSION

;
if (isset($_GET['critere'])){
    $critere=$_GET['critere'];
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
;
if(isset($_POST['rechercherR'])){

    if ($critere=="nom"){
    $lesRestos=getLesRestosByNomR($_POST['nomRech']);
}
if ($critere=="adresse"){

    $lesRestos=getLesRestosByAdresse($_POST['adresseRech'] , $_POST['codeRech'], $_POST['villeRech']);

}
if ($critere=="type"){
    $lesRestos=getLesRestosByTC($_POST['tab']);
}
}

$lestypes = getnomtype();

;


// traitement si necessaire des donnees recuperees

;



// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Recherche d'un restaurant";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueRechercheResto.php";
if (!empty($_POST)) {
    // affichage des résultats de la recherche
    include "$racine/vue/vueListeRestos.php";
}
include "$racine/vue/pied.html.php";
?>
