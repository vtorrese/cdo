<?php
class Type
{
	private $id = null;
	private $libtype;
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id = $id;}
	
	public function getLibtype(){return $this->libtype;}
	public function setLibtype($libtype){$this->libtype = $libtype;}
	
	public static function getAll(){
		$connexionInstance = Connexion::getInstance();
		$sql = 'SELECT `id_type`, `lib_type` FROM `type`';
		$recupere_tout = $connexionInstance->requeter($sql);
		return $recupere_tout;
	}
}
?>