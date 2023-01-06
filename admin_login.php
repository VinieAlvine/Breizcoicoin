<?php
  if(isset($_POST['connexion'])){

    $bdd = Database::connect();
    $req = $bdd->prepare("SELECT * FROM admin WHERE   matricule=? AND   motpass =?");
    $req->execute([$_POST["email"], $_POST["password"]]);

    if($donnees=$req->fetch()){

      $_SESSION['ida']=$donnees['idadmin'];
      $_SESSION['mat']=$donnees['matricule'];
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
      else{
        echo '<script type="text/javascript">alert("utilisateur invalide!!");</script>';
      }}
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - html forms</title>
  <<link rel="stylesheet" href="css/modification.css">


</head>
<body>
<!-- partial:index.partial.html -->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modification</title>
        <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
      <div class="row">
    <div class="col-md-12">
      <form action="index.html" method="post">
        <h1> Modification </h1>
         <label for="name">Matricule:</label>
          <input type="text" id="name" name="email">

          
        
          <label for="email">Mot de Pass:</label>
         <input type="text"name="password" onkeyup="valide();" id="mail"> 
       
        
          
          
              
       
        <button type="submit" name="connexion">Sign Up</button>
        
       </form>
        </div>
      </div>
      
    </body>
</html>
<!-- partial -->
  
</body>
</html>
