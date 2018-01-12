<?php
//Controleur principal -> redirige vers la page autorisée
class MainController extends BaseController
{
	
    public function dispatch()
    {
 	
		if($this->getSessionParam('estAutenthifie') === null || $this->getSessionParam('estAutenthifie') === false)
        { // Non connecté
            if($this->getGetParam('page') === null) // page d'accueil sans connexion
            {
				$accueilController = new AccueilController();
				$accueilController->accueil();
            }
			else if($this->getGetParam('page') === 'ouvrirLogin') // bouton pour se connecter
            { 
				if($_POST['btn_gene']=='Se connecter') {
					$authentificationController = new AuthentificationController();
					$authentificationController->traitementLogin();
				}
			}
			else if ($this->getGetParam('page') === 'ouvrirMenu') // bouton de nouveautés
			{
				if(isset($_POST['btn_gene'])) {
					
					$consultationController = new ConsultationController();
					$consultationController->afficheConsult($_POST['btn_gene']);
				}
				if(isset($_POST['btn_mail'])) {
					$consultationController = new ConsultationController();
					$consultationController->afficheConsult('Contactez-nous');
				}
				if(isset($_POST['envoimail'])) {
					$consultationController = new ConsultationController();
					$consultationController->envoiMail();
				}
			}
			else if ($this->getGetParam('page') === 'recherche') // bouton de recherche
			{
				if(isset($_POST['btn_gene'])) {
					
					$tab_requete = array();
					if(isset($_POST['tabtype'])) {array_push($tab_requete,$_POST['tabtype']);} else {$this->redirect('index.php?erreur=2');}
					if(isset($_POST['terme'])) {array_push($tab_requete,$_POST['terme']);}
					if(isset($_POST['choix_motclef'])) {array_push($tab_requete,$_POST['choix_motclef']);}
					if(isset($_POST['date1'])) {array_push($tab_requete,$_POST['date1']);}
					if(isset($_POST['date2'])) {array_push($tab_requete,$_POST['date2']);}
					if(isset($_POST['choix_auteur'])) {array_push($tab_requete,$_POST['choix_auteur']);}
					if(isset($_POST['choix_period'])) {array_push($tab_requete,$_POST['choix_period']);}
					if(isset($_POST['choix_coll'])) {array_push($tab_requete,$_POST['choix_coll']);}
					$consultationController = new ConsultationController();
					$consultationController->afficheResult($tab_requete);
				}
				if(isset($_POST['refresh'])) {
					$consultationController = new ConsultationController();
					$consultationController->afficheConsult('Consulter le fond');
				}

			}

			
		}
		else
        { // Connecté 
	
			if ($this->getGetParam('page') === 'ouvrirMenu') // bouton de nouveautés
			{
				if(isset($_POST['btn_gene'])) {
					
					$consultationController = new ConsultationController();
					$id = $this->getSessionParam('id');
					$consultationController->afficheConsult($_POST['btn_gene'],$id);
				}
				if(isset($_POST['btn_mail'])) {
					$consultationController = new ConsultationController();
					$id = $this->getSessionParam('id');
					$consultationController->afficheConsult('Contactez-nous',$id);
				}
				if(isset($_POST['envoimail'])) {
					$consultationController = new ConsultationController();
					$id = $this->getSessionParam('id');
					$demande = $_POST['demande_pro'];
					$consultationController->envoiMail($id,$demande);
				}
			}
			else if ($this->getGetParam('page') === 'recherche') // bouton de recherche
			{
				if(isset($_POST['btn_gene'])) {
					
					$tab_requete = array();
					if(isset($_POST['tabtype'])) {array_push($tab_requete,$_POST['tabtype']);} else {$this->redirect('index.php?erreur=2');}
					if(isset($_POST['terme'])) {array_push($tab_requete,$_POST['terme']);}
					if(isset($_POST['choix_motclef'])) {array_push($tab_requete,$_POST['choix_motclef']);}
					if(isset($_POST['date1'])) {array_push($tab_requete,$_POST['date1']);}
					if(isset($_POST['date2'])) {array_push($tab_requete,$_POST['date2']);}
					if(isset($_POST['choix_auteur'])) {array_push($tab_requete,$_POST['choix_auteur']);}
					if(isset($_POST['choix_period'])) {array_push($tab_requete,$_POST['choix_period']);}
					if(isset($_POST['choix_coll'])) {array_push($tab_requete,$_POST['choix_coll']);}
					$consultationController = new ConsultationController();
					$id = $this->getSessionParam('id');
					$consultationController->afficheResult($tab_requete,$id);
				}
				if(isset($_POST['refresh'])) {
					$consultationController = new ConsultationController();
					$id = $this->getSessionParam('id');
					$consultationController->afficheConsult('Consulter le fond',$id);
				}

			}
			else if ($this->getGetParam('page') === 'deconnexion')
				{
					$authentificationController = new AuthentificationController();
					$authentificationController->logout();
				}
			else
			{
			$accueilControleur = new AccueilController();
			$id = $this->getSessionParam('id');
			$accueilControleur->accueil_connect($id);
			}
	
			/*if($this->getGetParam('page') === null)
            {
				 if(intval($this->getSessionParam('statut')) === 1)
                {  //L'utilisateur est administrateur
					$accueilControleur = new AccueilController();
					$id = $this->getSessionParam('id');
					$accueilControleur->accueil_connect($id);
                }
				
				if(intval($this->getSessionParam('statut')) === 2)
                {  //L'utilisateur est utilisateur
					$accueilControleur = new AccueilController();
					$id = $this->getSessionParam('id');
					$accueilControleur->accueil_connect($id);
                }
				
			} */// statut
			

	
		} // Si connecté
	} // Function Dispatch()
	
} // Class MainController

?>