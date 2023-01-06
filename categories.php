<?php
include("inc/top.php");
$bd= Database::connect();

?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="ser-main">
	<h4>Nos annonces</h4>
	<div class="ser-para">
	<p>Qsi turpis, pellentesque at ultrices in, dapibus in magna. Nunc easi diam risus, placerat ut scelerisque et,sus cipit eu ante. Nullam vitae dolor ullcper felises cursus gravida. Cras felis elit, pellentesqi amet. sus cipit eu ante. </p>
	</div>

    <!-- debut de  ligne de 3 produits -->    
    <?php
        $bdd = Database::connect();
		
		$req = $bdd->prepare("SELECT * FROM annonce ORDER BY rand() ");
		$req->execute();
		while($data = $req->fetch()){
			echo'<div class="ser-grid-list">
	<h5>'.$data["titreannonce"].'</h5><img src="images/'.$data["photo"].'" alt="" ><p>'.$data["texteannonce"].'</p>
	<div class="btn top"><a href="annonce.php?id='.$data["idannonce"].'&idc='.$data['idcategorie'].'&titre='.$data["titreannonce"].'&descript='.$data["texteannonce"].'&prix='.$data["prix"].'&photo='.$data["photo"].'">En savoir plus</a></div>
	</div>';
}$req -> closeCursor();

			?>
    
	
    
    <!-- fin de  ligne de 3 produits -->
    
    
        
    
	<div class="clear"></div>
	</div>
	
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<h2>Categories
		<?php 
			
		          $bd= Database::connect();
                 $req= "SELECT COUNT(*) FROM `categorie`  ";
                 $res=$bd->query($req);
                 $nbr=$res->fetchColumn();
                 echo'(';
		         echo $nbr;
		         echo ')';
			
			?></h2>
	</div>
	<div class="text1-nav">
		<ul>
			<?php 
                 $req= $bd->prepare("SELECT `nomcategorie` FROM `categorie` ORDER BY rand() ");
                 $req->execute();
                 // annonce par catégorie
                // $req2= "SELECT COUNT(*) FROM 'annonce' INNER JOIN 'categorie 'ON categorie.idcategorie= annonce.idcategorie";
                 //$res2=$bd->query($req2);

                 while ($resultat=$req->fetch()) {
                 	//$nomcat=$resultat['nomcategorie'];
                  echo '<li><a href=""> ';
		          echo $resultat['nomcategorie' ];
		          echo '</a></li>';}
		?>
	    </ul>
	</div>
</div>
</div>
<div class="clear"></div>
</div>
<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>

