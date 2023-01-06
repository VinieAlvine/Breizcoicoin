<?php
include("inc/top.php");
$bd= Database::connect();
?>
<head>
	<style >
		.mini img{
			width: 25%;
			margin-left: 10%;
		}
	</style>
</head>

<!-- debut de la partie contenu -->
<div class="main">
<div class="details">
				  <div class="product-details">				
					<div class="images_3_of_2">
						<div id="container">
						   <div id="products_example">
							<div id="products">
								<div class="slides_container">
									<a href="#" target="_blank">	<img src=<?php echo 'images/'.$_GET["photo"].''?> />  </a>
								
								</div>
								<ul class="pagination">
									<li class="mini"><a href="#"><img src=<?php echo 'images/'.$_GET["photo"].''?> />  </</a></li>
								
                                
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $_GET["titre"];?></h2>
					<p><?php echo $_GET["descript"];?></p>					
					<div class="price">
						<p>Prix: <span><?php echo $_GET["prix"];?> €</span></p>
					</div>
				
            
            
				 <div class="wish-list">
				 	<ul>
				 		<li class="wish"><button>Ajouter à mes favoris</button></a></li>
				 
				 	</ul>
				 </div>
			</div>
			<div class="clear"></div>
		  </div>

	   
       		
   <div class="content_bottom">
   	<div class="text-h1 top1 btm">
			<h2>Annonces qui pourraient vous intéresser</h2>
	  	</div>
 <div class="div2">
        <div id="mcts1">
        	<?php  
        	$a = 3;
        	$b=$_GET["idc"];
        	//echo $b;
		    $req = $bd->prepare("SELECT * FROM annonce WHERE idcategorie=$b ORDER BY rand() LIMIT $a");
		    $req->execute();
		    while($data = $req->fetch()){
		    	echo'<div class="w3l-img">';
		    	echo'<img src="images/'.$data["photo"].'" alt="" >
			</div>';
			    echo'';}
        	?>
			
            <div class="clear"></div>	
        </div>
   		</div>

    	</div>

        </div>
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<h2>Categories
			<?php 
			
		          
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
                 while ($resultat=$req->fetch()) {
                 	$nomcat=$resultat['nomcategorie'];
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