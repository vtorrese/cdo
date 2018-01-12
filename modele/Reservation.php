<?php
class Reservation
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
	
	public function controlDB($id,$iduser) {
		$connexionInstance = Connexion::getInstance();
		$sql = "SELECT COUNT(*) as controlDB FROM reservation where `doc_reserv` =? AND `user_reserv` =?";
		$control_db = $connexionInstance->requeter($sql,array($id,$iduser));
		return $control_db[0];
	}
	
	public function insertReserv($id,$iduser) {
		$control = self::controlDB($id,$iduser);
		if(intval($control['controlDB'])<1) {
			$connexionInstance = Connexion::getInstance();
			$sql = "INSERT INTO `reservation` (`date_reserv`, `user_reserv`, `doc_reserv`) VALUES (NOW(),?,?)";
			$connexionInstance->executer($sql,array($iduser, $id));
			$message = "Réservation bien enregistrée !";
		} else
		{
			$message = "Cette réservation existe déjà !";
			
		}
		
		return $message;
	}
	
	public function getByIdUser($user) {
		$connexionInstance = Connexion::getInstance();
		$sql = "SELECT `date_reserv`, `titre_doc`, `id_doc` FROM `reservation` JOIN document ON `doc_reserv` = `id_doc` WHERE `user_reserv` =? GROUP BY `titre_doc` ORDER BY `date_reserv`DESC";
		$recupere_etat = $connexionInstance->requeter($sql,array($user));
		return $recupere_etat;
		
	}
	
	public function annulReserv($id,$iduser) {
			$connexionInstance = Connexion::getInstance();
			$sql = "DELETE FROM `reservation` WHERE `doc_reserv` =? AND `user_reserv` =?";
			$connexionInstance->executer($sql,array($id, $iduser));
			return;
	}
	
}
?>