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
						<div class="thumb" id="trumb_<?php echo $id?>">
						    <img height="100px" width="100px" id="<?php echo "pic_$id";?>" src="/controller/client/themes/bootstrap/img/<?php echo $pmenu["images"][0];?>" alt="<?php echo $pmenu["descr"];?>" />
						</div>
						<div class="data">
							<div><b><?php echo $pmenu["name"];?></b></div>
							<div><?php echo $pmenu["descr"];?></div>
							<div><b>Состав:</b>
							<?php
								$cnt=0;
								foreach ($pmenu["structure"] as $ids => $struc){
									echo $struc;
									$cnt++;
									if ($cnt!=count($pmenu["structure"])){echo ", ";};
								};
							?>
							</div>
							<div class="container-fluid">
								<div class="row">	    
								    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding-right: 0px;padding-left: 0px;">    
									<select id="weight_<?php echo $id?>" class="form-control">
									    <?php
										foreach ($pmenu["weight"] as $ids => $weight){
											echo "<option>$weight гр</option>";
										};									    
									    ?>
    								        </select>
									<div id="price" class="price">									    
									    300 <i class="fa fa-rub" aria-hidden="true"></i>
									  </div>
								    </div>    
								    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding-right: 0px;padding-left: 0px;">    
									<div  align="center" >										
										  <button type="button" onclick="OpenCart();" class="btn btn-default btn-sm form-control">Заказать</button>
										  <button type="button" onclick="AddToCart(<?php echo $id?>);"class="btn btn-info btn-sm form-control">В корзину</button>										
									</div>

								    </div>    
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
	</div>
</div>	
<div id="widjet_cart" class="widjet_cart">
    <img height="40px" width="40px" src="controller/client/themes/bootstrap/img/backet_empty.png" />
</div>
<div id="anim_picca" class="anim_picca">    
</div>

<div id="dialog-choise-cart" title="Содержимое корзины">    
    <div id="list_cart">
    </div>            
</div>
<script>
    $('.simple-list-grid').simpleListGrid({
	'state': 'grid'
    });
    function OpenCart(){        
        $("#list_cart").html("");
        $.get('index.php?route=/controller/server/list_cart.php&cart_ids=&cart_counts=', function( data ) {
            $("#list_cart").html(data);
            $("#dialog-choise-cart").dialog("open" );   
        });          
    };
</script>	 