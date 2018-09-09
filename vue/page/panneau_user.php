<!-- Panneau utilisateur haut de page -->

<?php
//Prise en compte du statut de la personne connectée
$status = intval($donnees['user'][0]['status_user']);
if($status>1) {$couleur = "label label-primary";} else {$couleur = "label label-warning";}


?>

<div class="col-lg-2" style='border : 1px solid var(--ma-couleur);border-radius : 4%'>

	<aside class="col-sm-12">
		<span class='<?php echo $couleur; ?>' ><i class="glyphicon glyphicon-user" style="font-size:100%;"></i> <?php echo $donnees['user'][0]['prenom_user']." ".$donnees['user'][0]['nom_user']; if ($status==1) {echo " / Admin.";}?>
		</span>
			
	</aside>
	
	<aside class="col-sm-12">
	
	<?php echo $donnees['user'][0]['lib_formation']." ".$donnees['user'][0]['lib_promotion']; ?>

	</aside>
	
	<aside class="col-sm-12">
	<?php echo $donnees['user'][0]['lib_site']; ?>
	
	</aside>
	<aside class="col-sm-12">
	
	Ancien mdp<input type="password" name="ancienmdp" id="ancienmdp">
	Nouveau mdp<input type="password" name="ancienmdp" id="newmdp" OnKeyUp="verif(this.value)">
	Confirmation<input type="password" name="ancienmdp" id="new2mdp">
	<button type="button" id="validmp" onclick='validmdp()' style='float : right;'>Valider</button>
	
	</aside>
</div>

<button type="button" class="btn btn-primary btn-sm" onclick='efface("information_user")' style='float : right;'>Profil <span class="glyphicon glyphicon-resize-vertical"></span></button>
<!-- Informations sur l'utilisateur (hors admin) -->
<?php if($status>1) { ?>
<div class="col-lg-10 pre-scrollable" id='information_user' style='display : none'>
	
	<div class="col-lg-5" >
			<div class="table-responsive">
				<table class="table table-primary">
					<tr><span class='label_type'>Prêts</span></tr>
					<thead>
					  <tr style="font-size : small">
						<th>Titre</th>
						<th>Sortie</th>
						<th>Retour</th>
						<th></th>
						
					  </tr>
					</thead>
						<tbody id="tab_pret" style="font-size : x-small">
						</tbody>
				</table>
			</div>
	</div>
	<div class="col-lg-4" >
			<div class="table-responsive">
				<table class="table table-primary">
					<tr><span class='label_type'>Réservations</span></tr>
					<thead>
					  <tr style="font-size : small">
						<th>Titre</th>
						<th>Date</th>
						<th></th>
					  </tr>
					</thead>
						<tbody id="tab_reservation" style="font-size : x-small">
						</tbody>
				</table>
			</div>
	</div>
	<div class="col-lg-3" >
			<div class="table-responsive">
				<table class="table table-primary">
					<tr><span class='label_type'>Consultations</span></tr>
					<thead>
					  <tr style="font-size : small">
						<th>Titre</th>
						<th>Date</th>
					  </tr>
					</thead>
						<tbody id="tab_consultation" style="font-size : x-small">
						</tbody>
				</table>
			</div>
	</div>
</div>
<?php } ?>

