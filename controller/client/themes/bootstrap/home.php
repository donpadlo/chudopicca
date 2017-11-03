<div class="container-fluid">
	<div class="row">	    
	    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10" style="padding-right: 0px;padding-left: 0px;">    
		<div class="simple-list-grid">
		    <div id="masha_set" class="masha_set"></div>
			<div id="ggpay"  style="display: none;	height: 80px;width: 100px;left: 110px;top: -14px;position: absolute;z-index: 1;">
			<a  href="https://play.google.com/store/apps/details?id=xn__p1ai.xn__80ahmxfvzac.chudo&hl=ru">
			  <img alt="гуглплэй" title="Закажите через приложение и участвуйте в акциях!" src="/controller/client/themes/bootstrap/img/googleplay.png">
			</a>
			</div>			
			<ul class="list-grid-ul">
			<?php
			 foreach ($menu as $id => $pmenu){
				 if ($pmenu["type"]=="main"){				     
					 ?>
					<li class="picca_li">
						<div class="titlepicca"><b><?php echo $pmenu["name"];?></b></div>
									  <div id="price_<?php echo $id?>" class="price">									    
									    <?php echo $pmenu["cost"][0]; ?> <i class="fa fa-rub" aria-hidden="true"></i>
									  </div>									    						
						<div class="thumb" id="trumb_<?php echo $id?>">
						    <img  width="100" id="<?php echo "pic_$id";?>" src="/controller/client/themes/bootstrap/images/<?php echo $pmenu["images"][0];?>" alt="<?php echo $pmenu["descr"];?>" />
						</div>
						<div class="data piccadescr">							
							<div><?php echo $pmenu["descr"];?></div>							
							<?php
								$cnt=0;
								$sostav="";
								$ressost="";
								foreach ($pmenu["structure"] as $ids => $struc){
									$sostav=$sostav.$struc;
									$cnt++;
									if ($cnt!=count($pmenu["structure"])){$sostav=$sostav.", ";};
								};
								$sostav=trim($sostav);
								$fullsostav=$sostav;
								if (strlen($sostav)>=50){$sostav=mb_substr($sostav,0,50);$sostav=$sostav."..";};
								$ressost=$ressost. "<i class='popshow' id='pop$id' data-toggle='popover' data-placement='top' data-content='$fullsostav'>$sostav</i>";
								$ressost=$ressost. "<script>$('#pop$id').popover();</script>";
								if ($sostav!=""){
								    echo "<div><b>Состав:</b>$ressost</div>";
								};
							?>							
							<div class="container-fluid">
								<div class="row">	    
								    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-right: 0px;padding-left: 0px;">    										
											<select onchange="ChangeWeight(<?php echo $id?>)" id="weight_<?php echo $id?>" class="form-control">
											    <?php
												foreach ($pmenu["weight"] as $ids => $weight){
												if ($weight>0){
													echo "<option title='$weight' value='$weight'>$weight гр</option>";
												}
													else {
													    echo "<option title='$weight' value=$weight>$weight</option>";
													};
												};									    
											    ?>
											</select>
											<select id="sous_<?php echo $id?>" class="form-control">
											    <?php
												foreach ($pmenu["sous"] as $ids => $sousname){
													echo "<option title='$sousname' value='$sousname'>$sousname</option>";
												};									    
											    ?>										    
											</select>										    
									     
									  <input type="hidden" id = "cost_<?php echo $id?>" value="<?php echo $pmenu["cost"][0]; ?>">
								    </div>    
								    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-right: 0px;padding-left: 0px;">    
									<div style="align:center;" >										
										  <button type="button" onclick="AddToCart(<?php echo $id?>);OpenCart();" class="btn btn-default btn-sm form-control">Заказать</button>
										  <button type="button" onclick="AddToCart(<?php echo $id?>);" class="btn btn-info btn-sm form-control">В корзину</button>										
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
		<div id="vk_widget"><div style="align:center;"><h2>Идет загрузка страницы..</h2></div></div>
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>
		<script>
		    function VK_Widget_Init(){
			document.getElementById('vk_widget').innerHTML = '<div id="vk_groups"></div>';
			VK.Widgets.Group("vk_groups", {mode: 0, width: "auto", height: "400"}, 155678039);
		    };
		    window.addEventListener('load', VK_Widget_Init, false);
		    window.addEventListener('resize', VK_Widget_Init, false);
		</script>		
		<div id="vk_widget1"><div style="align:center;"><h2>Идет загрузка страницы..</h2></div></div>
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>
		<script>
		    function VK_Widget_Init(){
			document.getElementById('vk_widget1').innerHTML = '<div id="vk_groups1"></div>';
			VK.Widgets.Group("vk_groups1", {mode: 4, width: "auto", height: "400"}, 155678039);
		    };
		    window.addEventListener('load', VK_Widget_Init, false);
		    window.addEventListener('resize', VK_Widget_Init, false);
		</script>
	    <!-- Rating@Mail.ru logo -->
	    <a href="https://top.mail.ru/jump?from=2938393">
	    <img src="//top-fwz1.mail.ru/counter?id=2938393;t=617;l=1" 
	    style="border:0;" height="40" width="88" alt="Рейтинг@Mail.ru" /></a>
	    <!-- //Rating@Mail.ru logo -->
		
	    <script type="text/javascript" src="//vk.com/js/api/openapi.js?150"></script>
	    <h1>Чудо Пицца. Всегда отличный вкус.</h1>
	    <!-- VK Widget -->
	    <div id="vk_community_messages"></div>
	    <script type="text/javascript">
		if (fromapp!="true") {
		    VK.Widgets.CommunityMessages("vk_community_messages", 155678039, {tooltipButtonText: "Хотите заказать но не знаете как?"});
		};
	    </script>
	    </div>   	    
	</div>
</div>	
<div id="anim_picca" class="anim_picca">    
</div>
<script>     
 if ((device.mobile()==false)&(device.tablet()==false)){	 
    $('.simple-list-grid').simpleListGrid({
	'state': 'grid'
    });   
  } else {
      if (fromapp!="true") {
	  $("#ggpay").show();
      };
      if (device.portrait()==true){
	  $('.simple-list-grid').simpleListGrid();	  
      } else {		
	    $('.simple-list-grid').simpleListGrid({
		'state': 'grid'
	    });   	  
      };
  };
</script>	 
<ol class="breadcrumb">
  <li><a href="https://чудопицца.рф">Главная</a></li>
  <li class="active"><a href="#">Меню</a></li>  
</ol>
