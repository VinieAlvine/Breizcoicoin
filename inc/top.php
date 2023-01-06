<?php 
  include 'BD.php';
  $bdb= Database::connect();
  session_start();
  $connecte = false;
 
  if (isset($_SESSION["connecte"])) {
    $connecte = $_SESSION["connecte"];
  }
 ?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
--><?php include("fonctions.php")  ?>
<!DOCTYPE HTML>

<html>
<head>
<title>BreizhCoinCoin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'>
<link href="css/nvstyle.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<div class="wrap">
<div class="header">
	<div class="logo">
		<a href="index.php"><img src="images/logo.png" alt=""> </a>
	</div>
	<div class="header-right">
	<div class="contact-info">
		<ul>
			<li><a href="favoris.php">Favoris :<?php
				 $req= "SELECT COUNT(*) FROM `favoris`  ";
                 $res=$bdb->query($req);
                 $nbr=$res->fetchColumn();
                 echo $nbr;
		         echo 'enregistrés';
				?>
			</a></li>
			<li><a href="login.php">Membre :<?php
				$membre="SELECT count(*) FROM `utilisateur` ";
				$mbre=$bdb->query($membre);
				$nbr_mbre=$mbre->fetchColumn();
				echo $nbr_mbre;
				echo'  Membre Inscrit';
				?>
			</a></li>
	
		</ul>
	</div>
	<div class="menu">
	 	 <ul class="nav">
        <li class="active"><a href="index.php" title="Home">Accueil</a></li>
  		<li><a href="apropos.php">Notre concept</a></li>
  	     <li><a href="categories.php">Annonces</a></li>
  		<li><a href="contact.php">Contact</a></li>
  		<li><a href="sinscrire.php">S'enregistrer</a></li>
       <?php if ($connecte) {?>
	    <li><a href="deconnexion.php">Deconnexion</a></li>
	     <li><a href="espacemembre.php">Mon Profil</a></li>

        <?php

            } 
            else{
                ?>
	     <li><a href="login.php">Mon compte</a></li>
	     <?php }?>
  		<div class="clear"></div>
      </ul>
	 </div>
	 </div>
	<div class="clear"></div>
</div>
<div class="hdr-btm pad-w3l">
<div class="hdr-btm-bg"></div>
<div class="hdr-btm-left">
	<div class="search">
	  <form>
		<input type="text" value="tapez votre recherche" >
		<input type="submit" value="Chercher" class="pad-w3l-search">
	  </form>
	</div>
	<div class="drp-dwn">
			<select class="custom-select" id="select-1">
				<option selected="selected">Catégorie</option>
				<?php
				$req1= $bdb->prepare("SELECT `nomcategorie` FROM `categorie` ORDER BY rand() ");
                 $req1->execute();
                 while ($resultat=$req1->fetch()) {
                  echo '<option>';
		          echo $resultat['nomcategorie' ];
		          echo '</option>';}

				?>

				
		</select>
	</div>
	<div class="txt-right">
		<h3><a href="">Recherche avancée</a></h3>
	</div>
	<div class="clear"></div>
</div>
</div>