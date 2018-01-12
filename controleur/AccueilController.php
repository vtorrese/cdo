<?php

class AccueilController extends BaseController
{
	public function accueil()
	{
		$fichier = "accueil";
		self::affiche_contenu(array('fichier' => $fichier));
	}
	
	public function affiche_contenu($donnees)
	{ //Page accueil		
		$fichier = $donnees['fichier'];
		include $this->pathVue.'page/header.php';
		extract($donnees);
		// Démarrage de la temporisation de sortie
		ob_start();
		include $this->pathVue.$fichier.".php";
		include $this->pathVue.'page/footer.php';

	}
	
	public function accueil_connect($id)
	{
		$fichier = "accueil";
		$user = Utilisateur::getById($id);
		self::affiche_contenu(array('fichier' => $fichier, 'user' => $user));
	}
	
	
	
}

?>