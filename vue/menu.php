<!-- MENU vertical du site CDO --->


<div class="row" >
  <div class="col-sm-2" >
    <div class="sidebar-nav">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="visible-xs navbar-brand"></span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse" id='menu'>
          <ul class="nav navbar-nav">
		  
			<!-- ss-menu dynamique de connexion/deconnexion -->
			<?php if($_SESSION) { ?>
			<form method="POST" action="<?php echo $this->getServerParam('PHP_SELF') ?>?page=deconnexion">
				<li><input class = "myButton" name='btn_gene' type="submit" value="Déconnexion" ></li>
			</form>
			<?php }
			else
			{ ?>
			<form method="POST" action="<?php echo $this->getServerParam('PHP_SELF') ?>?page=ouvrirLogin">
				<li><input class="myInput" type="text" name="login" placeholder="Mail" required></li>
				<li><input class="myInput" type="password" name="motdepasse" placeholder="Mot de passe" required></li>
				<li><input class = "myButton" name='btn_gene' type="submit" value="Se connecter" ></li>
			</form>
			<?php } ?>
			
			
			<hr>
			
			
			
			
			<form method="POST" action="<?php echo $this->getServerParam('PHP_SELF') ?>?page=ouvrirMenu">
				<li><input class = "myButton" name='btn_gene' type="submit" value="Nouveautés" ></li>
				<li><input class = "myButton" name='btn_gene' type="submit" value="Consulter le fond" ></li>
				<li><input class = "myButton" name='btn_gene' type="submit" value="Centre de Ressources" ></li>
				<li><input class = "myButton" name='btn_mail' type="submit" value="Contacter par mail" ></li>
			</form>

			<hr>
			
			<div class='panel panel-default'>
				<div class="panel-heading">Horaires d'ouverture</div>
					<div class='panel_body'>
						<span style="font-weight : bold;color :var(--ma-couleur)">Du lundi au jeudi</span>
							<ul>
								<li><span style="font-size : small;">de 8h30-11h30</span></li>
								<li><span style="font-size : small;">à 12h30-17h30</span></li>
							</ul>
						<span style="font-weight : bold;color :var(--ma-couleur)">Le vendredi</span>
							<ul>
								<li><span style="font-size : small;">de 8h30-12h30</span></li>
								<li><span style="font-size : small;">à 13h30-16h30</span></li>
							</ul>
					</div>
			</div>

				<li><a href='http://www.formation-technologique.fr/' target='_blank'><img class='img-responsive' src="image/CFAI-84.jpg" alt='Logo CFAI'></a></li>-->
          </ul>			
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
