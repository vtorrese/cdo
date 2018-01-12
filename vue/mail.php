<!-- Vue envoi de mail -->

<?php
// récupération du nom et du mail si connexion pour préaffichage dans formulaire mail
if($donnees['user']!=null) {$nom = $donnees['user'][0]['prenom_user']." ".$donnees['user'][0]['nom_user'];$email=$donnees['user'][0]['mail_user'];} 

if(isset($_POST['doc_prol'])) {
	$objet = "Demande de prolongation d'un prêt suite à un retard";
		$tabmessage = explode("¤",$_POST['doc_prol']);
		$message = "Fiche d'identification du prêt :\nN°".$tabmessage[0]."\nTitre : ".$tabmessage[2]."\nRetour initial prévu : ".$tabmessage[1]."\nCommentaires : \n";
		$demande = $tabmessage[0];
	} 
	else 
	{
		$objet="";
		$message = "";
		$demande = null;
	}

?>


<div class='container'>
	<div class="row" >
		<div class="panel panel-default">
			<div class="panel-body">
				<form id="contact" method="POST" class="menu" action="<?php echo $this->getServerParam('PHP_SELF') ?>?page=ouvrirMenu">
					<fieldset>
						<div class="col-sm-3" >
							<legend style="font-size : medium;">Vos coordonnées</legend>
								<span style='float : right'><input type="text" id="nom" name="nom" tabindex="1" onFocus="javascript:this.value=''" value='<?php echo $nom; ?>' class="myInput" Placeholder='Votre nom'/></span>
								<br><span style='float : right'><input type="text" id="email" name="email" tabindex="2" value='<?php echo $email; ?>' class="myInput" Placeholder='Votre mail'/></span>
						</div>	
						<div class="col-sm-6" >	
							<legend style="font-size : medium;">Votre message : </legend>
								<input type="text" id="objet" name="objet" tabindex="3" placeholder='Objet' value="<?php echo $objet; ?>" class="myInput"/><br><br>
								<textarea id="message" name="message" tabindex="4" cols="30" rows="10"><?php echo $message; ?></textarea>
								
								
					
						</div>
						<div class="col-sm-3" >
								<div class="row" >
									<div style="text-align:center; font-size : small;"><input type="submit" name="envoimail" value="Envoyer votre message !" class = "myButton"/></div>
									
									<!-- pour mettre le pret_doc en attente après envoi d'un mail de prolongation -->
									<input type="hidden" name="demande_pro" value='<?php echo $demande; ?>'>
								</div>
						
								<div class="row" >
									<?php 
									if($donnees['message_retour']!=null) {
									echo "<hr>";
										echo "<div class='alert alert-warning' role='alert'>";
											echo "<span class='label_item'>";
											echo $donnees['message_retour'];
											echo "</span>";
										echo "</div>";
										}
									?>
								</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>