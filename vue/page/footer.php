
<div class='row' style='border : 1px solid black;margin-left : 0.5%;'>
	
	<div class='col-md-3' id='bandeau_footer'>

	<h2>Centre de ressources</h2>
	</div>
	<div class='col-md-9' >		
		<a href="#"><span class="label label-info">CFAI84</span></a> 
		<a href="#"><span class="label label-info">AFPI84</span></a> 
		| <?php if($donnees['user']!=null) {
			echo "Connecté";?>
			<a href="#" onclick='efface("information_user")'><span class="label label-primary">PROFIL<span class="glyphicon glyphicon-resize-vertical"></span></span></a> 
			<?php } else {
				echo "Non Connecté";
				}
		?>
		| <?php echo "Date : ".date('d-m-Y');
		?>
		| 
	</div>
	
</div>

		<!--jquery -->
		<script src="lib/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
		
		<!-- Bootstrap js -->
		<script src="lib/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>


</body>
</html>
