<?php 
  include 'BD.php';
  $bdb= Database::connect();
  session_start();
  $connecte = false;
 
  if (isset($_SESSION["connecte"])) {
    $connecte = $_SESSION["connecte"];
  }
   
    if(isset($_POST['modifier']))
    {
       
      $nom = $_POST["nom"];
      $descript = $_POST["description"];
      $prix = $_POST["prix"];
      $date=$_POST["date"];
      $categorie = $_POST["categorie"];
  

      
      $req=$bdb->prepare("UPDATE annonce SET titreannonce=?, texteannonce=?, prix=?,dateannonce=?, idcategorie=? WHERE idannonce=?");
     $req->execute([$nom, $descript, $prix, $date, $categorie, $_GET["id"]]);
      header('location: espacemembre.php');
      
    }
    if(isset($_GET['id'])){
    $rep =$bdb->query("SELECT * FROM annonce AS ar, categorie AS ca  WHERE ar.idcategorie = ca.idcategorie AND ar.idannonce='$_GET[id]' ");
    $don = $rep->fetch();
  }

 ?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - backup</title>
  <link rel="stylesheet" href="css/stylea.css">
  <link href="css/nvstyle.css" rel="stylesheet" type="text/css" media="all" />


</head>
<body>
<!-- partial:index.partial.html -->
<center><h1>AJOUT ANNONCE </h1></center>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" /> </head>
<div class="container-fluid">
            <div class="container">
                  
                  <div class=" col-sm-8 col-sm-offset-2">
                    
                        <form class=" well form" enctype="multipart/form-data" method="POST"action="modifierannonce.php<?php if (isset($_GET['id'])) echo "?id=".$_GET['id']; else echo ""; ?>" > 
                               
                             <div class="form-group">
                                <label class="control-label">Titre de votre annonce <span class="asterix">*</span></label>                             
                                <input name="nom" type="text" placeholder="Titre annonce" class="form-control" value="<?php if(isset($_GET['id'])){
      echo($don['titreannonce']);
      }?>">
                          </div>
                            <div class="form-group">
                                <label class="control-label">Description de votre annonce<span class="asterix">*</span></label>                                                           
                                    <input name="description" class="form-control" value="<?php if(isset($_GET['id'])){
      echo($don['texteannonce']);
      }?>"></input>
                            </div>
                          
                            <div class="form-group">
                                <label class=" control-label" >Prix <span class="asterix">*</span></label>                             

                                <input name="prix" type="number" placeholder="prix" class="form-control" value="<?php if(isset($_GET['id'])){
      echo($don['prix']);
      }?>">
                          </div>                                           

                                <div class="form-group">
                                    <label class=" control-label">Date Annonce<span class="asterix">*</span></label>                             
                                                                                    
                                    <input name="date" type="date" placeholder="Région" class="form-control" value="<?php if(isset($_GET['id'])){
      echo($don['dateannonce']);
      }?>">                                                  
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
                                                                                    
                                    <input name="photo" type="file"  class="form-control" value="<?php if(isset($_GET['id'])){
      echo($don['photo']);
      }?>">                                                  
                                  </div>

                           
                           
                        
                            <div class="form-group text-right ">                                                          
                              <button type="submit" class="btn btn-primary" value="enregister" name="modifier">Modifier votre annonce</button>                             </div>
                                      <p class="asterix">* : Champs obligatoire.</p>
                        </form><!-------form principal---------------->
                       </div><!-----col-xs-8----------------->       
                    </div><!--------class row---------->
                </div><!-------container------------>
            </div>

              <section class="mise_ajou">

    <div class="liste_article"><br><br><br>
    <h3 style="text-align: center; font-size: 25px; text-decoration: underline;">LISTE DES ARTICLES</h3>
    <table style="background-color:#fff; color: #000 " class="m">
    <tr id="table_head">
      <td>N*</td>
      <td>Image Annonce</td>
      <td>Titre Annonce </td>
      <td>Texte Annonce </td>
      <td>PRIX PRODUIT</td>
      <td>CATEGORIE PRODUIT</td>
      <td>MODIFIER</td>
    </tr>

    <?php 

      $n=0;
      $reponse =  $bdb->query("SELECT * FROM annonce AS ar, categorie AS ca  WHERE ar.idcategorie = ca.idcategorie AND user_id= $_SESSION[code]");

      while ($donnees= $reponse->fetch()) {

        $n=$n+1;
    ?>
   
    <tr>    
      <td><?php echo $n; ?></td>
      <td><?php echo $donnees['photo']; ?></td>
      <td><?php echo $donnees['titreannonce']; ?></td>
      <td><?php echo $donnees['texteannonce']; ?></td>
      <td><?php echo $donnees['prix']; ?></td>
      <td><?php echo $donnees['nomcategorie']; ?></td>
      <td><a href="modifierannonce.php?id=<?php echo $donnees['idannonce'];?>"/><img src="images/option.png"></td>
    </tr>
    <?php 
      }
    ?>  
    
    </table>
  </div>
    
  </section>


          
             <script src="/js/Bootstrap/Select/bootstrap-select.js"></script>

>
<!-- partial -->
  
</body>
</html>
