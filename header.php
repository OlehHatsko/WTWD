<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
		<!-- MYSITE -->	<link rel="stylesheet" href="css/main.css"><!-- MYSTYLE -->
		<!-- BOOTSTRAP --><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><!-- BOOTSTRAP -->
		<!-- ICON -->	<link rel="shortcut icon" href="img/logowithlatters.png" type="image/x-icon"><!-- ICON -->
		<!-- HOVER --> <link rel="stylesheet" href="css/hover.css">
		<!-- FONT --><link href="https://fonts.googleapis.com/css?family=Bungee+Inline&display=swap" rel="stylesheet">
		<!-- STYLESHEET --><link rel="stylesheet" href="css/main.css">
    <!-- FONT --><link href="https://fonts.googleapis.com/css?family=Cuprum:400,400i,700,700i&display=swap&subset=cyrillic-ext,latin-ext" rel="stylesheet">		
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>

				<script>
				$("document").ready(
						function()
						{
						$("html").niceScroll(
				{
					cursorwidth:7,
					bouncescroll: true,
				});
					}
					)
		</script>
</head>

<body  style="font-family: 'Cuprum', sans-serif; font-size: 1.3em">
<div class="emptyBlock" style="width: 100%;height: 70px;margin-bottom: 30px"></div>
<div class="emptyBlock" style="">
	<div id="sideMenu" style="position: fixed;z-index:3;top:70px;left: 0px;width:0%;height: 100%;background-color: white;display: flex;overflow: hidden;flex-wrap: wrap;">	
		<div style="background-color: rgb(0,47,124,0.9);height: 70px; width: 100%;padding: 10px;color: white">
			<h1 align="center">МЕНЮ</h1>
		</div>
		<div style="width: 100%;height: 90%">
			<div>
				<a href="http://WTWD/index.php">
					<h1 align="center">ГОЛОВНА</h1>
				</a>
			</div>
			<div>
				<a href="news.php?page=1">
					<h1 align="center">НОВИНИ</h1>
				</a>
			</div>
			<div>
				<a href="http://WTWD/index.php">
					<h1 align="center">НАШІ ПОСЛУГИ</h1>
				</a>
			</div>
			<div>
				<a href="#" onclick="showMenuVert('A')">
					<h1 align="center">ПРО НАС</h1>
				</a>
			</div>
			<div id="A" style="background-color: rgb(0,47,124,0.9);color:white;width: 100%;height: 0px;overflow: hidden;">
				<div onclick="window.location.href = 'about.php'" style="border-bottom: 1px solid white;height: 50px;padding: 10px;cursor: pointer;	">
					<h3 align="center">КОЛЕКТИВ</h3>
				</div>
				<div onclick="window.location.href = 'about.php'" style="border-bottom: 1px solid white;height: 50px;padding: 10px;cursor: pointer;	">
					<h3 align="center">ХОРЕОГРАФИ</h3>
				</div>
			</div>
			<div>
				<a href="joinus.php">
					<h1 align="center">ПРИЄДНАТИСЬ</h1>
				</a>
			</div>
		</div>
	</div>
	<div id="logMenu" style="position:fixed;z-index:3;top:70px;right:0px;width:0%;height: 100%;background-color: white;display: flex;overflow: hidden;flex-wrap: wrap;">	
		<div class="container" style="padding: 30px;">
			<p>Введіть логін та пароль, виданий вам вашим керівником</p>
			<div id="message" class="alert alert-danger" style="display: none;align-items: center;justify-content: center;"><h5><b>Введіть дані</b></h5></div>
			<form id="formlog" action="php/login.php" method="POST">
				<input style="margin-bottom: 15px" type="text" class="form-control" id="login" name="login" placeholder="Логін">
				<input style="margin-bottom: 15px" type="password" class="form-control" id="password" name="password" placeholder="Пароль">
			</form>
			<div style="display: flex;width: 100%;justify-content: flex-end;">
				<button onclick="check()" class="btn btn-success">Увійти</button>
			</div>
		</div>
	</div>
	<div class="header_min" style="padding-right: 20px;position: fixed;z-index: 2;top: 0;">
		<div style="width: 7%;height: 100%" onclick="showMenu('sideMenu')">	
			<img src="img/open-menu.png"  alt="" style="height: 60%;margin: 15px;cursor: pointer;filter: invert(1);display: block;">
		</div>

		<div style="display: flex;justify-content: center;width: 86%;height: 100%;padding: 15px">	
			<img class = "top" src="img/logos.png"  alt="" style="filter: drop-shadow(0 0 10px gray) invert(0);height: 100%;">
		</div>

		<div style="width: 7%;height: 100%;padding-right:40px" onclick="showMenu('logMenu')">	
			<img src="img/Tilda_Icons_9ta_group.svg"  alt="" style="height:70%;margin: 10px;cursor: pointer;filter: invert(1);display: block;">
		</div>
