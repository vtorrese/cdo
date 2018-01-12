<!-- Vue ACCUEIL -->

    
<?php include('menu.php'); ?>


		<div class="col-sm-8">
			<span class='titrepanneau'>Accueil</span>
				<hr>
				
					<div class="well well-sm" style="text-align : center;">
				
						<h4>Bienvenue sur le site du Centre de Ressources du CFAI-AFPI 84</h4>
						
						<?php if($donnees['user']==null) {echo "<div class='alert alert-info'>Connectez-vous pour afficher vos informations et procéder à des réservations !!</div>";} ?>
					
					</div>
		</div>
	</div>
</div>