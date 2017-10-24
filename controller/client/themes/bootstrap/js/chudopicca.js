function ClearCart(){
	backet=[];
	backetRefresh();
	localStorage.setItem('backet',JSON.stringify(backet));
	$("#dialog-choise-cart").dialog("close" );   
};
function ChangeWeight(id){
  weight=$("#weight_"+id).val();
  spicca=menu_array[id];
  poz=0;
  for (var i=0, len=spicca["weight"].length; i<len; i++) {
    if (spicca["weight"][i]==weight){poz=i;};
  };
  newcost=menu_array[id]["costs"][poz];
  $("#cost_"+id).val(newcost);  
  $("#price_"+id).html(newcost+' <i class="fa fa-rub" aria-hidden="true"></i>');
}
function AddToCart(id){    
      $("#anim_picca").show();
      coors=$("#pic_"+id).offset();      
      $("#anim_picca").offset({top:coors.top, left:coors.left})
      $("#anim_picca").html($("#trumb_"+id).html());      
      coorsto=$("#widjet_cart").offset();
      $("#anim_picca").animate({left: coorsto.left,top:coorsto.top}, 400,function() {
	    $("#anim_picca").hide();
      });		
      bay={};
      bay.id=id;
      bay.width=$("#weight_"+id).val();
      bay.cost=$("#cost_"+id).val();
	  bay.name=menu_array[id].name;
	  bay.descr=menu_array[id].descr;
	  bay.count=1;
	  //проверяем, а вдруг в корзине уже есть такая пицца, тогда просто добавим +1 к количеству
	  flag=0;
	  if (backet.length!=0){
		  for (var i=0, len=backet.length; i<len; i++) {		    
				if ((backet[i].id==id) & (backet[i].width==bay.width)) {
					flag=1;
					backet[i].count=backet[i].count+1;
				};
		  };
	  };
	  //иначе, добавляем в корзину
      if (flag==0) {backet[backet.length]=bay;};
	  localStorage.setItem('backet',JSON.stringify(backet));
	  backetRefresh();

	$.toast({
		heading: 'Внимание!',
		text: bay.name+" добавлено в корзину заказа",
		icon: 'succes',
		position: 'top-right',
		loader: true,        
		loaderBg: '#9EC600'  
	});
};
function backetRefresh(){
	  resultcost=0;
	  if (backet.length!=0){
		  for (var i=0, len=backet.length; i<len; i++) {		    
			resultcost=resultcost+backet[i].count*backet[i].cost;
		 };
	  };		  
	  if (resultcost>0){
		$("#widjet_cost").html(resultcost+' <i class="fa fa-rub" aria-hidden="true"></i>');   
	  } else {
		$("#widjet_cost").html("");   
	  };
};
function RemoveFromBacket(id){        
  $("#dialog-choise-cart").dialog("close" );   
  backet.splice(id, 1);
  backetRefresh();
  OpenCart();
};
function AddFromBacket(id){        
  $("#dialog-choise-cart").dialog("close" );   
  backet[id].count=backet[id].count+1;
  backetRefresh();
  OpenCart();
};
function MinusFromBacket(id){        
  $("#dialog-choise-cart").dialog("close" );   
  backet[id].count=backet[id].count-1;
  if (backet[id].count==0){backet.splice(id, 1);};
  backetRefresh();
  OpenCart();
};
function ZakazFinish(){
	if (backet.length!=0){
		//сначала проверяем, а всё ли заполнено?
		flag=0;
		if ($("#phone").val()==""){flag=1};
		if ($("#address").val()==""){flag=1};		
		if (flag==1){
		
					$.toast({
						heading: 'Внимание',
						text: 'Вам обязательно нужно заполнить поля с номером телефона и адресом!',
						icon: 'info',
						position: 'top-right',
						loader: true,        
						loaderBg: '#9EC600'  
					});
		} else {
				$("#list_cart").html('<div align=center><img src="/controller/client/themes/bootstrap/img/animpicca.gif"><br/><h2>Идет оформление заказа..</h2></div>');			  		    
				$.post("index.php?route=/controller/server/createzajaz.php",{
					backet: JSON.stringify(backet),
					mobile:$("#phone").val(),
					address:$("#address").val(),
					fromcart:fromcart.checked
				},
				  onAjaxSuccess
				);				 
				function onAjaxSuccess(data){
				  if (data=="ok"){
					    $("#list_cart").html('<div class="alert alert-success"><strong>Спасибо!</strong><br/>Ожидайте звонка оператора для подтверждения заказа в течении 5 минут..</div>');			  
					    backet=[];
					    backetRefresh();
					    localStorage.setItem('backet',JSON.stringify(backet));
					    	$.toast({
							heading: 'Внимание!',
							text: "Ожидайте звонка оператора для подтверждения заказа в течении 5 минут..",
							icon: 'succes',
							position: 'top-right',
							loader: true,        
							loaderBg: '#9EC600'  
						});
						window.scrollTo(0, 0);
				  } else {
					$("#list_cart").html(data);			  
				  };
				};			
		};
	};	
};
function OpenCart(){        
 if (backet.length!=0){
        $("#list_cart").html("");
		ht="";
		ht=ht+'<table class="table table-striped table-hover table-condensed">';
		ht=ht+'<thead>';
        ht=ht+'  <tr>';
        ht=ht+'    <th>#</th>';
        ht=ht+'    <th>Название</th>';
		ht=ht+'    <th>Вес</th>';
        ht=ht+'    <th>Кол.</th>';
        ht=ht+'    <th>Сумма</th>';
		ht=ht+'    <th></th>';
        ht=ht+'  </tr>';
        ht=ht+'</thead>';		
		// перечисляем заказ	
		  total=0;
		  for (var i=0, len=backet.length; i<len; i++) {		    
			ht=ht+'<tr>';
			ht=ht+'<td>'+(i+1)+'</td>';
			ht=ht+'<td><strong>'+backet[i].name+'</strong><br/>'+backet[i].descr+'</td>';
			ht=ht+'<td>'+backet[i].width+'гр.</td>';
			ht=ht+'<td>'+backet[i].count+'</td>';
			summ=backet[i].cost*backet[i].count;
			total=total+summ;
			ht=ht+'<td>'+summ+'</td>';
			ht=ht+'<td>';
			ht=ht+'<div class="btn-group btn-group-xs">';
			ht=ht+'  <button type="button" onclick="AddFromBacket('+i+')"    class="btn btn-default btn-group-xs"><i class="fa fa-plus" aria-hidden="true"></i></button>';
			ht=ht+'  <button type="button" onclick="MinusFromBacket('+i+')"  class="btn btn-default btn-group-xs"><i class="fa fa-minus" aria-hidden="true"></i></button>';
			ht=ht+'  <button type="button" onclick="RemoveFromBacket('+i+')" class="btn btn-default btn-group-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
			ht=ht+'</div>';
			ht=ht+'</td>';
			ht=ht+'</tr>';
		 };	
		ht=ht+"<tr><th></th><th>Всего</th><th></th><th></th><th>"+total+"<i class='fa fa-rub' aria-hidden='true'></i></th><th></th></tr>"; 
		ht=ht+'</table>';
		ht=ht+'<div class="form-group">';
		ht=ht+'<label for="phone">Дополнительные сведения</label>';
		ht=ht+'<input type="text" class="form-control" id="phone" name="phone" placeholder="Введите ваш телефон">';		
		ht=ht+'</div>';
		ht=ht+'<div class="checkbox">';
		ht=ht+'	<label>';
		ht=ht+'		<input id="fromcart" name="fromcart" type="checkbox"> Оплата будет с пластиковой карты';
		ht=ht+'	</label>';
		ht=ht+'</div>';
		ht=ht+'<label for="phone">Адрес доставки</label>';		
		ht=ht+'<input type="text" class="form-control" id="address" name="address" placeholder="улица, дом, номер квартиры">';
		ht=ht+'<div class="alert alert-warning"><strong>Внимание!</strong> Доставка осуществляется только по г.Вологда</div>';		
		ht=ht+'<button type="button" onclick="ZakazFinish();" class="btn btn-info btn-sm form-control">Оформить заказ</button>';
		$("#list_cart").html(ht);
		$("#phone").mask("+7(999) 999-9999");		
        $("#dialog-choise-cart").dialog("open" );   
 };		
};
$(document).ready(function() {			
        $(window).scroll(function(){
	    if ($(this).scrollTop() > 100) {
		$('.scrollup').fadeIn();
	    } else {
		$('.scrollup').fadeOut();
	    }
	});
   backet=JSON.parse(localStorage.getItem("backet")); //корзина покупок
   if (typeof(backet)=="undefined"){backet=[]};
   if (backet==null) {backet=[]};
   backetRefresh(); //обновляем содержимое корзины
   
    $("#widjet_cart").click(function() {OpenCart();});
	$("#imgcart").click(function() {OpenCart();});
	$("#widjet_cost").click(function() {OpenCart();});
    $("#dialog-choise-cart" ).dialog({
	      autoOpen: false,        
	      resizable: false,
	      height:'auto',
	      width: 'auto',
	      modal: true,
	});    	 	 
   
});