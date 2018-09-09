<!-- Vue consultation ou la répartition des sous-écrans-->

    
<?php include('menu.php'); ?>


<div class="col-sm-8">
<span class='titrepanneau'><?php echo $donnees['lot']; ?></span>
<hr>

<?php if($donnees['lot']=='Nouveautés') {include('suggestion.php');} ?>

<?php if($donnees['lot']=='Consulter le fond') {include('formulaireRecherche.php');} ?>

<?php if($donnees['lot']=='Centre de Ressources') {include('information.php');} ?>

<?php if($donnees['lot']=='Contactez-nous') {include('mail.php');} ?>
  </div>
</div>
</div>