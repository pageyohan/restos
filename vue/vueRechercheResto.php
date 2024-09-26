<h1>Recherche d'un restaurant</h1>
<form action="./?action=recherche&critere=<?= $critere ?>" method="POST">
<?php
   switch ($critere){
      case "nom":
         
         echo "Recherche par nom :";
         ?>
         <br>
         <input type="text" name="nomRech">
         <br>
         <?php
         break;
      case "adresse":
         echo "Recherche par adresse :";
         ?>
         <br>
         <input type="text" name="adresseRech" placeholder="Rue">
         <br>
         <input type="text" name="codeRech" placeholder="Code Postal">
         <br>
         <input type="text" name="villeRech" placeholder="Ville">
         

         <br>
         <?php
         
         break;
      case "type":
         echo "Recherche par type de cuisine :";
         foreach($lestypes as $unType) {
         ?>
         <br>
         <input type="checkbox" name="tab[]" value="<?=$unType->idTC?>" >
         <label><?=$unType->libelleTC  ?></label> 
         <br>
         <?php
         }
         break;
   }
   
?>
   <input type="submit" value="rechercher" name="rechercherR" />
   
   

</form>