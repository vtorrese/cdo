<?php
class Editeur
{
	private $id = null;
	private $libedit;
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id = $id;}
	
	public function getLibedit(){return $this->libedit;}
	public function setLibedit($libedit){$this->libedit = $libedit;}
	
	public static function getAll(){
		$connexionInstance = Connexion::getInstance();
		$sql = 'SELECT `id_edit`, `lib_edit` FROM `edit` ORDER BY `lib_edit`';
		$recupere_tout = $connexionInstance->requeter($sql);
		return $recupere_tout;
	}
}