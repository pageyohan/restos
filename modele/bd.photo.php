    <?php
    include_once "bd.pdo.php";
    function getLaPhotoByIdR($idR){

        try{
            $connex = connexionPDO();
            $prep= $connex->prepare("SELECT * FROM photo WHERE idR = ?");
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

    function getLesPhotosByIdR($idR){

        try{
            $connex = connexionPDO();
            $prep= $connex->prepare("SELECT * FROM photo WHERE idR = ?");
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
    ?>
    
