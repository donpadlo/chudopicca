function AddToCart(id){    
      $("#anim_picca").show();
      coors=$("#pic_"+id).offset();      
      $("#anim_picca").offset({top:coors.top, left:coors.left})
      $("#anim_picca").html($("#trumb_"+id).html());      
      coorsto=$("#widjet_cart").offset();
      $("#anim_picca").animate({left: coorsto.left,top:coorsto.top}, 400,function() {
	    $("#anim_picca").hide();
      });
      bay={}
      bay.id=id;
      bay.width=$("#weight_"+id).val();
      bay.cost=$("#cost_"+id).val();
      backet[backet.length]=bay;
};
function backetRefresh(){
    
};
$(document).ready(function() {
   backet=localStorage["backet"]; //корзина покупок
   if (typeof(backet)=="undefined"){backet=[]};
   backetRefresh(); //обновляем содержимое корзины
});