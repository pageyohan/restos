<?php
include_once "bd.pdo.php";

include_once "bd.aimer.php";

function getLesRestos(){
    try{
        $connex = connexionPDO();
        $prep= $connex->prepare("SELECT * FROM resto");
        $prep->execute();
        $resultat = $prep->fetchAll(PDO::FETCH_OBJ);
        return $resultat;
    }

    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getLesDetails($idR){
    try{
            $connex = connexionPDO();
            $prep= $connex->prepare("SELECT * FROM resto WHERE idR = ?");
            $prep-> bindValue(1,$idR);
            $prep->execute();
            $resultat = $prep->fetch(PDO::FETCH_OBJ);
            return $resultat;
    }
    
    catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
    }
}

function getLesRestosByNomR($nomR){
    try{
        $connex = connexionPDO();
        $prep= $connex->prepare("SELECT * FROM resto WHERE nomR LIKE ?");
        $prep->bindValue(1, "%".$nomR."%");
        $prep->execute();
        $resultat = $prep->fetchAll(PDO::FETCH_OBJ);
        return $resultat;
    }

    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
}

function getLesRestosByAdresse($voieAdrR, $cpR, $villeR){
    try{
        $connex = connexionPDO();
        $prep= $connex->prepare("SELECT * FROM resto WHERE voieAdrR LIKE ? AND cpR LIKE ? AND villeR LIKE ?;");
        $prep->bindValue(1, "%".$voieAdrR."%");
        $prep->bindValue(2, "%".$cpR."%");
        $prep->bindValue(3, "%".$villeR."%");
        $prep->execute();
        $resultat = $prep->fetchAll(PDO::FETCH_OBJ);
        return $resultat;
    }

    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
}
function getLesRestosByTC($tabIdTC){
    if (count($tabIdTC) > 0) {
        $filtre = "(";
        foreach($tabIdTC as $idTC){
            $filtre .= "$idTC,";
        }
        $filtre .= "null)";
 
        try{
            $connex = connexionPDO();
            $prep = $connex->prepare("select distinct resto.* from resto inner join proposer on resto.idR=proposer.idR where idTC IN $filtre");
            $prep->execute();
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }else{
        return false;
    }
}

function getnomtype(){
    try{
        $connex = connexionPDO();
        $prep= $connex->prepare("SELECT * FROM typecuisine");
        $prep->execute();
        $resultat = $prep->fetchAll(PDO::FETCH_OBJ);
        return $resultat;
    }

    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}



?>