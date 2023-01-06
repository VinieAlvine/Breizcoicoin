

<?php
include 'BD.php';
  
  $bdb= Database::connect();
  session_start();
  $connecte = false;
 
  if (isset($_SESSION["connecte"])) {
    $connecte = $_SESSION["connecte"];
  }
   
    if(isset($_POST['ajouter']))
    {
      
       
        

        
      $nom = $_POST["nomcat"];
     

      
      $req=$bdb->prepare("INSERT INTO `categorie`( `nomcategorie`) VALUES (?)");
      $req->execute([$nom]);
      header('location: admin.php');

    }

 ?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - backup</title>
  <link rel="stylesheet" href="css/stylea.css">

</head>
<body>
<!-- partial:index.partial.html -->
<center><h1>AJOUT CATEGORIE </h1></center>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" /> </head>
<div class="container-fluid"><br/><br/><br/><br/>
            <div class="container">
                  
                  <div class=" col-sm-8 col-sm-offset-2">
                    
                        <form class=" well form" enctype="multipart/form-data" method="POST" action=""> 
                               
                             <div class="form-group">
                                <label class="control-label">Nom catégorie <span class="asterix">*</span></label>                             
                                <input name="nomcat" type="text" placeholder="nom catégorie" class="form-control">
                         
                           
                        
                            <div class="form-group text-right ">                                                          
                              <button type="submit" class="btn btn-primary" value="enregister" name="ajouter">Enregistrer votre annonce</button>                             </div>
                                      <p class="asterix">* : Champs obligatoire.</p>
                        </form><!-------form principal---------------->
                       </div><!-----col-xs-8----------------->       
                    </div><!--------class row---------->
                </div><!-------container------------>
            </div>
          
             <script src="/js/Bootstrap/Select/bootstrap-select.js"></script>

>
<!-- partial -->
  
</body>
</html>
