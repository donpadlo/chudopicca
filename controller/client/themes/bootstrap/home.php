<div class="container-fluid">
	<div class="row">	    
	    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10" style="padding-right: 0px;padding-left: 0px;">    
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
	</div>
	    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2" style="padding-right: 0px;padding-left: 0px;">    
		<div id="vk_widget"></div>
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>
		<script>
		    function VK_Widget_Init(){
			document.getElementById('vk_widget').innerHTML = '<div id="vk_groups"></div>';
			VK.Widgets.Group("vk_groups", {mode: 0, width: "auto", height: "400"}, 128460609);
		    };
		    window.addEventListener('load', VK_Widget_Init, false);
		    window.addEventListener('resize', VK_Widget_Init, false);
		</script>		
		<div id="vk_widget1"></div>
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>
		<script>
		    function VK_Widget_Init(){
			document.getElementById('vk_widget1').innerHTML = '<div id="vk_groups1"></div>';
			VK.Widgets.Group("vk_groups1", {mode: 4, width: "auto", height: "400"}, 128460609);
		    };
		    window.addEventListener('load', VK_Widget_Init, false);
		    window.addEventListener('resize', VK_Widget_Init, false);
		</script>		

	    </div>
	    <script>
			$('.simple-list-grid').simpleListGrid({
			    'state': 'grid'
			});
	    </script>	    	    
	</div>
</div>	