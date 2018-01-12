<!-- Affichage des résultats de la recherche -->

<h3><?php echo count($donnees['result']); ?> résultats</h3><hr>

	<?php 
	
	$iduser = $this->getSessionParam('id');
	

	$a=0;
	$control = 0;
	foreach($donnees['result'] as $itm) {
		
		if($itm['type_doc']!=$control) {
			$a=0;
			$control = $itm['type_doc'];
		} else {$a++;}
		$tab[$itm['type_doc']][$a] = ['idref' => $itm['id_doc'], 'titre' => $itm['titre_doc'], 'date' => $itm['date_doc']];	
	}

foreach($donnees['type'] as $cpt) {
	
	if($tab[$cpt['id_type']]!=null) { ?>
	
		<div class='tab_result'>
			<div class="table-responsive">
				<table class="table table-primary">
					<tr><span class='label_type'><?php echo $cpt['lib_type']." (".count($tab[$cpt['id_type']]).")"; ?></span></tr>
					<thead>
					  <tr>
						<th>Titre</th>
						<th>Date</th>
						<th></th>
					  </tr>
					</thead>
					<tbody>
				<?php
				foreach($tab[$cpt['id_type']] as $item) { ?>
					
						<tr>
							<td><?php echo $item['titre']; ?></td>
							<?php $date = substr($item['date'],8,2)."/".substr($item['date'],5,2)."/".substr($item['date'],0,4); ?>
							<td><?php echo $date; ?></td>
							
							<?php // gestion des rapports (ne peuvent être consultés que par user status 1 et 3)
								if($cpt['lib_type']=="Rapports") {
									
									if(($donnees['user'][0]['status_user']!=null)&&($donnees['user'][0]['status_user']!=2)) { ?>
										<td><button type="button" class="btn btn-primary" onclick='test(<?php echo $item['idref']; ?>,<?php echo $iduser; ?>)' data-toggle="modal" data-target="#fiche" >Voir</button></td>
								<?php	} else {
										echo "<td></td>";
									}
								} else { ?>
									<td><button type="button" class="btn btn-primary" onclick='test(<?php echo $item['idref']; ?>,<?php echo $iduser; ?>)' data-toggle="modal" data-target="#fiche" >Voir</button></td>
							<?php	}
							?>
							
							
							
						</tr>
					
					
				<?php }	?>	
					</tbody>
				</table>
			</div>
		</div>
	
<?php	}

}


?>

<!-- Modal présentation d'une fiche individuelle -->
<div id="fiche" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id='num_fiche'></h4>
      </div>
		<div class="modal-body">
        
			<div class="container-fluid">
				<div class="row">
					<div class="row">
						<div class="col-sm-12" id="fiche_statut"></div>
					</div><hr>
					<div class="col-sm-8" id="fiche_titre"></div>
					<div class="col-sm-4" id="fiche_image"></div>
				</div>
				<div class="row">
					<div class="col-md-7" id="fiche_resum"></div>
					<div class="col-md-5" id="fiche_ident"></div>
				</div>
				<div class="row">
					<div class="col-md-5 col-md-offset-7" id="fiche_ident_det"></div>
				</div>
				<div class="row">
					<div class="col-sm-12" id="fiche_mtclf"></div>
				</div>
				<hr>
				<div class="row" >
					<div class="col-sm-6 col-md-offset-6" id="fiche_info"> </div>
					 
				</div>
			</div>
		</div>
	</div>
		
    
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
    </div>
    </div>

 </div>


<script type="text/javascript">

function reserv(id,iduser) {
	$.ajax({
       url : '../controleur/reserv.php',
       type : 'GET', 
       data : {"id":id,"iduser":iduser}, 
       dataType : 'html',
	   success : function(data){
		   var message = data;
		document.getElementById('fiche_info').innerHTML = "<span class='label_item'>" + message + "</span>";
	   }
	
	}); 
	init_panneau(iduser); // pour actualiser la page
}