</div>
</div>

<script>	
	var counter = 0;
		function power3(value)
		{
     return value*value*value;		
		}

		function check()
		{
			alert("kaka");
			if (login.value==""||password.value =="") document.getElementById('message').style.display = 'flex';
			else document.getElementById('formlog').submit();
		}

		function sleep(ms) {
  		return new Promise(resolve => setTimeout(resolve, ms));
		}

		async function showMenu(name)
		{
				var menu = document.getElementById(name);
				var strValue = menu.style.width;
				if(strValue == "0%")
				{
					var value = 1.1;
					while(value<80)
					{
						counter += 0.4;
						await sleep(5);
						value = power3(counter);
						menu.style.width = Math.round(value) + "%";
					}
					menu.style.width = "80%";
				}
				else
				{
					var value = 80;
					while(value>0)
					{
						counter -= 0.15;
						await sleep(3);
						value = power3(counter);
						if(value>80) continue;
						menu.style.width = value + "%";
					}
					menu.style.width = "0%";
				}
		}
		var vertCounter = 0;
		async function showMenuVert(name)
		{
				var menu = document.getElementById(name);
				var strValue = menu.style.height;
				if(strValue == "0px")
				{
					var value = 1.1;
					while(value<100)
					{
						vertCounter += 0.4;
						await sleep(5);
						value = power3(vertCounter);
						menu.style.height = value + "px";
					}
					menu.style.height = "100px";
				}
				else
				{
					var value = 100;
					while(value>0)
					{
						vertCounter -= 0.15;
						await sleep(3);
						value = power3(vertCounter);
						if(value>80) continue;
						menu.style.height = value + "px";
					}
					menu.style.height = "0px";
				}
			}
