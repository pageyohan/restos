<?php
include_once "bd.pdo.php";



    function getCritiquerByIdR($idR){

    try{
        $connex = connexionPDO();
        $prep= $connex->prepare("SELECT * FROM critiquer WHERE idR = ?");
        $prep-> bindValue(1,$idR);
        $prep->execute();
        $resultat = $prep->fetchAll(PDO::FETCH_OBJ);
        return $resultat;
    }

    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}



    function getCritiquerById($idR, $mailU){

    try{
        $connex = connexionPDO();
        $prep= $connex->prepare("SELECT * FROM critiquer WHERE idR = ? AND mailU=?");
        $prep-> bindValue(1,$idR);
        $prep-> bindValue(2,$mailU);
        $prep->execute();
        $critique = $prep->fetchAll(PDO::FETCH_OBJ);
        return $critique;
        
    }

    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }   

    }

    function delCritiquer($idR,$mailU){
        try{
            $connex = connexionPDO();
            $prep = $connex->prepare("DELETE FROM critiquer WHERE idR = ? AND mailU=? ");
            $prep-> bindValue(1,$idR);
            $prep-> bindValue(2,$mailU);
            $prep->execute();
            
        }
        
        catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }

    }

    function addCritiquer($idR, $mailU, $note, $commentaire){
        try{
        $connex = connexionPDO();
        $req = "INSERT INTO critiquer VALUES (?,?,?,?)";
        $prep = $connex->prepare($req);
        $prep->bindValue(1, $idR);
        $prep->bindValue(2, $mailU);
        $prep->bindValue(3, $note);
        $prep->bindValue(4, $commentaire);
        $prep->execute();
         
    }
         catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
        

    }

?>
   
