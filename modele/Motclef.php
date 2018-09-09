<?php
class Motclef
{
	private $id = null;
	private $libmotclef;
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id = $id;}
	
	public function getLibmotclef(){return $this->libmotclef;}
	public function setLibmotclef($libmotclef){$this->libmotclef = $libmotclef;}
	
	public static function getAll(){
		$connexionInstance = Connexion::getInstance();
		$sql = 'SELECT `id_motclef`, `lib_motclef` FROM `motclef` ORDER BY `lib_motclef`';
		$recupere_tout = $connexionInstance->requeter($sql);
		return $recupere_tout;
	}
	
	public function getBydocId($id) {
		$connexionInstance = Connexion::getInstance();
		$sql = "SELECT lib_motclef FROM `doc_motclef` JOIN motclef ON `motclef_docmotclef` = id_motclef WHERE `doc_docmotclef` =?";
		$recupere_motclef = $connexionInstance->requeter($sql,array($id));
		return $recupere_motclef;
	}
}