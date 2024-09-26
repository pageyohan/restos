
<?php
include_once "bd.pdo.php";



function getAimerById($mailU, $idR){
    try{
        $connex = connexionPDO();
        $prep= $connex->prepare("SELECT * FROM aimer WHERE idR = ? AND mailU=?");
        $prep-> bindValue(1,$idR);
        $prep-> bindValue(2,$mailU);
        $prep->execute();
        $resultat = $prep->fetch(PDO::FETCH_OBJ);
        return $resultat;
    }

    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();  
        die();
    }

}


function addAimer($mailU, $idR){
    try{
        $connex = connexionPDO();
        $prep= $connex->prepare("INSERT INTO aimer VALUES (?,?)");
        $prep-> bindValue(1,$idR);
        $prep-> bindValue(2,$mailU);
        $prep->execute();
        
        
    }

    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }

}


function delAimer($idR, $mailU) {
    try{
        $connex = connexionPDO();
        $prep = $connex->prepare("DELETE FROM aimer WHERE idR = ? AND mailU=? ");
        $prep-> bindValue(1,$idR);
        $prep-> bindValue(2,$mailU);
        $prep->execute();
       
    }

    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
}