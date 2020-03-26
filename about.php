<?php $title = "Про нас" ;
require "header.php"?>
<script>
	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
    document.getElementById('MapAbout').hidden = "hidden";
}
</script>
<div id="sure1" class="sure" onclick="document.getElementById('sure1').style.display='none'" style="background-color: rgba(0,0,0,0.6); position: fixed; width: 100%;height: 100%;top: 0;left: 0;z-index: 10;display:none;justify-content: center;align-items: center">
	<div class="wnd" id="wnd" onclick="event.stopPropagation(); event.cancelBubble = true;" style="overflow:hidden;position:relative;background-color: white;top:0;left:0; width: 70%;display: flex;border-radius: 30px;flex-wrap: wrap;align-items: center;">
			<div class="cross" style="position: absolute;top:20px;right:20px;padding: 0 ;margin: 0;cursor: pointer;">
				<img onclick="document.getElementById('sure1').style.display='none';" src="../img/cross.png"  width="20" height="20" alt="">
			</div>
			<div style="width: 100%;display: flex; ">
				<div class="aboutPicture" style="width: 110%;"> 
					<img src="img/Screenshot_2.png"   width="100%" height="100%" alt="">
				</div>
				<div style="width: 100%; padding:50px">
					<h3>ТАРАС ХОЛОВ</h3>
					<h4>засновник колективу</h4>
					<br><br><br>
					<p >
						Тарас Холов народився у Львівській області. Танцював змалечку. Згодом вступив до Львівського коледжу культури і мистецтв, після закінчення якого вчився в Києві на хореографії. Після кількох років танцювання по світу, Тарас повернувся на Україну та відкрив свою школу танцю Ценат.
					</p>
				</div>
			</div>
	</div>
</div>
<script>
		var wid= document.documentElement.clientWidth;
		if (wid<990) {
	document.getElementById('wnd').style.width = '90%'; 
	document.getElementById('MapAbout').hidden = 'hidden';
}
</script>

<div id="mn" class="container main post" style="padding: 40px;background-color:#F0F0F0;width: 100%">

	<div class="row">
		<div id="MapAbout" class="col-3 side-menu" style="border-right: 1px solid #c9c9c9;">
			<ul>
			<li><a href="#start"><b class="hvr-grow">Хто ми??</b></a></li>
				
				<hr>
				<li><b><a href="#dancers">Наші Хореографи:</a></b>
						<ul> 
							<li class="hvr-grow"><a href="#TH">Тарас Холов</a><div style="width: 100%;display:none; margin-left: 40px"><img height="40" width="40" src="img/1.jpg"></div></li>
							<li class="hvr-grow"><a href="#VH">Верініка Холов</a><div style="width: 100%;display:none; margin-left: 40px"><img height="40" width="40" src="img/2.jpg"></div></li>
							<li class="hvr-grow"><a href="#HH">Христина Гнідець</a><div style="width: 100%;display:none; margin-left: 40px"><img height="40" width="40" src="img/3.jpg"></div></li>
							<li class="hvr-grow"><a href="#NL">Назар Лака</a><div style="width: 100%;display:none; margin-left: 40px"><img height="40" width="40" src="img/4.jpg"></div></li>
							<li class="hvr-grow"><a href="#HM">Христина Мудрак</a><div style="width: 100%;display:none; margin-left: 40px"><img height="40" width="40" src="img/5.jpg"></div></li>
						</ul>
				</li>
				<hr>
				<li><b style="cursor: initial;">Студії:</b>
						<ul>
							<li class="hvr-grow"><a href="">Муроване</a></li><br>
							<li class="hvr-grow"><a href="">Ямпіль</a></li>
						</ul>
				</li>
			</ul>
		</div>
		<div class="col">
			<div class="container" style="height: 100% ">
				<h1 align="center"><a name="start">Хто ми?</a></h1>
				<div class="container" style="padding: 0 5%">
					Хореографічний колектив "ЦЕНАТ". <br>
Заснований у 2014 році в с. Муроване Львівської області  керівниками Тарасом Холовим та Веронікою Холов.
У складі колективу колективу налічується близько 200 дітей. Вихованці вивчають сучасні стилі хореографії, такі як:  Modern, jazz, jazz-folk, contemporary. 
Також додатково проходять заняття акробатики та класичного танцю. <br> У 2018 році було відкрито філію хореографічного колективу ЦЕНАТ в с. Ямпіль. <br> За період існування ЦЕНАТ став лауреатом міжнародних та всеукраїнських конкурсів. Відвідали інші країни Європи, такі як: Німечина, Польща, Чехія, Румунія, Болгарія. Також відвідали багато міст України.

				</div>

