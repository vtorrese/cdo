<?php
class Utilisateur
{
	private $id = null;
	private $login;
	private $mdp;
	private $statut;
	
	public function getId(){return $this->id;}
	public function setId($id){$this->id = $id;}
	
	public function getLogin(){return $this->login;}
	public function setLogin($login){$this->login = $login;}
	
	public function getMdp(){return $this->mdp;}
	public function setMdp($mdp){$this->mdp = $mdp;}

	public function getStatut(){return $this->statut;}
	public function setStatut($statut){$this->statut = $statut;}
	
	public static function getAllListe(){} // a voir
	
	
	public static function verifierLogin($login) {
		$connexionInstance = Connexion::getInstance();
		$sql = 'SELECT COUNT(*) as CPT FROM user WHERE mail_user=?';
		$controle_dblon = $connexionInstance->requeter($sql, array($login));
		return $controle_dblon;
	}
	
	
	public static function getById($id){
		$connexionInstance = Connexion::getInstance();
		$sql = 'SELECT `id_user`, `nom_user`, `prenom_user`, `adresse_user`, `CP_user`, `ville_user`, `phone_user`, `mail_user`, `status_user`, `site_user`, `civil_user`, `promo_user`, `form_user`, `lib_promotion`, `lib_formation`, `lib_site` FROM user LEFT join promotion ON promo_user = id_promotion LEFT join formation ON form_user = id_formation LEFT join site ON site_user = id_site WHERE id_user=?';
		$recupere_tout = $connexionInstance->requeter($sql, array($id));
		return $recupere_tout;
	}
	
	public static function getIdByLogin($login) {
		$connexionInstance = Connexion::getInstance();
		$sql = 'SELECT ID_user FROM user WHERE mail_user =?';
		$recupere_ID = $connexionInstance->requeter($sql, array($login));
		return $recupere_ID[0]['ID_user'];
	}
	
	public static function getByLoginMdp($login, $mdp) {

		$connexionInstance = Connexion::getInstance();
		$sql = 'SELECT mdp_user FROM user WHERE mail_user =?';
		$ouvrir_session = $connexionInstance->requeter($sql, array($login));
	
		if(count($ouvrir_session)>0) {
			if($mdp==($ouvrir_session[0]['mdp_user'])) {
		
				$cadenas = true;
			}
			else
			{
				$cadenas = false;
			}
		}
		else
		{
			$cadenas = false;
		}
		return $cadenas;
	}
	
	/*public static function insererUtilisateur($login, $mdp) {  pour rajouter un user
		$connexionInstance = Connexion::getInstance();
		$statut = 2;
		$sql = 'INSERT INTO user (login,mdpx,statut) VALUES (?,?,?)';
		$creer_utilisateur = $connexionInstance->requeter($sql, array($login,$mdp,$statut));
		return;
	}*/
    
	
	
}

?>