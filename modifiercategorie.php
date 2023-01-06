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
       
      $categorie = $_POST["categorie"];
  

      
      $req=$bdb->prepare("UPDATE categorie SET nomcategorie=? WHERE idcategorie=?");
     $req->execute([$date, $categorie]);
      header('location: adimin.php');
      
    }
    if(isset($_GET['id'])){
    $rep =$bdb->query("SELECT * FROM categorie  WHERE categorie.idcategorie ='$_GET[id]' ");
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
<center><h1>MODIFICATION CATEGORIE </h1></center>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" /> </head>
<div class="container-fluid">
            <div class="container">
                  
                  <div class=" col-sm-8 col-sm-offset-2">
                    
                        <form class=" well form" enctype="multipart/form-data" method="POST"action="modifiercategorie.php<?php if (isset($_GET['id'])) echo "?id=".$_GET['id']; else echo ""; ?>" > 
                               
                             <div class="form-group">
                                <label class="control-label">Nom Catégorie<span class="asterix">*</span></label>                             
                                <input name="nom" type="text" placeholder="nom catégorie" class="form-control" value="<?php if(isset($_GET['id'])){
      echo($don['nomcategorie']);
      }?>">
                          </div>
                           
                           
                        
                            <div class="form-group text-right ">                                                          
                              <button type="submit" class="btn btn-primary" value="enregister" name="modifier">Modifier la catégorie</button>                             </div>
                                      <p class="asterix">* : Champs obligatoire.</p>
                        </form><!-------form principal---------------->
                       </div><!-----col-xs-8----------------->       
                    </div><!--------class row---------->
                </div><!-------container------------>
            </div>

              <section class="mise_ajou">

    <div class="liste_article"><br><br><br>
    <h3 style="text-align: center; font-size: 25px; text-decoration: underline;">LISTE DES CATEGORIE</h3>
    <table style="background-color:#fff; color: #000 " class="m">
    <tr id="table_head">
      <td>N*</td>
      <td>Nom catégorie</td>
      
    </tr>

    <?php 

      $n=0;
      $reponse =  $bdb->query("SELECT * FROM categorie ");

      while ($donnees= $reponse->fetch()) {

        $n=$n+1;
    ?>
   
    <tr>    
      <td><?php echo $n; ?></td>
     
      <td><?php echo $donnees['nomcategorie']; ?></td>
      <td><a href="modifiercategorie.php?id=<?php echo $donnees['idcategorie'];?>"/><img src="images/option.png"></td>
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
