<?php
class Pret
{
	private $id;
	private $dateS;
	private $dateR;
	private $user;
	private $site;
	private $status;
	private $document;
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id = $id;}
	
	public function getdateS(){return $this->dateS;}
	public function setdateS($dateS){$this->dateS = $dateS;}
	
	public function getdateR(){return $this->dateR;}
	public function setdateR($dateR){$this->dateR = $dateR;}
	
	public function getUser(){return $this->user;}
	public function setUser($user){$this->user = $user;}
	
	public function getSite(){return $this->site;}
	public function setSite($site){$this->site = $site;}
	
	public function getStatus(){return $this->status;}
	public function setStatus($status){$this->status = $status;}
	
	public function getDoc(){return $this->doc;}
	public function setDoc($document){$this->doc = $document;}
	
	public function getByIdUser($user) {
		$connexionInstance = Connexion::getInstance();
		$sql = "SELECT `id_prt`, `dateS_prt`, `dateR_prt`, `site_prt`, `status_prt`, `id_doc`, `titre_doc`, `lib_stat_prt` FROM `pret` JOIN document ON `doc_prt` = `id_doc` JOIN status_prt ON `status_prt` = id_stat_prt WHERE `user_prt`=?  AND `status_prt` NOT IN ('2') ORDER BY `dateR_prt`";
		$recupere_pret = $connexionInstance->requeter($sql,array($user));
		return $recupere_pret;
		
	}
	
	public function metEnAttente($demande) {
		$connexionInstance = Connexion::getInstance();
		$sql = "UPDATE `pret` SET `status_prt` = '3' WHERE `id_prt` = ?";
		$connexionInstance->executer($sql,array($demande));
		return;
	}
	
	
}
?>