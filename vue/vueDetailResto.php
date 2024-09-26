<h1></h1>
<?php
$detailresto=getLesDetails($_GET["leresto"]);
$TypeCuisines=getTypeCusineByIdR($_GET["leresto"]);
$Lesphotos=getLesPhotosByIdR($_GET["leresto"]);
$Lescritiques=getCritiquerByIdR($_GET["leresto"]);
$critiqueU=getCritiquerById($_GET["leresto"],$_SESSION["mailU"]);

?>
<form action="" method="post">

 <h1><?= $detailresto->nomR ?>
<?php
if (isLoggedOn()){
    if (getAimerById($_SESSION["mailU"] , $detailresto->idR)) {
        echo"<a href='?action=detail&leresto=$detailresto->idR&pasaimer''><img src='images/aime.png'/> </a>";

    } 
    else {
        
        echo"<a href='?action=detail&leresto=$detailresto->idR&aimer''><img src='images/aimepas.png'/> </a>";
       
    }
    
}
?>
</form>
</h1>

<span id="note">
    <?php
    for ($i = 1; $i <= 5; $i++) {
        echo "<img class='note' src='images/like.png' alt=''>";
        
    }
    ?>
    
</span>

<section>
    <h3>Type de cuisine</h3>
    <?php
    foreach($TypeCuisines as $unType) {
        ?>

        <ul id="tagFood">
            <li class="tag"><span class="tag"><?=$unType->libelleTC?></span></li>		
        </ul>
<?php
}
?>
</section>
<section>
    <h3>Description</h3>  
    <?php
    echo "$detailresto->descR";
    ?>
</section>

<h2 id="adresse">
    Adresse 
</h2>
<p>
<?php
    echo "$detailresto->voieAdrR<br>";
    echo "$detailresto->cpR";
    ?>
</p>

<h2 id="photos">
    Photos
</h2>
<ul id="galerie">
    <?php
foreach($Lesphotos as $Laphoto) {
?>
    <li><img src="photos/<?php echo $Laphoto->cheminP ?>"/></li>  
<?php  
}
?>
</ul>

<h2 id="horaires">
    Horaires
</h2> 
<p>
<?php
    echo "$detailresto->horairesR";
    ?>
</p>

<h2 id="crit">Critiques</h2>
<ul id="critiques"> 
<?php
foreach($Lescritiques as $UneCritique) {

    echo "Commentaire: $UneCritique->commentaire<br>";
    echo "Note: $UneCritique->note/5<br>";
    echo "Mail: $UneCritique->mailU<br>";
    
    ?>
    <br>
<?php
    
}

if (isLoggedOn()){


    if ($critiqueU){
   

        echo"<a href='?action=detail&leresto=$detailresto->idR&supprimer''>Supprimer </a>";
            ?>
                <?php
    }
    else {
?>


<form method="post">
<textarea name="commentaire" id="" cols="100" rows="10"></textarea>   
<br>
<p>
<input type="radio" name="note" value="1">1 
<input type="radio" name="note" value="2">2
<input type="radio" name="note"value="3">3
<input type="radio" name="note"value="4">4
<input type="radio" name="note"value="5">5

</p>
<input type="submit" name="insert">
</form>


 <?php




}
}
?>
</ul>
