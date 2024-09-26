<?php

function getLeUtilisateurByMailU($mailU){
    try{
        $connex = connexionPDO();
        $prep= $connex->prepare("SELECT* FROM utilisateur WHERE mailU = ?");
        $prep-> bindValue(1,$mailU);
        $prep->execute();
        $resultat = $prep->fetch(PDO::FETCH_OBJ);
        return $resultat;
    }

    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
}

?>