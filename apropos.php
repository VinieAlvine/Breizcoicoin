<?php
include("inc/top.php");
 $bd= Database::connect();
?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="about">
		<div class="abt_para">
	    	 <a href="details.html"><h3>Lorem Ipsum is simply dummy text </h3></a>
		     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore orem ipsum dolor sit amet, consectetur dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
			<div class="btn top-right"><a href="details.html">En savoir plus</a></div>
		 </div>
		 <div class="abt_img">
			<a href="details.html"><img src="images/pic1.jpg"></a>
		</div>
		<div class="clear"></div>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore orem ipsum dolor sit amet, consectetur dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididuntLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore orem ipsum dolor sit amet, consectetur dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore orem ipsum dolor sit amet, consectetur dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore orem ipsum dolor sit amet, consectetur dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
		<div class="btn top-right"><a href="details.html">En savoir plus</a></div>
	</div>
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<h2>Catégories
			<?php 
			
		          $bd= Database::connect();
                 $req= "SELECT COUNT(*) FROM `categorie`  ";
                 $res=$bd->query($req);
                 $nbr=$res->fetchColumn();
                 echo'(';
		         echo $nbr;
		         echo ')';
			
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
<div class="clear"></div>
</div>
<!-- fin de la partie contenu -->

<?php
include("inc/bottom.php");
?>