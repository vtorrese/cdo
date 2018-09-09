<?php

class ConsultationController extends BaseController
{
	public function afficheConsult($lot,$id)
	{
		//$sessions = Session::getSessions($id);
		$fichier = "consultation";
		$user = Utilisateur::getById($id);
		//la variable $lot permet de faire la distinction entre les écrans de consultation
		
		//on récupère les types, les auteurs, les périodiques, les collections et les mots-clés pour la recherche
		$type = Type::getAll();
		$auteur = Auteur::getAll();
		$periodique = Periodique::getAll();
		$collection = Collection::getAll();
		$motclef = Motclef::getAll();
		$suggestion = Suggestion::getAll();
		self::affiche_contenu(array('fichier' => $fichier, 'lot' => $lot,'user' => $user,'type' => $type,'auteur' => $auteur, 'periodique' => $periodique, 'collection' => $collection,'motclef' => $motclef, 'suggestion' => $suggestion));
	}
	
	public function affiche_contenu($donnees)
	{ 		
		$fichier = $donnees['fichier'];
		include $this->pathVue.'page/header.php';
		extract($donnees);
		// Démarrage de la temporisation de sortie
		ob_start();
		include $this->pathVue.$fichier.".php";
		include $this->pathVue.'page/footer.php';

	}
	
	public function afficheResult($tab_requete,$id)
	{ 
		$fichier = "consultation";
		$user = Utilisateur::getById($id);
		
		//on récupère les types, les auteurs, les périodiques, les collections et les mots-clés pour la recherche
		$type = Type::getAll();
		$auteur = Auteur::getAll();
		$periodique = Periodique::getAll();
		$collection = Collection::getAll();
		$motclef = Motclef::getAll();
		$result = Document::getSearch($tab_requete);
		$suggestion = Suggestion::getAll();
		self::affiche_contenu(array('fichier' => $fichier, 'lot' => 'Consulter le fond','user' => $user,'type' => $type,'auteur' => $auteur, 'periodique' => $periodique, 'collection' => $collection,'motclef' => $motclef, 'trace' => $tab_requete, 'result' => $result, 'suggestion' => $suggestion));

	}
	
	public function envoiMail($id,$demande) {
		$mail = Courrier::envoi_mail();
		
		//mise à jour pret_doc après demande de prolongation
		if($mail=="Votre message nous est bien parvenu ! Nous nous efforçons de vous répondre rapidement.") {
			Pret::metEnAttente($demande);
		}
		$fichier = "consultation";
		$user = Utilisateur::getById($id);
		//la variable $lot permet de faire la distinction entre les écrans de consultation
		
		//on récupère les types, les auteurs, les périodiques, les collections et les mots-clés pour la recherche
		$type = Type::getAll();
		$auteur = Auteur::getAll();
		$periodique = Periodique::getAll();
		$collection = Collection::getAll();
		$motclef = Motclef::getAll();
		$suggestion = Suggestion::getAll();
		self::affiche_contenu(array('fichier' => $fichier, 'lot' => 'Contactez-nous','user' => $user,'type' => $type,'auteur' => $auteur, 'periodique' => $periodique, 'collection' => $collection,'motclef' => $motclef, 'suggestion' => $suggestion, 'message_retour' => $mail));
	}
	
	
}

?>