<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>CDO</title>
		
		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
		
		
	</head>
	<body onload="init_panneau(<?php echo $donnees['user'][0]['id_user']; ?>)">
	


	<header class="Jumbotron" id="bandeau_haut">
	
		<div class="row h-100">
			<div class="col-sm-2" >
				<img class='img-responsive' src="image/logoCDO.png" alt='Logo CDO'>
			</div>
			<div class="col-sm-10 h-50 pb-4">
			
			<!-- Affichage du panneau utilisateur si connexion (bandeau haut de page) -->
				<?php if($donnees['user']!=null) {include 'panneau_user.php';} ?>
			
			<!-- Affichage des erreurs et des informations (bandeau haut de page) -->
				<?php if($this->erreurMessage != null): ?>
					<div class="alert alert-danger"><?php echo $this->erreurMessage; ?></div>
				<?php endif ?>
				<?php if($this->infoMessage != null): ?>
					<div class="alert alert-info"><?php echo $this->infoMessage; ?></div>
				<?php endif ?>

			</div>
		</div>
	</header>
	
	<div class="progression"></div>
	
	
	