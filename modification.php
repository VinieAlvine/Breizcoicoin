<?php 
  include 'BD.php';
  $bdb= Database::connect();
  session_start();
  
   
    if(isset($_POST['modif']))
    {
       
      $nom =$_POST['nom'];
      $prenom = $_POST['prenom'];
      $email =  $_POST['email'];
      
  

      
      $req=$bdb->prepare("UPDATE utilisteur SET nom=?, prenom=?, mail=? WHERE user_id= $_SESSION['code']");
     $req->execute([$nom, $prenom, $email ]);
      header('location: espacemembre.php');
      
    }
   
 ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Modification</title>
  <link rel="stylesheet" href="css/modification.css">

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
         <label for="name">Nom:</label>
          <input type="text" id="name" name="nom">

          <label for="name">Prenom:</label>
          <input type="text" id="name" name="prenom">
        
          <label for="email">Email:</label>
          <input type="email" id="mail" name="email">
       <button type="submit" name="modif">Modifier</button>
        
       </form>
        </div>
      </div>
      
    </body>
</html>
<!-- partial -->
  
</body>
</html>
