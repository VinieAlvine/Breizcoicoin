
   
<?php
include'BD.php';
   $bdb= Database::connect();
  session_start();
  $connecte = false;
  if (isset($_SESSION["connecte"])) {
    $connecte = $_SESSION["connecte"];
  }

   if(!isset($_SESSION['code'])){
    header('location: index.php');
    exit();
   }
?>
<head>
  <link href="css/nvstyle.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'>
</head>

<div>
  <ul class="nav">
        
       <?php if ($connecte) {?>
      <li><a href="deconnexion.php">Deconnexion      </a>       
      <?php
        $membre="SELECT count(*) FROM `admin` ";
        $mbre=$bdb->query($membre);
        $nbr_mbre=$mbre->fetchColumn();
        echo $nbr_mbre;
        echo' Adimistrateur';
        ?>  
      </li>
    <?php

            } 
            else{
                ?>
       <li><a href="login.php">Mon compte</a></li>
       <?php }?>
      <div class="clear"></div>
      </ul>
</div>
  <div class="f_user">
       <div class="info">
       
        
        
        </p>
        <table>
          <caption>VOS INFORMATIONS </caption>
          <tr>
            <td class="f">Nom:</td>
            <td><?php echo htmlentities(trim($_SESSION['code'])); ?></td>
          </tr>
         

        </table><br/><br/>
       <center><a href="modification.php"><button name="modif" onclick="openForm()"
         >Modifier</button></a></center>
      

        
      
        
       </div>
       <div class="fonctionuser">
          <a href="ajoutercategorie.php"> <button type="submit" class="btn" name="ajouterannonce">Ajouter catégorie</button></a><br/>
          <a href="modifiercategorie.php"> <button type="submit" class="btn" name="modifierannonce">Modifier catégorie</button></a><br/>
          <a href="suprimerannonce.php"> <button type="submit" class="btn" name="modifierannonce">Supprimer catégorie</button></a>
       </div>
        
  </div>
   
<?php
include("inc/bottom.php");
?>
s
