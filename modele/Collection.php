<?php
class Collection
{
	private $id = null;
	private $libcoll;
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id = $id;}
	
	public function getLibcoll(){return $this->libcoll;}
	public function setLibcoll($libcoll){$this->libcoll = $libcoll;}
	
	public static function getAll(){
		$connexionInstance = Connexion::getInstance();
		$sql = 'SELECT `id_collection`, `lib_collection` FROM `collection` ORDER BY `lib_collection`';
		$recupere_tout = $connexionInstance->requeter($sql);
		return $recupere_tout;
	}
}
?>