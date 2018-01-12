<?php
class Consultation
{
	private $id;
	private $datex;
	private $user;
	private $document;
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id = $id;}
	
	public function getDatex(){return $this->datex;}
	public function setDatex($datex){$this->datex = $datex;}

	public function getUser(){return $this->user;}
	public function setUser($user){$this->user = $user;}

	public function getDoc(){return $this->doc;}
	public function setDoc($document){$this->doc = $document;}
	
	public function actualise($user,$id) {
		$connexionInstance = Connexion::getInstance();
		$sql = "INSERT INTO `consultation`(`date_consult`, `user_consult`, `doc_consult`) VALUES (NOW(),?,?)";
		return $connexionInstance->executer($sql,array($user, $id));
		
	}
	
	public function getByIdUser($user) {
		$connexionInstance = Connexion::getInstance();
		$sql = "SELECT `date_consult`, `titre_doc`, `id_doc` FROM `consultation` JOIN document ON `doc_consult` = `id_doc` WHERE `user_consult` =? GROUP BY `titre_doc` ORDER BY `date_consult`DESC";
		$recupere_etat = $connexionInstance->requeter($sql,array($user));
		return $recupere_etat;
		
	}
}
?>