<?php
class Auteur
{
	private $id = null;
	private $nom;
	private $prenom;
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id = $id;}
	
	public function getNom(){return $this->libnom;}
	public function setNom($nom){$this->libnom = $nom;}
	
	public function getPrenom(){return $this->libprenom;}
	public function setPrenom($prenom){$this->libprenom = $prenom;}
	
	public static function getAll(){
		$connexionInstance = Connexion::getInstance();
		$sql = 'SELECT `id_auteur`, `nom_auteur`, `prenom_auteur` FROM `auteur` ORDER BY `nom_auteur`';
		$recupere_tout = $connexionInstance->requeter($sql);
		return $recupere_tout;
	}
	
	public function getBydocId($id) {
		$connexionInstance = Connexion::getInstance();
		$sql = "SELECT nom_auteur, prenom_auteur FROM `doc_auteur` JOIN auteur ON `auteur_docauteur` = id_auteur WHERE `doc_docauteur` =?";
		$recupere_auteur = $connexionInstance->requeter($sql,array($id));
		return $recupere_auteur;
	}
}
?>