<div class="container-fluid">
    <div class="row">
<div class="container">
        <div id="main_area">
                <!-- Slider -->
                <div class="row">
                    <div class="col-xs-12" id="slider">
                        <!-- Top part of the slider -->
                        <div class="row">
                            <div class="col-sm-8" id="carousel-bounding-box">
                                <div class="carousel slide" id="myCarousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="active item" data-slide-number="0">
                                        <img src="/controller/client/themes/bootstrap/images/3picca.png"></div>

                                        <div class="item" data-slide-number="1">
                                        <img src="/controller/client/themes/bootstrap/images/action2.jpg"></div>

                                        <div class="item" data-slide-number="2">
                                        <img src="/controller/client/themes/bootstrap/img/to2to.jpg"></div>

                                        <div class="item" data-slide-number="3">
                                        <img src="/controller/client/themes/bootstrap/images/action3.jpg"></div>

                                    </div><!-- Carousel nav -->
                                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>                                       
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>                                       
                                    </a>                                
                                    </div>
                            </div>

                            <div class="col-sm-4" id="carousel-text"></div>

                            <div id="slide-content" style="display: none;">
                                <div id="slide-content-0">
                                    <h2>Пицца бесплатно</h2>
                                    <p>При заказе 3-х любых пицц, вы получите пиццу 'По карману' совершенно бесплатно</p>
                                    <p class="sub-text">Действует с 01.12.2017 по 01.12.2018</a></p>
                                </div>

                                <div id="slide-content-1">
                                    <h2>Напиток в подарок</h2>
                                    <p>При заказе 2-х пицц, вы можете выбрать в подарок лимонад в ассортименте (2 х 0,5 л.) или сок в ассортименте (1 литр)</p>
                                    <p class="sub-text">Действует с 01.12.2017 по 01.12.2018</a></p>
                                </div>

                                <div id="slide-content-2">
                                    <h2>Соединяй вкусы</h2>
                                    <p>Пицца из двух половинок. Соединяй свои любимые вкусы!</p>
                                    <p class="sub-text">Действует с 01.12.2017 по 01.12.2018</a></p>
                                </div>

                                <div id="slide-content-3">
                                    <h2>Экономь!</h2>
                                    <p>Закажи две любые пиццы по 800гр и пиццу "По карману" 800гр и заплати всего 1000р. Экономия 240 рублей</p>
                                    <p class="sub-text">October 24 2014 - <a href="#">Read more</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/Slider-->

                <div class="row hidden-xs" id="slider-thumbs">
                        <!-- Bottom switcher of slider -->
                        <ul class="hide-bullets">
                            <li class="col-sm-2">
                                <a class="thumbnail" id="carousel-selector-0"><img src="http://placehold.it/170x100&text=Раз"></a>
                            </li>

                            <li class="col-sm-2">
                                <a class="thumbnail" id="carousel-selector-1"><img src="http://placehold.it/170x100&text=Два"></a>
                            </li>

                            <li class="col-sm-2">
                                <a class="thumbnail" id="carousel-selector-2"><img src="http://placehold.it/170x100&text=Три"></a>
                            </li>

                            <li class="col-sm-2">
                                <a class="thumbnail" id="carousel-selector-3"><img src="http://placehold.it/170x100&text=Четыре"></a>
                            </li>

                        </ul>                 
                </div>
        </div>
</div>	


<ol class="breadcrumb">
  <li><a href="https://чудопицца.рф">Главная</a></li>
  <li class="active"><a href="#">Акции</a></li>  
</ol>
<script>
  jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        $('#carousel-text').html($('#slide-content-0').html());
 
        //Handles the carousel thumbnails
       $('[id^=carousel-selector-]').click( function(){
            var id = this.id.substr(this.id.lastIndexOf("-") + 1);
            var id = parseInt(id);
            $('#myCarousel').carousel(id);
        });
 
 
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
</script>