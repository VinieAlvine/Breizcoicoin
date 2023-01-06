<?php
 
include("inc/top.php");

 $bdd = Database::connect();
if(!empty($_POST)){
	// tableau contenant les erreurs possible
	$errors=array();
   // validation du nom
	if(empty($_POST['username']) || !preg_match('/^[a-z]/', $_POST['username'])){
		$errors['username']= " Votre nom n'est pas valide";

	}// validation du prénoms
	if(empty($_POST['userlastname']) || !preg_match('/^[a-z]/', $_POST['userlastname'])){
		$errors['userlastname']= " Votre prénom n'est pas valide";

	}
	// validation de l'email
	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$errors['email']= " Votre email n'est pas valide";

	}
	// validation du mot de pass
	if(empty($_POST['password']) || $_POST['password']!=$_POST['password_confirm']){
		$errors['password']= " Votre mot de passe n'est pas valide";

	}
	debloger($errors);
}

  //Met le chemin correspondant vers BD.php dans le include 
 if(empty($errors)){
// inscription

   if(isset($_POST['username'])&&isset($_POST['userlastname'])  && isset($_POST['email']) && isset($_POST['password'])){ //ici tu peux garder ton isset($_POST['enregistre'])
    //Ici tu recupère tes donnée dans des vairiables c'est optionnel tu peux directement les mettre dans $req->execute par exemple $req->execute([$_POST['blabla],$_POST['blabla],$prenom,$tel,$code]);

      $nom = $_POST['username'];
      $prenom = $_POST['userlastname'];
      $email = $_POST['email'];
      $mdp = $_POST['password'];
     
     
      // Insertion dans la table inscription

      $req = $bdd->prepare("INSERT INTO utilisateur(nom,prenoms,mail,mot_pass) VALUES (?,?,?,?)"); //C'est comme ça qu'on fait une insertion lorsqu'on fait une requête preparée n envoie les donnée dans un tableau ou un dictionnaire de preference pour eviter les injections SQL
      $req->execute([$nom,$prenom,$email,$mdp]);  
      $req -> closeCursor();
      echo '<script type="text/javascript">alert("Inscription effectuée avec succès");</script>';
      header('Location: login.php');
  }
  if(isset($_GET['id'])){
  $reponse=$bdd->query("SELECT *FROM utilisateur WHERE id='$_GET[user_id]'");
  $donnees=$reponse->fetch();

}
  }




?>

<!-- debut de la partie contenu -->
<div class="main">
     <div class="register">
		  	  <form action="" method="POST"> 
				 <div class="register-top-grid">
					<h3>Vos informations</h3>
					 <div>
						<span>Prénom<label>*</label></span>
						<input type="text" name="userlastname"> 
					 </div>
					 <div>
						<span>Nom<label>*</label></span>
						<input type="text" name="username"> 
					 </div>
					 <div>
						 <span>Email<label>*</label></span>
						 <input type="text" name="email"> 
					 </div>
					 <div class="clear"> </div>
					     <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>S'inscrire à la neswletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>Pour vous authentifier</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password"/>
							 </div>
							 <div>
								<span>Retapez votre Password<label>*</label></span>
								<input type="password" name="password_confirm" />
							 </div>
							 <div class="clear"> </div>
					 </div>
					 <div class="clear"> </div>
				<div class="register-but">
				   <form>
					   <input type="submit" value="M'inscrire" name="sinscrire">
					   <div class="clear"> </div>
				   </form>
				</div>
		   </div>
  <div class="clear"></div>
				</form>
				
</div>
<!-- fin de la partie contenu -->

<?php
include("inc/bottom.php");
?>