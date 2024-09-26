<?php
include_once "$racine/modele/bd.Authentification.php";
include_once "$racine/modele/Authentification.php";



// traitement si necessaire des donnees recuperees
if (!isset($_POST["mailU"]) || !isset($_POST["mdpU"])){
    // Cas 1 : On affiche le formulaire de connexion
    
    $titre = "Authentification";
    


}
else
{
    // Appel de la fonction login()
    login($_POST["mailU"], $_POST["mdpU"]);
}
    if (isLoggedOn()){
         // Cas 2 : L'utilisateur est connecté, on affiche la confirmation
         $titre = "Confirmation";
         include "$racine/vue/entete.html.php";
         include "$racine/vue/vueConfirmation.php";
         include "$racine/vue/pied.html.php";
         exit();


    }
    else
    {
         // Cas 3 : L'utilisateur n'est pas connecté, on affiche le formulaire de connexion
         $titre = "Authentification";
         include "$racine/vue/entete.html.php";
         include "$racine/vue/vueAuthentification.php";
         include "$racine/vue/pied.html.php";
          exit();
         

         
    }





?>
