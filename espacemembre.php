<?php
include("inc/top.php");?>
<?php
  
   if(!isset($_SESSION['email'])){
   	header('location: index.php');
   	exit();
   }
?>
<style type="text/css">
	
	

</style><br/><br/><br/>
<center><h3>BIENVENUE <?php echo htmlentities(trim($_SESSION['Nom'])); ?>
	</h3></center>
	<div class="f_user">
       <div class="info">
       
        
        
        </p>
        <table>
          <caption>VOS INFORMATION </caption>
          <tr>
            <td class="f">Nom:</td>
            <td><?php echo htmlentities(trim($_SESSION['Nom'])); ?></td>
          </tr>
          <tr>
            <td class="f">Prenoms:</td>
            <td><?php echo htmlentities(trim($_SESSION['Prenom'])); ?></td>
          </tr>
          <tr>
            <td class="f">E-mail: </td>
            <td><?php echo htmlentities(trim($_SESSION['email'])); ?></td>
          </tr>

        </table><br/><br/>
       <center><a href="modification.php"><button name="modif" onclick="openForm()"
         >Modifier</button></a></center>
      

        
      
        
       </div>
       <div class="fonctionuser">
          <a href="ajoutannonce.php"> <button type="submit" class="btn" name="ajouterannonce">Ajouter une annonce</button></a><br/>
          <a href="modifierannonce.php"> <button type="submit" class="btn" name="modifierannonce">Modifier Annonce</button></a><br/>
          <a href="suprimerannonce.php"> <button type="submit" class="btn" name="modifierannonce">Supprimer Annonce</button></a>
       </div>
        
  </div>
   
<?php
include("inc/bottom.php");
?>
<script >
   function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }
</script>