<div style="	width:100% ;display: 	flex; flex-wrap: 	wrap;justify-content: 	space-between	; padding:50px" >	
<h1 align="center" style="width: 100%;"><a name="dancers">Наші хореографи</a></h1>
	<div class="inf">	
		<div style="	z-index: 0;">
			<img src="img/Screenshot_2.png"  width="100%" height="100%" alt="">
		</div>
		<div class="txt">
			<div style="width: 100%;height: 30%">
				<h6 align="center">ТАРАС ХОЛОВ</h6>
				<p align="center" style="font-size: 0.7em">Засновник колективу</p>
			</div>
				<div class="links" style="width: 100% ;height: 40%; display: flex;justify-content: center;align-items: center;flex-wrap: wrap">
					<a href=""><img src="img/інст.png" class="si" style="	transition: 0.13s;filter: invert(1);margin: 10px;cursor: pointer;opacity: 0.5" height="20" width="20" alt=""></a>
					<a href=""><img src="img/фейс.png" class="si" style="	transition: 0.13s;filter: invert(1);margin: 10px;cursor: pointer;opacity: 0.5" height="20" width="20" alt=""></a>
					<br><div class="si" style="width: 100%;display: flex;justify-content: center; cursor: pointer;opacity: 0.5">
					<br>	<p  onclick="document.getElementById('sure1').style.display='flex';" style="font-size:0.7em;transition: 0.13s; ">SEE INFO	&#8594;</p>
					</div>	
				</div>
		</div>
	</div>
	<div class="inf">
		<img src="img/Screenshot_3.png" style="	z-index: 0;" width="100%" height="100%" alt="">
		<div class="txt">
				<div style="width: 100%;height: 30%">
				<h6 align="center">ВЕРОНІКА ХОЛОВА</h6>
				<p align="center" style="font-size: 0.7em">Засновниця колективу</p>
			</div>
				<div class="links" style="width: 100% ;height: 40%; display: flex;justify-content: center;align-items: center;flex-wrap: wrap">
					<a href=""><img src="img/інст.png" class="si" style="	transition: 0.13s;filter: invert(1);margin: 10px;cursor: pointer;opacity: 0.5" height="20" width="20" alt=""></a>
					<a href=""><img src="img/фейс.png" class="si" style="	transition: 0.13s;filter: invert(1);margin: 10px;cursor: pointer;opacity: 0.5" height="20" width="20" alt=""></a>
					<br><div style="width: 100%;display: flex;justify-content: center; cursor: pointer;">
					<br>	<p class="si" style="font-size:0.7em; 	opacity: 0.5;transition: 0.13s;">SEE INFO	&#8594;</p>
					</div>	
				</div>
		</div>
	</div>
	<div class="inf">
		<img src="img/Screenshot_4.png" style="	z-index: 0;" width="100%" height="100%" alt="">
		<div class="txt">
				<div style="width: 100%;height: 30%">
				<h6 align="center">ХРИСТИНА ГНІДЕЦЬ</h6>
				<p align="center" style="font-size: 0.7em">Хореограф</p>
			</div>
				<div class="links" style="width: 100% ;height: 40%; display: flex;justify-content: center;align-items: center;flex-wrap: wrap">
					<a href=""><img src="img/інст.png" class="si" style="	transition: 0.13s;filter: invert(1);margin: 10px;cursor: pointer;opacity: 0.5" height="20" width="20" alt=""></a>
					<a href=""><img src="img/фейс.png" class="si" style="	transition: 0.13s;filter: invert(1);margin: 10px;cursor: pointer;opacity: 0.5" height="20" width="20" alt=""></a>
					<br><div style="width: 100%;display: flex;justify-content: center; cursor: pointer;">
					<br>	<p class="si" style="	font-size:0.7em; opacity: 0.5;transition: 0.13s;">SEE INFO	&#8594;</p>
					</div>	
				</div>
		</div>
	</div>
	<div class="inf">
		<img src="img/Screenshot_5.png" style="	z-index: 0;" width="100%" height="100%" alt="">
		<div class="txt">
				<div style="width: 100%;height: 30%">
				<h6 align="center">НАЗАР ЛАКА</h6>
				<p align="center" style="font-size: 0.7em">Хореограф</p>
			</div>
				<div class="links" style="width: 100% ;height: 40%; display: flex;justify-content: center;align-items: center;flex-wrap: wrap">
					<a href=""><img src="img/інст.png" class="si" style="	transition: 0.13s;filter: invert(1);margin: 10px;cursor: pointer;opacity: 0.5" height="20" width="20" alt=""></a>
					<a href=""><img src="img/фейс.png" class="si" style="	transition: 0.13s;filter: invert(1);margin: 10px;cursor: pointer;opacity: 0.5" height="20" width="20" alt=""></a>
					<br><div style="width: 100%;display: flex;justify-content: center; cursor: pointer;">
					<br>	<p class="si" style="font-size:0.7em; 	opacity: 0.5;transition: 0.13s;">SEE INFO	&#8594;</p>
					</div>	
				</div>
		</div>
	</div>
	<div class="inf">
		<img src="img/Screenshot_1.png" style="	z-index: 0;" alt="" width="100%" height="100%">
		<div class="txt">
				<div style="width: 100%;height: 30%">
				<h6 align="center">ХРИСТИНА МУДРАК</h6>
				<p align="center" style="font-size: 0.7em">Хореограф</p>
			</div>
				<div class="links" style="width: 100% ;height: 40%; display: flex;justify-content: center;align-items: center;flex-wrap: wrap">
					<a href=""><img src="img/інст.png" class="si" style="	transition: 0.13s;filter: invert(1);margin: 10px;cursor: pointer;opacity: 0.5" height="20" width="20" alt=""></a>
					<a href=""><img src="img/фейс.png" class="si" style="	transition: 0.13s;filter: invert(1);margin: 10px;cursor: pointer;opacity: 0.5" height="20" width="20" alt=""></a>
					<br><div style="width: 100%;display: flex;justify-content: center; cursor: pointer;">
					<br>	<p class="si" style="font-size:0.7em; 	opacity: 0.5;transition: 0.13s;">SEE INFO	&#8594;</p>
					</div>	
				</div>
		</div>
	</div>
</div>
			</div>
		</div>
	</div>
</div>
<script>
	if ( wid<1200) {$('.inf').css('width','100%');$('.inf').css('height','')};

</script>
<script>
	if (wid<990) {
$(document).ready(function() {document.getElementById('mn').className = ' main'; });
	}
</script>
<?php 
require "footer.php" ?>
</body>
</html>


