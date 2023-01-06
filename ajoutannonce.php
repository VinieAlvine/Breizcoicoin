

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
      
        $photo = basename($_FILES['photo']['name']);
       
        

        
      $nom = $_POST["nom"];
      $descript = $_POST["description"];
      $prix = $_POST["prix"];
      $date=$_POST["date"];
      $categorie = $_POST["categorie"];
      $user_id=$_SESSION['code'];

      
      $req=$bdb->prepare("INSERT INTO `annonce`( `titreannonce`, `texteannonce`, `prix`, `dateannonce`, `idcategorie`, `user_id`, `photo`) VALUES (?,?,?,?,?,?,?)");
      $req->execute([$nom, $descript, $prix, $date ,$categorie,$user_id,$photo]);
      header('location: espacemembre.php');

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
<center><h1>AJOUT ANNONCE </h1></center>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" /> </head>
<div class="container-fluid">
            <div class="container">
                  
                  <div class=" col-sm-8 col-sm-offset-2">
                    
                        <form class=" well form" enctype="multipart/form-data" method="POST" action=""> 
                               
                             <div class="form-group">
                                <label class="control-label">Titre de votre annonce <span class="asterix">*</span></label>                             
                                <input name="nom" type="text" placeholder="Titre annonce" class="form-control">
                          </div>
                            <div class="form-group">
                                <label class="control-label">Description de votre annonce<span class="asterix">*</span></label>                                                           
                                    <textarea name="description" class="form-control"></textarea>
                            </div>
                          
                            <div class="form-group">
                                <label class=" control-label">Prix <span class="asterix">*</span></label>                             

                                <input name="prix" type="number" placeholder="prix" class="form-control">
                          </div>                                           

                                <div class="form-group">
                                    <label class=" control-label">Date Annonce<span class="asterix">*</span></label>                             
                                                                                    
                                    <input name="date" type="date" placeholder="Région" class="form-control">                                                  
                                  </div>
                            
                            
                                <div class="form-group">
                                    <label class="control-label">Catégorie<span class="asterix">*</span></label>                            
                                    <select class="form-control" name="categorie">
                                      <?php
                                         $reponse = $bdb->query("SELECT * FROM categorie");
                                         while($donnees = $reponse->fetch()){
                                                ?>
                                           <option id="option" value="<?php echo $donnees['idcategorie'];?>">
                                           <?php echo $donnees['nomcategorie'];?></option>
                                             <?php 
                                                }
                                                   ?>
                                              ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class=" control-label">Photo<span class="asterix">*</span></label>                             
                                                                                    
                                    <input type="file" id="photo" name="photo" placeholder="Nom du produit"  class="form-control" accept="images/png, images/jpg" >                                                  
                                  </div>

                           
                           
                        
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
