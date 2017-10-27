<?php
$cfg = new Tconfig;
$cfg->theme="bootstrap";
$cfg->sitename="Чудная пицца по отличной цене";
$worktime=array();
$worktime[0]=array(10,23); 
$worktime[1]=array(10,23); 
$worktime[2]=array(10,23); 
$worktime[3]=array(10,23); 
$worktime[4]=array(10,23); 
$worktime[5]=array(10,23); 
$worktime[6]=array(10,23); 

//состав
  $menu=array();
  $menu[]=["name"=>"Аппетитная",
	   "descr"=>"Пицца для утоления голода",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, колбаски охотничьи, ветчина, колбаса п/к, шампиньоны, перец чили, томаты, сыр"),
	   "weight"=>array("500","800"),
	   "cost"=>array(370,430),   
	   "images"=>array("appetit.png"),
  ];
  $menu[]=["name"=>"Ароматная",
	   "descr"=>"Изысканый аромат и хороший вкус",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, колбаса сырокопченая, томаты, перец чили, сыр, зелень"),
	   "weight"=>array("500","700"),
	   "cost"=>array(400,460),   
	   "images"=>array("aromatnaya.png"),
  ];
  $menu[]=["name"=>"Домашняя",
	   "descr"=>"Вкус домашней еды",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, свинина, шампиньоны, лука жареный, перец болгарский, томаты, сыр, зелень"),
	   "weight"=>array("500","800"),
	   "cost"=>array(370,430),   
	   "images"=>array("domash.png"),
  ];
  $menu[]=["name"=>"Закусочная",
	   "descr"=>"Пицца которая придется вам по душе",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, грудинка свинная, буженина, томаты, перец болгарский, сыр, зелень"),
	   "weight"=>array("500","800"),
	   "cost"=>array(370,430),   
	   "images"=>array("zakusochnay.png"),
  ];
  $menu[]=["name"=>"Заречная",
	   "descr"=>"Отличное блюдо на каждый день",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, филе куринное, перец болгарский, томаты, сыр, зелень"),
	   "weight"=>array("500","800"),
	   "cost"=>array(370,400),   
	   "images"=>array("zarechnaya.png"),
  ];
    $menu[]=["name"=>"Застольная",
	   "descr"=>"Подойдет для хорошей компании",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, колбаски охотничьи, ветчина, грудка копченая, шампиньоны, перец болгарский, томаты, сыр, зелень"),
	   "weight"=>array("500","800"),
	   "cost"=>array(370,430),   
	   "images"=>array("zastolnaya.png"),
  ];
    $menu[]=["name"=>"Княжеская",
	   "descr"=>"Не только на каждый день, но и в праздники",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, колбаски охоничьи, колбаса п/к, грудка коченая, грудинка свиная, корнишоны, перец болгарский, томаты, сыр, зелень. В бортах - охотничьи колбаски"),
	   "weight"=>array("800"),
	   "cost"=>array(490),   
	   "images"=>array("knyazheskaya.png"),
  ];
    $menu[]=["name"=>"Любительская",
	   "descr"=>"Для тех кто ценит",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, ветчина, колбаса п/к, шампиньоны, томаты, перец болгарский, сыр, зелень"),
	   "weight"=>array("500","800"),
	   "cost"=>array(370,430),   
	   "images"=>array("lybitel.png"),
  ];
    $menu[]=["name"=>"Маргарита",
	   "descr"=>"Просто но вкусно",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, томаты, сыр, зелень"),
	   "weight"=>array("500","800"),
	   "cost"=>array(330,390),   
	   "images"=>array("margarita.png"),
  ];
    $menu[]=["name"=>"Овощная",
	   "descr"=>"Для тех кто любит без мяса, диетическая",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, томаты, перец болгарский, брокколи, цветная капуста, фасоль, горошек зеленый, сыр, зелень"),
	   "weight"=>array("600"),
	   "cost"=>array(370),   
	   "images"=>array("ovoshnaya.png"),
  ];
    $menu[]=["name"=>"Рыбная",
	   "descr"=>"Рыбный день",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, лососб креветки, горбуша, томаты, кунжут, сыр"),
	   "weight"=>array("500","800"),
	   "cost"=>array(490,550),   
	   "images"=>array("ribnaya.png"),
  ];
  $menu[]=["name"=>"Северная",
	   "descr"=>"Настоящие русские традции",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, говядина вареная, бекон, грудка копченая, шампиньоны, перец болгарский, томаты, сыр, зелень"),
	   "weight"=>array("500","800"),
	   "cost"=>array(390,450),    
	   "images"=>array("severnaya.png"),
  ];
  $menu[]=["name"=>"Сказка",
	   "descr"=>"Сказочно вкусная пицца",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, ветчина, бекон, щампиньоны, корнишоны, лук расный, томаты, сыр, зелень"),
	   "weight"=>array("500","800"),
	   "cost"=>array(370,430),    
	   "images"=>array("skazka.png"),
  ];
  $menu[]=["name"=>"Сырная",
	   "descr"=>"Для тех кто любит сыр",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, сыр гауда, сыр моцарелла, сыр пармезан, сыр рокфотн"),
	   "weight"=>array("500","800"),
	   "cost"=>array(370,430),    
	   "images"=>array("onlychees.png"),
  ];
  $menu[]=["name"=>"Молодежная",
	   "descr"=>"Модная пицца для модных людей",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, ветчина, колбаса вареная, корнишоны, томаты, перец болгарский, маслины, сыр, зелень"),
	   "weight"=>array("500","800"),
	   "cost"=>array(370,430),    
	   "images"=>array("molodezhnaya.png"),
  ];
  $menu[]=["name"=>"Постная",
	   "descr"=>"Пицца в особые дни",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, постный майонез, томаты, перец болгарский, брокколи, цветная капуста, фасоль, горошек зеленый, зелень"),
	   "weight"=>array("500"),
	   "cost"=>array(310),    
	   "images"=>array("postnaya.png"),
  ];
  $menu[]=["name"=>"Самобранка",
	   "descr"=>"Сказочно вкусная пицца",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, шампиньоны, куринная грудка, колбаса вареная, ветчина, томаты, перец болгарский, сыр, зелень"),
	   "weight"=>array("500","800"),
	   "cost"=>array(370,430),    
	   "images"=>array("samobranka.png"),
  ];
  $menu[]=["name"=>"Семейная",
	   "descr"=>"Понравится всей семье",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, грудка копченая, ветчина, буженина, перец болгарский, томаты, сыр, зелень"),
	   "weight"=>array("500","800"),
	   "cost"=>array(370,430),    
	   "images"=>array("semeyanaya.png"),
  ];
  $menu[]=["name"=>"Сладкоежка",
	   "descr"=>"Сладкаяпица для детей и их родителей",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус клубничный, соус сметанный, клбуника, персики, груша, киви, ананас, посыпка кондитерская, топинг карамельный"),
	   "weight"=>array("700"),
	   "cost"=>array(400),    
	   "images"=>array("sladkoezhka.png"),
  ];
  $menu[]=["name"=>"Сытная",
	   "descr"=>"Питательная пицца для утоления голода и не только",
	   "type"=>"main", //main or dop
	   "structure"=>array("Соус пряный, бекон, колбаски охоничьи, корнишоны, перец болгарский, томаты, сыр"),
	   "weight"=>array("500","800"),
	   "cost"=>array(370,430),    
	   "images"=>array("sitnaya.png"),
  ];
  
  $menu[]=["name"=>"Сок",
	   "descr"=>"Натуральные соки в ассортименте",
	   "type"=>"main", //main or dop
	   "structure"=>array(""),
	   "weight"=>array("Абрикос-Яблоко","Апельсин","Груша-Яблоко","Персик-Яблоко","Яблоко-Виноград","Яблоко","Мультифрукт"),
	   "cost"=>array(60,60,60,60,60,60,60),    
	   "images"=>array("sok.jpg"),
  ];
  $menu[]=["name"=>"Лимонад",
	   "descr"=>"Настоящий качественный лимонад",
	   "type"=>"main", //main or dop
	   "structure"=>array(""),
	   "weight"=>array("Буратино","Барбарис","Грушевый","Дюшес","Лимонад","Тархун","Экстра-Ситро"),
	   "cost"=>array(40,40,40,40,40,40,40),    
	   "images"=>array("limonad.jpg"),
  ];


?>