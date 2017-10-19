function AddToCart(id){    
      $("#anim_picca").show();
      coors=$("#pic_"+id).offset();      
      $("#anim_picca").offset({top:coors.top, left:coors.left})
      $("#anim_picca").html($("#trumb_"+id).html());      
      coorsto=$("#widjet_cart").offset();
      $("#anim_picca").animate({left: coorsto.left,top:coorsto.top}, 400,function() {
	    $("#anim_picca").hide();
      });
      
    
};
function backetRefresh(){
    
};
$(document).ready(function() {
   backet=localStorage["backet"]; //корзина покупок
   backetRefresh(); //обновляем содержимое корзины
});