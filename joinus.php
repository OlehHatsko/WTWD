<?php
	session_start();
			$error_name ="";
			$error_surname= "";
			$error_phone = "";
			$error_sex = "";
			$error_adress = "";
			$error = false;
	if (isset($_POST["send"])) {
		$name = trim($_POST["name"]);
		$surname = trim($_POST["surname"]);
		$phone = trim($_POST["phone"]);
		$sex = trim($_POST["sex"]);
		$adress = trim($_POST["adress"]);
		$info = trim($_POST["info"]);
		$_SESSION["name"] = $name;
		$_SESSION["surname"] = $surname;
		$_SESSION["phone"] = $phone;
		$_SESSION["sex"] = $sex;
		$_SESSION["adress"] = $adress;
		$_SESSION["info"] = $info;
			if ($name == "") {
				$error_name = "<div class = 'alert alert-danger'><strong>Введіть ім'я!</strong></div>";
				$_SESSION["name"] = "";
				$error = true;
			}
			if ($surname == "") {
				$error_surname = "<div class = 'alert alert-danger'><strong>Введіть прізвище!</strong></div>";
				$error = true;
				$_SESSION["surname"] = "";
			}
			if (strlen($phone)<10 ||strlen($phone)>13 ) {
				$error_phone = "<div class = 'alert alert-danger'><strong>Ви ввели неправильний номер.</strong></div>";
				$error = true;
				$_SESSION["phone"] = "";
			}
			if ($sex == "") {
				$error_sex = "<div class = 'alert alert-danger'><strong>Введіть стать!</strong></div>";
				$error = true;
				$_SESSION["sex"] = "";
			}
			if ($adress == "") {
				$error_adress = "<div class = 'alert alert-danger'><strong>Введіть адресу!</strong></div>";
				$error = true;
				$_SESSION["adress"] = "";
			}
			if(!$error)
			{
				header("Location:http://cenat/success.php");
				exit();
			}
	}
?><?php 
$title = "Запис на заняття";
require "header.php"
 ?>

<div class="main"    style="	padding:40px;background-color:#F0F0F0;color: black">
<h1 align="center">Реєстрація в CENAT</h1><br><br>
			<form action="" method="post" id="form" onsubmit="valid(document.getElementById('form'))">
				<?=$error_name?><input id ="name"  class="form-control checked" type="text" value="<?=$_SESSION["name"]?>" name="name" placeholder="Як Вас звуть? Введіть, будь ласка, ваше ім'я"><br>
				<?=$error_surname?><input id="surname" class="form-control checked" type="text" value="<?=$_SESSION["surname"]?>" name="surname" placeholder="Також нам потрібне ваше прізвище"><br>
				<?=$error_phone?><input id="phone" type="tel" name="phone" value="<?=$_SESSION["phone"]?>" class="form-control checked" placeholder="Введіть свій номер телефону"><br>
				<?=$error_sex?><p>Я: </p>
					<div class="container"><div class="radio"><label class="radio" for="boy"><input id="boy"  type="radio" value="boy" name="sex">Хлопець</label></div>
					<label class="radio " for="girl"><input id="girl"  type="radio" value="girl" name="sex">Дівчина</label></div><br>
				<?=$error_adress?><input id="adress" type="adress"  value="<?=$_SESSION["adress"]?>" name="adress" class="form-control checked" placeholder="Звідки ви? Вкажіть місто">
				<br>
				<label for="info">Розкажіть щось про себе. Чи був у вас якийсь досвід у хореографії. Якщо так, то який стиль?</label>
				<textarea id="info" name="info" class="form-control" value="<?=$_SESSION["info"]?>" placeholder="Введіть додаткову інформацію" rows="5"></textarea>
				<br>
				<div  align="right">
				<input  class="btn btn-success" type="submit" name="send" value="Надіслати">
			</div>
			</form>
	
</div>
<script>
			document.getElementById('name').addEventListener('blur',()=>checkValue('name'),true);
			document.getElementById('surname').addEventListener('blur',()=>checkValue('surname'),true);
			document.getElementById('phone').addEventListener('blur',()=>checkValue('phone'),true);
			document.getElementById('adress').addEventListener('blur',()=>checkValue('adress'),true);
			function checkValue(valueId)
			{
				var element = document.getElementById(valueId);
				if(element.type == 'text' || element.type == 'adress')
				{
					var value = element.value;
					if(hasNumber(value)||value.length == 0)
					{
						element.style.border = '1px solid #FF8888';
					}
					else
					{
						element.style.border = '1px solid #8DCBFF';
					}
				}	
				if(element.type == "tel")
				{
					var value = element.value;
					if(!isPhoneNumber(value)||value.length == 0)
					{
						element.style.border = '1px solid #FF8888';
					}
					else
					{
						element.style.border = '1px solid #8DCBFF';
					}
				}
			}
			function isPhoneNumber(value)
			{
				return /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/.test(value);
			}
			function hasNumber(myString) {
			  return /\d/.test(myString);
			}
		</script>
 	<?php 
require "footer.php" ?>
 </body>
 </html>