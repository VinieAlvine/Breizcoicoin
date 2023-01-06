<?php
include("inc/top.php");

// connexion
   
  if(isset($_POST['connexion'])){

    $bdd = Database::connect();
    $req = $bdd->prepare("SELECT * FROM admin WHERE   matricule=? AND   motpass =?");
    $req->execute([$_POST["email"], $_POST["password"]]);

    if($donnees=$req->fetch()){

      $_SESSION['ida']=$donnees['idadmin'];
      $_SESSION['code']=$donnees['matricule'];
      $_SESSION['mpd']=$donnees['motpass '];
      $_SESSION['connecte'] = true;
      //$_SESSION['admin'] = false;

      header("Location:admin.php");

    } /*else{
      
      $reponse=$bdd->query("SELECT *FROM admin WHERE mail_admin='$_POST[email]'AND mdp_admin='$_POST[password]'");

      if($donnees=$reponse->fetch()){

        $_SESSION['code']=$donnees['id_admin'];
        $_SESSION['Nom']=$donnees['nom_admin'];
        $_SESSION['email']=$donnees['mail_client'];
        $_SESSION['mpd']=$donnees['mdp_client'];
        $_SESSION['cont']=$donnees['tel_client'];
        $_SESSION['connecte'] = true;
        $_SESSION['admin'] = true;
        header("Location:index.php");

      }*/
     

    }

  if(isset($_POST['connexion'])){

    $bdd = Database::connect();
    $req = $bdd->prepare("SELECT * FROM utilisateur WHERE mail=? AND mot_pass=?");
    $req->execute([$_POST["email"], $_POST["password"]]);

    if($donnees=$req->fetch()){

      $_SESSION['code']=$donnees['user_id'];
      $_SESSION['Nom']=$donnees['nom'];
      $_SESSION['Prenom']=$donnees['prenoms'];
      $_SESSION['email']=$donnees['mail'];
      $_SESSION['mpd']=$donnees[' mot_pass'];
      $_SESSION['connecte'] = true;
      //$_SESSION['admin'] = false;

      header("Location:espacemembre.php");

    } /*else{
      
      $reponse=$bdd->query("SELECT *FROM admin WHERE mail_admin='$_POST[email]'AND mdp_admin='$_POST[password]'");

      if($donnees=$reponse->fetch()){

        $_SESSION['code']=$donnees['id_admin'];
        $_SESSION['Nom']=$donnees['nom_admin'];
        $_SESSION['email']=$donnees['mail_client'];
        $_SESSION['mpd']=$donnees['mdp_client'];
        $_SESSION['cont']=$donnees['tel_client'];
        $_SESSION['connecte'] = true;
        $_SESSION['admin'] = true;
        header("Location:index.php");

      }*/
      else{
        echo '<script type="text/javascript">alert("utilisateur invalide!!");</script>';
      }

    }
  
?>



<!-- debut de la partie contenu -->
<div class="main">

		<div class="register">
			   <div class="col_1_of_list span_1_of_list login-left">
			  	 <h3>Nouveau membre</h3>
				 <p>En créant un compte, vous pourrez créer des annonces</p>
				 <a class="acount-btn" href="sinscrire.php">Créer un compte</a>
			   </div>
			   <div class="col_1_of_list span_1_of_list login-right">
			  	<h3>Déja membre ?</h3>
				<p>Si vous avez déja un compte, merci de vous connecter</p>
				<form action="" method="POST">
				  <div>
					<span>Adresse email<label>*</label></span>
					<input type="text" name="email" onkeyup="validate();"> 
				  </div>
				  <div>
					<span>Mot de passe<label>*</label></span>
					<input type="password"name="password" onkeyup="valide();"> 
				  </div>
				  <a class="forgot" href="#">Mot de passe oublié</a>
				  <input type="submit" value="Login" name="connexion">
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
		
	</div>
  <div class="clear"></div>
</div><!-- fin de la partie contenu -->

<?php
include("inc/bottom.php");
?>