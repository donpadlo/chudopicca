<div class="container-fluid">
	<div class="row">	    
		<div class="simple-list-grid">
			<ul class="list-grid-ul">
			<?php
			 foreach ($menu as $id => $pmenu){
				 if ($pmenu["type"]=="main"){
					 ?>
					<li>
						<div class="thumb">
							<img src="controller/client/themes/bootstrap/img/<?php echo $pmenu["images"][0];?>" alt="<?php echo $pmenu["descr"];?>" />
						</div>
						<div class="data">
							<div><b><?php echo $pmenu["name"];?></b></div>
							<div><?php echo $pmenu["descr"];?></div>
							<div><b>Состав:</b>
							<?php
								$cnt=0;
								foreach ($pmenu["structure"] as $id => $struc){
									echo $struc;
									$cnt++;
									if ($cnt!=count($pmenu["structure"])){echo ", ";};
								};
							?>
							</div>
							<div  align="center" >
								<div align="center" class="btn-group-vertical">
								  <button type="button" class="btn btn-default">Оформить заказ</button>
								  <button type="button" class="btn btn-info">Положить в корзину</button>
								</div>
							</div>
						</div>
					</li>
				<?php
				 };
			 };    
			?>				
			</ul>
		</div>
	    <script>
			$('.simple-list-grid').simpleListGrid({
			    'state': 'grid'
			});
		</script>
	    
	    
	    
	</div>
</div>	