function test(id,iduser) {
	
	$.ajax({
       url : '../controleur/redirect.php',
       type : 'GET', 
       data : {"id":id,"iduser":iduser}, 
       dataType : 'html',
	   success : function(data){
	
	
	var obj = jQuery.parseJSON(data);

	/*Recuperation des items*/
	var notice = obj.fiche.id_not;
	var classification = obj.fiche.class_doc;
	var type = obj.fiche.type_doc;
	var libtype = obj.fiche.lib_type;
	
	var titre = "<span class='label_item'>Titre : </span>" + obj.fiche.titre_doc; // Titre
	
		//Sous-titre
	if(obj.fiche.sstitre_doc!=null) {var sstitre = "<br><span class='label_item'>Sous-titre : </span>" + obj.fiche.sstitre_doc;} else {var sstitre = '';}
	
		//Sommaire
	if(obj.fiche.somm_doc!=null) {var sommaire = "<br><span class='label_item'>Sommaire : </span>" + obj.fiche.somm_doc;} else {var sommaire = '';}
	
		//résumé
	if(obj.fiche.resum_doc!=null) {var resume = "<br><span class='label_item'>Résumé : </span>" + obj.fiche.resum_doc;} else {var resume = '';}
	
		//Auteurs
	if(obj.auteur!=false) {var auteur = "<br><span class='label_item'>Auteur(s) : </span>" + obj.auteur;} else {var auteur = '';}
	
		//Mot-clef
	if(obj.motclef!=false) {var motcl = "<br><span class='label_item'>Mot-clef(s) : </span>" + obj.motclef;} else {var motcl = '';}
	
		//Editeur
	if(obj.fiche.lib_edit!=null) {var editeur = "<br>Editeur : " + obj.fiche.lib_edit;} else {var editeur = '';}
	
		//Date de publication
	if(obj.fiche.date_doc!=null) {
		var dateref = obj.fiche.date_doc.substring(0,10).split("-");
		var datedef = dateref[2] + "/" + dateref[1] + "/" + dateref[0];
			
			if(obj.fiche.lieu_doc!=null) {var lieu_edition = " (" + obj.fiche.lieu_doc + ")";} else {var lieu_edition = '';}
		
		var date = "<br>Date de Publication : " + datedef + lieu_edition;
		} else {var date = '';}
		
		//ISBN
	if(obj.fiche.ISBN_doc!=null) {var ISBN = "<br>ISBN : " + obj.fiche.ISBN_doc;} else {var ISBN = '';}	
		//ISSN
	if(obj.fiche.ISSN_doc!=null) {var ISSN = "<br>ISSN : " + obj.fiche.ISSN_doc;} else {var ISSN = '';}
		//Niveau
	if(obj.fiche.niveau_doc!=null) {var niveau = "<br>Publics : " + obj.fiche.lib_niveau;} else {var niveau = '';}
		//Nb pages
	if(obj.fiche.page_doc!=null) {var page = obj.fiche.page_doc + " page(s)";} else {var page = '';}
		//Durée
	if(obj.fiche.duree_doc!=null) {var duree = "  Durée : " + obj.fiche.duree_doc + " (H:m:s)";} else {var duree = '';}
		//langues
	if(obj.fiche.lang_doc!=null) {
		var image = "image/lang" + obj.fiche.lib_lang + ".png";
		var langue = "  Langue : <img src='" + image + "' alt='" + obj.fiche.lib_lang + "'>";} 
	else {var langue = '';} 
		//liens url et pdf
	var controlien = false;
	if((obj.fiche.lien_doc!=0)&&(iduser!=null)) {
		var fichier = "fichiers/doc" + id + ".pdf";
		var lienPDF = "<a href='" + fichier + "' target='_blank'>Version PDF</a>  ";
		controlien = true;
		} else {var lienPDF = '';}
	
	if((obj.fiche.url_doc!=null)&&(iduser!=null)) {
		var lienURL = "<a href='" + obj.fiche.url_doc + "' target='_blank'>Version en ligne</a>  ";
		controlien = true;
		} else {var lienURL = '';}	
	
	if(controlien==true) {var liens = "<br>" + lienPDF + lienURL;} else {liens = '';}
	
		//image de couverture
	if(obj.fiche.image_doc!=0) {
		var imag = "image/couverture/couv" + obj.fiche.id_doc + ".jpg";
		var image_ref = "<img src='" + imag + "' alt='img n°" + obj.fiche.id_doc + "'>";} 
	else {var image_ref = '';} 
	
	
		//périodique collection et numero
		if(obj.fiche.period_doc!=null) {var periodique = "<br>" + obj.fiche.lib_periodique;} else {var periodique = '';}
		if(obj.fiche.coll_doc!=null) {var collection = " " + obj.fiche.lib_collection;} else {var collection = '';}
		if(obj.fiche.num_doc!=null) {var numero = " " + obj.fiche.num_doc;} else {var numero = '';}

	 //Si rapports
	 if(obj.fiche.lib_type=='Rapports') {
		if(obj.fiche.form_doc!=null) {var formation = "<br>" + obj.fiche.lib_formation;} else {var formation = '';}
		if(obj.fiche.promo_doc!=null) {var promotion = " " + obj.fiche.lib_promotion;} else {var collection = '';}
		if(obj.fiche.ent_doc!=null) {var entreprise = "<br>Entreprise : " + obj.fiche.ent_doc;} else {var entreprise = '';}
		if(obj.fiche.tuto_doc!=null) {var tuteur = "<br>Tuteur : " + obj.fiche.tuto_doc;} else {var tuteur = '';}
		
		var rapport = formation + promotion + entreprise + tuteur;
	 } else {var rapport = '';}
	 
	 //Statut
	 
	 
		//Boutons de réservation & Recupération nombre d'exemplaires
		if(iduser!=null) {
			var cpt = 0;
			var etatx = "";
			for(x in obj.exemplaire) {
				cpt++;
				if(obj.exemplaire[x].etat=="Non disponible") {
					etatx = etatx + "<br><span style='color : red;'><button type='button' class='btn btn-success btn-xs' onclick='reserv(" + obj.exemplaire[x].iddoc + "," + iduser + ")'>Réserver</button>  " + obj.exemplaire[x].etat + " jusqu'au " + obj.exemplaire[x].datex + " </span>"; } 
				else if 
					(obj.exemplaire[x].etat=="Réservé")
					{
					etatx = etatx + "<br><button type='button' class='btn btn-success btn-xs' onclick='reserv(" + obj.exemplaire[x].iddoc + "," + iduser + ")'>Réserver</button>  " + obj.exemplaire[x].etat + " depuis le " + obj.exemplaire[x].datex;
					}
				else if 
					(obj.exemplaire[x].etat=="En attente")
					{
					etatx = etatx + "<br>" + obj.exemplaire[x].etat + " depuis le " + obj.exemplaire[x].datex;
					}
				else 
					{
					etatx = etatx + "<br><button type='button' class='btn btn-success btn-xs' onclick='reserv(" + obj.exemplaire[x].iddoc + "," + iduser + ")'>Réserver</button>  " + obj.exemplaire[x].etat;
					}
			}
	
	 if(obj.fiche.localisation_doc!=null) {
		 var statut = "Localisation : " + obj.fiche.lib_site + "  <span style='float : right;'>Nb d'exemplaires : " + cpt + "</span>";
		 } else {var statut = '';}
	 document.getElementById('fiche_statut').innerHTML = statut + "<span style='font-size : x-small;'>" + etatx + "</span>";

	var reservation = "";
	} else {var reservation = '';}
	 
	/*Titre du modal*/
	document.getElementById('num_fiche').innerHTML = "<h4 class='label_type'>Fiche Détaillée</h4><h6>(Type : " + libtype + ")</h6>";
	
	/*Elements Body du modal*/
	document.getElementById('fiche_titre').innerHTML = titre + sstitre + auteur;
	document.getElementById('fiche_image').innerHTML = image_ref;
	document.getElementById('fiche_resum').innerHTML = "<span style='font-size : small'>" + sommaire + resume + "</span>";
	document.getElementById('fiche_ident').innerHTML = "<span style='font-size : small'>" + date +  rapport + periodique + collection + numero + editeur + ISBN + ISSN + "</span>";
	document.getElementById('fiche_ident_det').innerHTML = "<span style='font-size : x-small'>" + duree + page +  langue + niveau + liens + "</span>";
	document.getElementById('fiche_mtclf').innerHTML = motcl;
	document.getElementById('fiche_info').innerHTML = '';
	
	/*Footer du modal*/
	//alert(data);
	           },
			   
			   
		});

	init_panneau(iduser); // pour actualiser la page
}

</script>