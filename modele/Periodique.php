<?php
class Periodique
{
	private $id = null;
	private $libperiod;
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id = $id;}
	
	public function getLibperiod(){return $this->libperiod;}
	public function setLibperiod($libperiod){$this->libperiod = $libperiod;}
	
	public static function getAll(){
		$connexionInstance = Connexion::getInstance();
		$sql = 'SELECT `id_periodique`, `lib_periodique` FROM `periodique` ORDER BY `lib_periodique`';
		$recupere_tout = $connexionInstance->requeter($sql);
		return $recupere_tout;
	}
}
?>