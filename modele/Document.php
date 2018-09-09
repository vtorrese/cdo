<?php
class Document
{
	private $id;
	private $notice;
	private $classification;
	private $type;
	private $titre;
	private $sstitre;
	private $periodique;
	private $form;
	private $promo;
	private $entreprise;
	private $tutorat;
	private $editeur;
	private $datex;
	private $lieu;
	private $mention;
	private $collection;
	private $numero;
	private $isbn;
	private $issn;
	private $lang;
	private $dateP;
	private $niveau;
	private $page;
	private $duree;
	private $collation;
	private $somm;
	private $resum;
	private $lien;
	private $image;
	private $url;
	private $control;
	private $localisation;
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id = $id;}
	
	public function getNotice(){return $this->notice;}
	public function setNotice($notice){$this->notice = $notice;}

	public function getClassification(){return $this->classification;}
	public function setClassification($classification){$this->classification = $classification;}

	public function getTypedoc(){return $this->type;}
	public function setTypedoc($type){$this->type = $type;}

	public function getTitre(){return $this->titre;}
	public function setTitre($titre){$this->titre = $titre;}
	
	public function getSstitre(){return $this->sstitre;}
	public function setSstitre($sstitre){$this->sstitre = $sstitre;}

	public function getPeriod(){return $this->period;}
	public function setPeriod($period){$this->period = $period;}
	
	public function getForm(){return $this->form;}
	public function setForm($form){$this->form = $form;}

	public function getPromo(){return $this->promo;}
	public function setPromo($promo){$this->promo = $promo;}

	public function getEntreprise(){return $this->entreprise;}
	public function setEntreprise($entreprise){$this->entreprise = $entreprise;}

	public function getTutorat(){return $this->tutorat;}
	public function setTutorat($tutorat){$this->tutorat = $tutorat;}

	public function getEditeur(){return $this->editeur;}
	public function setEditeur($editeur){$this->editeur = $editeur;}	
	
	public function getDatex(){return $this->datex;}
	public function setDatex($datex){$this->datex = $datex;}

	public function getLieu(){return $this->lieu;}
	public function setLieu($lieu){$this->lieu = $lieu;}
	
	public function getMention(){return $this->mention;}
	public function setMention($mention){$this->mention = $mention;}

	public function getCollection(){return $this->collection;}
	public function setCollection($collection){$this->collection = $collection;}	

	public function getNumero(){return $this->numero;}
	public function setNumero($numero){$this->numero = $numero;}	
	
	public function getIsbn(){return $this->isbn;}
	public function setIsbn($isbn){$this->isbn = $isbn;}

	public function getIssn(){return $this->issn;}
	public function setIssn($issn){$this->issn = $issn;}	

	public function getLang(){return $this->lang;}
	public function setLang($lang){$this->lang = $lang;}

	public function getDateP(){return $this->dateP;}
	public function setDateP($dateP){$this->dateP = $dateP;}

	public function getNiveau(){return $this->niveau;}
	public function setNiveau($niveau){$this->niveau = $niveau;}

	public function getPage(){return $this->page;}
	public function setPage($page){$this->page = $page;}

	public function getDuree(){return $this->duree;}
	public function setDuree($duree){$this->duree = $duree;}

	public function getCollation(){return $this->collation;}
	public function setCollation($collation){$this->collation = $collation;}
	
	public function getSomm(){return $this->somm;}
	public function setSomm($somm){$this->somm = $somm;}
	
	public function getResum(){return $this->resum;}
	public function setResum($resum){$this->resum = $resum;}

	public function getLien(){return $this->lien;}
	public function setLien($lien){$this->lien = $lien;}

	public function getImage(){return $this->image;}
	public function setImage($image){$this->image = $image;}

	public function getUrl(){return $this->url;}
	public function setUrl($url){$this->url = $url;}

	public function getControl(){return $this->control;}
	public function setControl($control){$this->control = $control;}

	public function getLocalisation(){return $this->localisation;}
	public function setLocalisation($localisation){$this->localisation = $localisation;}
	
	public function getFiche($id) {
		$connexionInstance = Connexion::getInstance();
		$sql = 'SELECT `id_doc`, `id_not`, `class_doc`, `type_doc`, `lib_type`, `titre_doc`, `sstitre_doc`, `period_doc`, `lib_periodique`, `form_doc`,`lib_formation`, `promo_doc`, `lib_promotion`, `ent_doc`, `tuto_doc`, `edit_doc`, `lib_edit`, `date_doc`, `lieu_doc`, `mention_doc`, `coll_doc`, `lib_collection`, `num_doc`, `ISBN_doc`, `ISSN_doc`, `lang_doc`, `lib_lang`, `dateP_doc`, `niveau_doc`,`lib_niveau`, `page_doc`, `duree_doc`, `collation_doc`, `somm_doc`, `resum_doc`, `lien_doc`, `image_doc`, `url_doc`, `control_doc`, `localisation_doc`, `lib_site` FROM `document` LEFT JOIN type ON type_doc = id_type LEFT JOIN periodique ON period_doc = id_periodique LEFT JOIN collection ON coll_doc = id_collection LEFT JOIN formation ON form_doc = id_formation LEFT JOIN promotion ON promo_doc = id_promotion LEFT JOIN editeur ON edit_doc = id_edit LEFT JOIN langue ON lang_doc = id_lang LEFT JOIN niveau ON niveau_doc = id_niveau LEFT JOIN site ON localisation_doc = id_site WHERE `id_doc` =?';
		$recupere_fiche = $connexionInstance->requeter($sql,array($id));
		return $recupere_fiche;
	}
	
	public function getExemplaire($id) {
		$connexionInstance = Connexion::getInstance();
		$sql = "SELECT COUNT(*) as exemplaire FROM document WHERE titre_doc IN (SELECT titre_doc FROM `document` WHERE id_doc=?)";
		$recupere_exemplaire = $connexionInstance->requeter($sql,array($id));
		return $recupere_exemplaire;
	}
	
	public function getEtatDoc($id) {
		$connexionInstance = Connexion::getInstance();

		$sql = "SELECT * FROM (SELECT `id_doc` as iddoc, 'Réservé' as etat, CONCAT(day(date_reserv),'-',month(date_reserv),'-',year(date_reserv)) as datex FROM document JOIN reservation ON `id_doc` = `doc_reserv` WHERE `titre_doc` = (SELECT titre_doc FROM document WHERE `id_doc`=?) UNION SELECT `id_doc` as iddoc, case when lib_stat_prt is null then 'Disponible' else lib_stat_prt end AS etat, CONCAT(day(dateR_prt),'-',month(dateR_prt),'-',year(dateR_prt)) AS datex FROM document LEFT JOIN pret ON `id_doc` = `doc_prt` LEFT JOIN status_prt ON status_prt = id_stat_prt WHERE `titre_doc` = (SELECT titre_doc FROM document WHERE `id_doc`=?)) REQ_1 GROUP BY iddoc ORDER BY etat";

		$recupere_etat = $connexionInstance->requeter($sql,array($id,$id));
		
		return $recupere_etat;
	}

	public function getSearch($tab_requete) {
		
		$connexionInstance = Connexion::getInstance();
		list($type_r,$terme_r,$motclef_r,$date1_r,$date2_r,$auteur_r,$period_r,$coll_r) = $tab_requete;
		
		$condition = false;
		
		$sql="SELECT `id_doc`, `id_not`, `class_doc`, `type_doc`, `titre_doc`, `sstitre_doc`, `period_doc`, `form_doc`, `promo_doc`, `ent_doc`, `tuto_doc`, `edit_doc`, `date_doc`, `lieu_doc`, `mention_doc`, `coll_doc`, `num_doc`, `ISBN_doc`, `ISSN_doc`, `lang_doc`, `dateP_doc`, `niveau_doc`, `page_doc`, `duree_doc`, `collation_doc`, `somm_doc`, `resum_doc`, `lien_doc`, `image_doc`, `url_doc`, `control_doc`, `localisation_doc`
		FROM `document` ";
		
		if(intval($motclef_r)>0) {
			$jointure_mt = 'JOIN doc_motclef ON `id_doc` = doc_docmotclef ';
		}
		
		if(intval($auteur_r)>0) {
			$jointure_au = 'JOIN doc_auteur ON `id_doc` = doc_docauteur ';
		}

		
		$sql = $sql.$jointure_mt.$jointure_au;
		
		 // selection du type de document //faudra prévoir gestion des droits d'accès !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$selection = "";
		foreach($type_r as $typ) {
				$selection .= ",'".$typ['id_type']."'";
			}
		$selection = substr($selection,1);
		if($selection!="'0'") {
			$reqtype=" WHERE `type_doc` IN (".$selection.")";
			$condition =true;
			}
				
		$sql = $sql.$reqtype;
		if($condition) {$reql = ' AND ';} else {$reql = ' WHERE ';}
		
		
		if($terme_r!="") { // selection par terme sur le titre, sous-titre, resumé et sommaire
			
			$reqterme = $reql."`titre_doc` LIKE '%".$terme_r."%' OR `sstitre_doc` LIKE '%".$terme_r."%' OR `somm_doc` LIKE '%".$terme_r."%' OR `resum_doc` LIKE '%".$terme_r."%' ";
			$condition =true;			
			}
		
		$sql = $sql.$reqterme;
		if($condition) {$reql = ' AND ';} else {$reql = ' WHERE ';}
		
		if(intval($motclef_r)>0) { // selection par mot-clef
			$reqmotclef = $reql."motclef_docmotclef = '".$motclef_r."' ";
			$condition =true;
		}
		
		$sql = $sql.$reqmotclef;
		if($condition) {$reql = ' AND ';} else {$reql = ' WHERE ';}
		
		if((strlen($date1_r)>1)||(strlen($date2_r)>1)) { // selection par dates
			if(strlen($date1_r)>1) {$date1 = strtotime($date1_r);$db = date('Y-m-d',$date1);$req_datd = "date_doc >= '".$db."' ";} else {$req_datd = "";}
			if(strlen($date2_r)>1) {$date2 = strtotime($date2_r);$df = date('Y-m-d',$date2);$req_datf = "date_doc <= '".$df."' ";} else {$req_datf = "";}
			if(($req_datd!="")&&($req_datf!="")) {
				$reqdate = $reql.$req_datd." AND ".$req_datf;
			} else {$reqdate = $reql.$req_datd.$req_datf;}
			$condition =true;
		}
		
		$sql = $sql.$reqdate;
		if($condition) {$reql = ' AND ';} else {$reql = ' WHERE ';}
		
		if(intval($auteur_r)>0) { // selection par auteur
			$reqauteur = $reql."auteur_docauteur = '".$auteur_r."' ";
			$condition =true;
		}
		
		$sql = $sql.$reqauteur;
		if($condition) {$reql = ' AND ';} else {$reql = ' WHERE ';}
		
		
		if(intval($period_r)>0) { // selection par périodique
			$reqperiod = $reql."period_doc = '".$period_r."' ";
			$condition =true;
		}
		
		$sql = $sql.$reqperiod;
		if($condition) {$reql = ' AND ';} else {$reql = ' WHERE ';}
		
		if(intval($coll_r)>0) { // selection par collection
			$reqcoll = $reql."coll_doc = '".$coll_r."' ";
		}
		
		$sql = $sql.$reqcoll." GROUP BY titre_doc ORDER BY type_doc, date_doc DESC";

		$recupere_search = $connexionInstance->requeter($sql);
		return $recupere_search;
	}

	
}