<script type="text/javascript">


	function efface($champ){

		if (document.getElementById($champ).style.display == "block")	{	document.getElementById($champ).style.display= 'none';	}
		else {	document.getElementById($champ).style.display= 'block';	}
			
	}

	function annule(id,iduser) {
			$.ajax({
			   url : '../controleur/annulreserv.php',
			   type : 'GET', 
			   data : {"id":id,"iduser":iduser}, 
			   dataType : 'html',
			   success : function(data){

			   }
		}); 
	init_panneau(iduser);
	}
	
	/*function renouv(id,iduser) {
			$.ajax({
			   url : '../controleur/reserv.php',
			   type : 'GET', 
			   data : {"id":id,"iduser":iduser}, 
			   dataType : 'html',
			   success : function(data){
					alert(data);
			   }
		}); 
	init_panneau(iduser);
	}*/
	
	function init_panneau(iduser) {
		if(iduser!=null){
			$.ajax({
				url : '../controleur/etatuser.php',
				type : 'GET', 
				data : {"iduser":iduser}, 
				dataType : 'html',
				success : function(data){
					var objuser = jQuery.parseJSON(data);
					
					
					/*Table prêts*/
					var lignepret = "";
					for(x in objuser.pret) {
						var daterefS = objuser.pret[x].dateS_prt.substring(0,10).split("-");
						var datedefS = daterefS[2] + "/" + daterefS[1] + "/" + daterefS[0];
						var daterefR = objuser.pret[x].dateR_prt.substring(0,10).split("-");
						var datedefR = daterefR[2] + "/" + daterefR[1] + "/" + daterefR[0];
						
						//gestion du dépassement de date retour d'un pret
						var limit = new Date();
						var retour = new Date(objuser.pret[x].dateR_prt);
						if(limit>retour) {
							
							if(objuser.pret[x].status_prt<2) {
							var lignepret = lignepret  + "<tr><td>" + objuser.pret[x].titre_doc + "</td><td>" + datedefS + "</td><td style='color : red;'>" + datedefR + " (retard)</td><td><form method='POST' action='index.php?page=ouvrirMenu'><input type='hidden'name='doc_prol' value='" + objuser.pret[x].id_prt + '¤' + datedefR + '¤' + objuser.pret[x].titre_doc + "'><input class='btn-warning btn-xs' name='btn_mail' type='submit' value='Contacter par mail' ></form></td></tr>";
							}
							else
							{
							var lignepret = lignepret  + "<tr style='color : red;'><td>" + objuser.pret[x].titre_doc + "</td><td>" + datedefS + "</td><td>" + datedefR + "</td><td>" + objuser.pret[x].lib_stat_prt + "</tr>";
							}
							
						} else
						{
							var lignepret = lignepret  + "<tr><td>" + objuser.pret[x].titre_doc + "</td><td>" + datedefS + "</td></tr>";
						}
							
					}
					
					
					/*Table reservation*/
					var lignereserv = "";
					for(x in objuser.reservation) {
						var dateref = objuser.reservation[x].date_reserv.substring(0,10).split("-");
						var datedef = dateref[2] + "/" + dateref[1] + "/" + dateref[0];
						var lignereserv = lignereserv  + "<tr><td>" + objuser.reservation[x].titre_doc + "</td><td>" + datedef + "</td><td><button type='button' class='btn btn-xs' onclick='annule(" + objuser.reservation[x].id_doc + "," + iduser + ")'>Annuler</button></td></tr>";	
					}
					
					
					/*Table consultation*/
					var ligneconsult = "";
					for(x in objuser.consultation) {
						var dateref = objuser.consultation[x].date_consult.substring(0,10).split("-");
						var datedef = dateref[2] + "/" + dateref[1] + "/" + dateref[0];
						var ligneconsult = ligneconsult + "<tr><td>" + objuser.consultation[x].titre_doc + "</td><td>" + datedef + "</td></tr>";	
					}
					
					document.getElementById('tab_pret').innerHTML = lignepret;
					document.getElementById('tab_reservation').innerHTML = lignereserv;
					document.getElementById('tab_consultation').innerHTML = ligneconsult;
				}
	
			});
		}
 
		
	}
	
	function verif(tape) {
				
		var critere = false;
		var majuscule = false;
		var numerique = false;
				
		for(i=0;i<tape.length;i++) {
			if(tape[i].toUpperCase()!=tape[i]){majuscule = true;}
			if(tape[i].isInteger()==true){numerique = true;}
		}
		

		if(tape.length>=7) {
			critere = true;} else {critere = false;}
			
		if((critere==true)&&(majuscule==true)&&(numerique==true)) {
			document.getElementById('validmp').disabled = false;
		}
		
	}

</script>