</script>		
<div class="header_max">
	<div class="container-fluid" style="; height: 125px;margin-bottom: 0;margin: 0;">
		<div style="width: 100%;margin:0;padding:0; display: flex;">
			<div style="width: 25%;color:#cccccc;font-size: 0.6em;padding: 10px;position: relative;">
				<div style="">
					Адреса:<br/> с. Муроване, Мурованська ЗОШ<div class="br"></div>
				Номер:
				<br> 068 169 99 26 - Тарас
				</div>
				<div style="position: absolute;right: 0; top:10px;">
				</div>
			</div>
			<div style="width: 50%;display: flex;justify-content: center;height:60px; position: relative;justify-content: space-between;">
				<img class = "top" src="img/logos.png" width="50%" height="100%" alt="" style="position: absolute;left: 25%;top:40%; filter: drop-shadow(0 0 10px gray) invert(0);z-index: 1">
			</div>
			<div style="width: 25%">
				<div style="width: 100%; padding: 0;margin:0; display: flex;height: 100%">
					<div style="width: 65%;color:grey; height: 100%;display: flex;align-items: center;font-size: 0.75em">
						Щоб увійти в систему, авторизуєтесь
					</div>
					<div style="width: 35%;display: flex;justify-content: center;align-items: center;height: 100%">
						<div id="logButton" class="logBtn">
								<img id="image_log" src="img/Tilda_Icons_9ta_group.svg" style="filter: invert(1); width: 30% "  alt="">
							Увійти
						</div>
						<script>
							document.querySelector("#logButton").addEventListener('click',tog,true);
							var value ="none";
							function tog()
							{
								if(value == "none")
								{
									value = "initial";
								}
								else	value = "none";
								document.getElementById('log_menu').style.display = value;
							}
						</script>
							<style>
							.gig:hover , .gig:focus
							{
								color:white;
								background-color: rgb(0, 0, 204);
							}
							
						</style>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="menu" style="transition: 0.2s;display: flex;justify-content: center;color: white;background-color: rgb(0,47,124,0.9);align-items: center;font-size: 1.3em">
			<ul id="men" style="	height: 100%; margin:10px;padding: 0;display: flex;justify-content: center;" >
				<a id="main" href="http://WTWD/index.php">
					<div style="align-items:center;justify-content: space-around; display: flex;flex-wrap: nowrap;height: 100%;width: 100%;">
						<div class="pict" style="display: flex;justify-content: right">
							<img src="../img/home.png" style="filter: invert(1);" width="30px" height="30px"  alt="">
						</div>
						<div>
							
					<li>Головна</li>
						</div>
					</div>
				</a>
				<a id="news" href="news.php?page=1'">
					<div style="align-items:center;justify-content: space-between;display: flex;flex-wrap: nowrap;height: 100%;width: 100%;">
						<div class="pict" style="display: flex;justify-content: right">
								<img src="img/newspaper-square-rounded-interface-symbol.svg" width="30" height="30" style="filter: invert(1);" alt="">
						</div>
						<div>
							
					<li>Останні&nbsp;новини</li>
						</div>
				</div>
				</a>
				<a id="services" class="services" href="../news.php?page=1'">
					<div style="align-items:center;justify-content: space-between;display: flex;flex-wrap: nowrap;height: 100%;width: 100%;">
						<div class="pict" style="display: flex;justify-content: right">
								<img src="img/newspaper-square-rounded-interface-symbol.svg" width="30" height="30" style="filter: invert(1);" alt="">
						</div>
						<div>
							
					<li>Наші&nbsp;послуги</li>
						</div>
				</div>
				</a>
				<a id="about" href="about.php" >
					<div style="align-items:center;justify-content: space-around;display: flex;flex-wrap: nowrap;height: 100%;width: 100%;">
						<div class="pict" style="display: flex;justify-content: right">
								<img src="img/information.svg" style="filter: invert(1);" width="30px" height="30px" alt="">
						</div>
					<li>Про&nbsp;нас</li>
				</div>
				</a>
				<a id="joinus" href="joinus.php">
					<div style="align-items:center;justify-content: space-around;display: flex;flex-wrap: nowrap;height: 100%;width: 100%;">
						<div class="pict" style="display: flex;justify-content: right">
								<img src="img/note.svg" style="filter: invert(1);" width="30px" height="30px" alt="">
						</div>
					<li>Пробне&nbsp;заняття</li>
				</div>
				</a>
			</ul>
		</div>
</div>
	</div>	
	<div id="log_menu" class="log_menu" style=" 	display: none ;position: absolute; width: 30%;top:80px;right: 10px;z-index: 10;">
		<div style="position: relative;width: 100%;height: 100%">
			<div style="z-index: 1;height: 30px;width: 30px;background-color: white;transform: rotate(45deg);-webkit-transform: rotate(45deg);
	-moz-transform: rotate(45deg);
	-o-transform: rotate(45deg);
	-ms-transform: rotate(45deg);position: absolute;top:0;right:11%;">
				
			</div>
			<div style="top:12px;left:0;width: 100%;position: absolute;">
				<div style="border:2px inset grey;background-color: white;height: 100%;width: 100%;border-radius: 8px">
					<div class="container" style="padding: 30px;">
							<p>Введіть логін та пароль, виданий вам вашим керівником</p>
							<div id="message" class="alert alert-danger" style="display: none;align-items: center;justify-content: center;"><h5><b>Введіть дані</b></h5></div>
							<form id="formlog" action="php/login.php" method="POST">
								<input style="margin-bottom: 15px" type="text" class="form-control" id="login" name="login" placeholder="Логін">
								<input style="margin-bottom: 15px" type="password" class="form-control" id="password" name="password" placeholder="Пароль">
							</form>
							<div style="display: flex;width: 100%;justify-content: flex-end;">
						
					<button onclick="check()" class="btn btn-success">Увійти</button>
					</div>
						</div>
				</div>
			</div>
		</div>
	</div>

</div>
<script>	
	if (document.documentElement.clientWidth <992)
	{
document.getElementById('image_log').style.display="none"; 
	} 

	
</script>