<h1>Liste des restaurants</h1>




<!DOCTYPE html>
<html>
<body>


</body>
</html>
<?php
foreach($lesRestos as $unResto) {
    $unePhoto=getLaPhotoByIdR($unResto->idR);
    $TypeCuisines=getTypeCusineByIdR($unResto->idR);


?>


<div class="card">

    <div class="photoCard">
    <img src="photos/<?php echo $unePhoto->cheminP ?>"/>
    

    </div>
  
        
    
    
    <?php
  
    echo "<a href=?action=detail&leresto=$unResto->idR>$unResto->nomR<br></a>";
    echo "$unResto->voieAdrR<br>";
    echo "$unResto->cpR";
    ?> 

    <div class="tagCard">
        <?php
    foreach($TypeCuisines as $unType) {
        ?>

        <ul id="tagFood">
            <li class="tag"><span class="tag"><?=$unType->libelleTC?></span></li>		
        </ul>
<?php
}
?>
    </div>

</div>
<?php
}
?>