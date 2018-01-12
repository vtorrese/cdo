

 <div class="container">
        <div class="row">
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php for($x=0;$x<count($donnees['suggestion']);$x++) { ?>
				<div class="panel_sug col-lg-4 col-md-4 col-sm-4 col-xs-6 pre-scrollable">
					<div class="row">	
						<div class="col-xs-8">
							<span class='label_item'><?php echo $donnees['suggestion'][$x]['titre_doc']; ?></span>
							<span class="badge"><?php echo $donnees['suggestion'][$x]['lib_type']; ?></span>
							<span style="font-size : small;color : orange;"><?php echo $donnees['suggestion'][$x]['datex']; ?></span>
							<br><span style="font-size : small"><?php echo $donnees['suggestion'][$x]['sstitre_doc']; ?></span>
							<br><span style="font-size : x-small;text-align : justify;"><?php echo $donnees['suggestion'][$x]['resum_doc']; ?></span>
							
						</div>
						<div class="col-xs-4">
							<?php 
								$image = "image/couverture/couv".$donnees['suggestion'][$x]['id_doc'].".jpg";
								if(file_exists($image)) {
									echo "<img src='".$image."' alt='image'>";
								}
							?>
						</div>
						
						
					</div>
				</div>
				<?php } ?>
			</div>
			
		</div>
</div>