<?php
include("inc/top.php");
//include("BD.php");
?>


<?php 
 
  $bdb= Database::connect();
  

   

 ?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<h2>Catégories<?php 
			// nombre de  catégorie
		          $bd= Database::connect();
                 $req= "SELECT COUNT(*) FROM `categorie`  ";
                 $res=$bd->query($req);
                 $nbr=$res->fetchColumn();
                 echo'(';
		         echo $nbr;
		         echo ')';
		         // nombre d'annonce 
		         echo'<br/>';
		          $req2= "SELECT COUNT(*) FROM `annonce`  ";
                 $res2=$bd->query($req2);
                 $nba=$res2->fetchColumn();
                 echo'(';
		         echo $nba;
		         echo ')Annonces';
			
			?>
		</h2>
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

<div class="content">


	<div class="clear"></div>
	<div class="cnt-main">
		
		<div class="s_btn">
			<ul>
				<li><h2>Bienvenue !</h2></li>
				<li><h3><a href="login.php">Se connecter</a></h3></li>
				<li><h2>Nouveau visiteur ?</h2></li>
				<li><h4><a href="sinscrire.php">S'enregistrer</a></h4></li>
				<div class="clear"></div>
			</ul>
		</div>
	<div class="grid">
		<?php
        $bdd = Database::connect();
		$a = 1;
		$req = $bdd->prepare("SELECT * FROM annonce ORDER BY rand() LIMIT $a");
		$req->execute();
		while($data = $req->fetch()){
			echo'<div class="grid_1_of_3 images_1_of_3"><a href="annonce.php?id='.$data["idannonce"].'&idc='.$data['idcategorie'].'&titre='.$data["titreannonce"].'&descript='.$data["texteannonce"].'&prix='.$data["prix"].'&photo='.$data["photo"].'"><img src="images/'.$data["photo"].'" alt="" ></a>
	</div>';
	echo'<div class="grid-para">
		<h2>Nouveau sur le site</h2>
		<h3>A vendre '.$data["titreannonce"].'</h3>
		<p>'.$data["texteannonce"].'</p>
		<div class="btn top">
		<a href="annonce.php?id='.$data["idannonce"].'&idc='.$data['idcategorie'].'&titre='.$data["titreannonce"].'&descript='.$data["texteannonce"].'&prix='.$data["prix"].'&photo='.$data["photo"].'">Details&nbsp;<img src="images/marker2.png"></a>
		</div>
	</div>
	<div class="clear"></div>';}
			?></div>
</div>
<div class="cnt-main btm">
	<div class="section group">
		<?php
        $bdd = Database::connect();
		$a = 6;
		$req = $bdd->prepare("SELECT * FROM annonce ORDER BY rand() LIMIT $a");
		$req->execute();
		while($data = $req->fetch()){
			echo'<div class="grid_1_of_3 images_1_of_3"><a href="annonce.php">';

			echo'<img src="images/'.$data["photo"].'" alt="" ></a>';
			echo ' <a href="annonce.php?id='.$data["idannonce"].'&idc='.$data['idcategorie'].'&titre='.$data["titreannonce"].'&descript='.$data["texteannonce"].'&prix='.$data["prix"].'&photo='.$data["photo"].'"><h3>plus details</h3></a> ';

			echo'<div class="cart-b">
					           <span class="price left"><sup></sup><sub></sub></span>
					           <div class="btn top-right right"><button type="submit" name="ajouter">Ajouter à mes favoris</button></div>
				               <div class="clear"></div>
				            </div>
				        </div>';

		    if(isset($_POST['ajouter'])){
		    	$req=$bdb->prepare("INSERT INTO `favoris`(`idannonce`, `user_id`) VALUES (?,?)");
                $req->execute([$data['idannonce'],$data['user_id']]);
                //header('location: espacemembre.php');
              }
}
		$req -> closeCursor();


		?>
		
					   
					   
				    
				      

		
	</div>
</div>
</div>

<div class="clear"></div>
</div>

<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>
