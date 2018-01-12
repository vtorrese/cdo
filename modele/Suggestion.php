<?php
class Suggestion
{
	private $id;
	private $document;
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id = $id;}
	
	public function getDoc(){return $this->doc;}
	public function setDoc($document){$this->doc = $document;}
	
	public static function getAll(){
		$connexionInstance = Connexion::getInstance();
		$sql = 'SELECT id_doc, titre_doc, sstitre_doc, lib_type, CONCAT(day(date_doc),"-",month(date_doc), "-", year(date_doc)) as datex, resum_doc FROM suggestion LEFT JOIN document ON `doc_suggest` = `id_doc` LEFT JOIN type ON type_doc = id_type';
		$recupere_tout_sugg = $connexionInstance->requeter($sql);
		return $recupere_tout_sugg;
	}
}