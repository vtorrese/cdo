

<?php


if($donnees['trace']) {
	list($type_trace,$terme_trace,$motclef_trace,$date1_trace,$date2_trace,$auteur_trace,$period_trace,$coll_trace) = $donnees['trace'];
}
if(count($type_trace)>0) {$type_dis='block';} else {$type_dis='none';}
if(($terme_trace)||($motclef_trace)) {$terme_dis='block';} else {$terme_dis='none';} 
if(($date1_trace)||($date2_trace)) {$date_dis='block';} else {$date_dis='none';}
if($auteur_trace) {$auteur_dis='block';} else {$auteur_dis='none';}
if($period_trace) {$period_dis='block';} else {$period_dis='none';}
if($coll_trace) {$coll_dis='block';} else {$coll_dis='none';}

?>





<div class='container'>
	<div class="row" >
		<div class="col-sm-3" > <!-- Formulaire de recherche -->
			<form method='POST' name='recherche' action="<?php echo $this->getServerParam('PHP_SELF') ?>?page=recherche">
				<input type='submit' name='btn_gene' value='rechercher' class = "myButton">
				<input type='submit' name='refresh' value='initialiser' class = "myButton" style="height:auto; width:auto;"><hr>
				<div class="panel panel-info">
				
					<div class="panel-heading" onclick="affiche('ptype')">Par type de documents</div>
						<div class="panel-body" id='ptype' style='display : <?php echo $type_dis; ?>'>
							<div class="checkbox">
								<label><input type="checkbox" value='0' name='tabtype[0]'onClick="uncheckAll('multiple')" id='tt_type'  <?php if((count($type_trace[0])==1)||(!isset($donnees['trace']))) {echo 'checked';}?>>Tous</label>
								<?php foreach($donnees['type'] as $type) { ?>
									<label>
										<input type="checkbox" name='tabtype[<?php echo $type['id_type']; ?>]' value="<?php echo $type['id_type']; ?>" onClick="uncheck('tt_type')" class='multiple' <?php if(in_array($type['id_type'],$type_trace)) {echo 'checked';}?>><?php echo $type['lib_type']; ?>
									</label>
								<?php } ?>

							</div>
						</div>
				</div>
		
				<div class="panel panel-info">
					<div class="panel-heading" onclick="affiche('pmot')">Par terme (titre, résumé, sommaire), mot-clef</div>
						<div class="panel-body" id='pmot' style='text-align : right;display : <?php echo $terme_dis; ?>'>
							<input type='text' name='terme' id='terme' class="myInput" Placeholder='Mots, termes, ....' value='<?php echo $terme_trace; ?>' onfocus='cls_mtclf("motclef")'>
								Mots-clefs<br>
								<select name='choix_motclef' id='motclef' class="form-control" onfocus='cls_mtclf("terme")'>
									<option value='0' selected></option>
						
										
										<?php foreach($donnees['motclef'] as $mot) { 
											if($mot['id_motclef']==$motclef_trace) {
											echo "<option value='".$mot['id_motclef']."' selected>".$mot['lib_motclef']."</option>";} else {
											echo "<option value='".$mot['id_motclef']."'>".$mot['lib_motclef']."</option>";}
										 } ?>
										
										
								</select>
						</div>
				</div>

				<div class="panel panel-info">
					<div class="panel-heading" onclick="affiche('pdate')">Par date de publication</div>
						<div class="panel-body" id='pdate' style='text-align : right;display : <?php echo $date_dis; ?>'>
							<p>De <input type="date" name="date1" id="date1" onchange='controldate()' value="<?php If($date1_trace) {echo $date1_trace;} ?>"/></p><p>à <input type="date" name="date2" id="date2" onchange='controldate()' value="<?php If($date2_trace) {echo $date2_trace;} ?>"/></p>
						</div>
				</div>
					
				<div class="panel panel-info">
					<div class="panel-heading" onclick="affiche('pauteur')">Par auteur</div>
						<div class="panel-body" id='pauteur' style='text-align : right;display : <?php echo $auteur_dis; ?>'>
							<select name='choix_auteur' class="form-control">
								<option value='0' selected></option>
					
									
									<?php foreach($donnees['auteur'] as $aut) { 
										if($aut['id_auteur']==$auteur_trace) {
										echo "<option value='".$aut['id_auteur']."' selected>".$aut['nom_auteur']." ".$aut['prenom_auteur']."</option>";} else {
										echo "<option value='".$aut['id_auteur']."'>".$aut['nom_auteur']." ".$aut['prenom_auteur']."</option>";}
									 } ?>
									
									
							</select>
						</div>
				</div>
				
				<div class="panel panel-info">
					<div class="panel-heading" onclick="affiche('pperiod')">Par périodique</div>
						<div class="panel-body" id='pperiod' style='text-align : right;display : <?php echo $period_dis; ?>'>
							<select name='choix_period' class="form-control">
								<option value='0' selected></option>
									
									<?php foreach($donnees['periodique'] as $ped) {

										if($ped['id_periodique']==$period_trace) {
										echo "<option value='".$ped['id_periodique']."' selected>".$ped['lib_periodique']."</option>";} else {echo "<option value='".$ped['id_periodique']."'>".$ped['lib_periodique']."</option>";}
									 } ?>
									
									
									
							</select>
						</div>
				</div>
				
				<div class="panel panel-info">
					<div class="panel-heading" onclick="affiche('pcoll')">Par collection</div>
						<div class="panel-body" id='pcoll' style='text-align : right;display : <?php echo $coll_dis; ?>'>
							<select name='choix_coll' class="form-control">
								<option value='0' selected></option>
			
									<?php foreach($donnees['collection'] as $col) {
										if($col['id_collection']==$coll_trace) {
										echo "<option value='".$col['id_collection']."' selected>".$col['lib_collection']."</option>";} else {echo "<option value='".$col['id_collection']."'>".$col['lib_collection']."</option>";}
									 } ?>
									
									
									
							</select>
						</div>
				</div>
				
				
			
			
				
				
				
			</form>
		</div>
		<div class="col-sm-9 pre-scrollable" id='resultats'> <!-- résultats -->
		
		
				<?php if($donnees['result']) {include 'resultat.php';}
			 //var_dump($donnees['result']); ?>
			
		</div>
	</div>
</div>

<script type="text/javascript">

function uncheck(x) {
	document.getElementById(x).checked = false;
}

function uncheckAll(x) {
	tableau_checkbox = document.getElementsByClassName(x);
	
	for (var i = 0; i < tableau_checkbox.length; i++){
            tableau_checkbox[i].checked = false;
        }
}

function controldate() {
	var datedeb = document.getElementById('date1').value;
	var datefin = document.getElementById('date2').value;
	if((datefin!='')&& (datedeb!='')){
			if(datedeb>datefin) {document.getElementById('date1').value = datefin;}
		} 
}

function affiche(panneau) {
	if (document.getElementById(panneau).style.display == "block")	{	document.getElementById(panneau).style.display= 'none';	}
	else {	document.getElementById(panneau).style.display= 'block';	}
}

function cls_mtclf(champ) {
	document.getElementById(champ).value = '';
}
</script>