<?php
include_once "bd.pdo.php";

function getTypeCusineByIdR($idR){
    try {
        $connex = connexionPDO();
        $prep = $connex->prepare("SELECT * FROM typecuisine INNER JOIN proposer ON proposer.idTC = typecuisine.idTC WHERE proposer.idR = ?");
        $prep->bindValue(1, $idR);
        $prep->execute();
        $resultat = $prep->fetchAll(PDO::FETCH_ASSOC);

        header('Content-Type: application/json'); 
        echo json_encode($resultat);

    } catch (PDOException $e) {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'Erreur : ' . $e->getMessage()]);
    }
}
?>
