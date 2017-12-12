<?php

	session_start();
	if(!isset($_SESSION['zalogowanyNauczyciel']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<title> ELektroniczny dziennik ucznia </title>
	<meta name="description> content="Elektroniczny dziennik ucznia"/>
	<meta name="keywords" content="dziennik, uczeń, ucznia, elektroniczny"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	
	<link href ="style.css" rel="stylesheet" type="text/css" />
	<link href ="style2.css" rel="stylesheet" type="text/css" />
	<link href ="font/css/fontello.css" rel="stylesheet" type="text/css" />


	
	<link href="https://fonts.googleapis.com/css?family=Lato&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&amp;subset=latin-ext" rel="stylesheet">
	<script src="timer.js"></script>
	

	</head>

<body onload="odliczanie()";>

	<div id="containter">
		<div class="rectangle">
			<div id="logo"> <a href="index.php" class="homepage">Dziennik Ucznia</a></div>
			<div id="zegar">12:00:00</div>
			<div style="clear:both;"></div>
		</div>
		
		<div class="square">
			<div class="tile1">
				<a href="ekran-nauczyciel-dodaj-ocene2.php" class="tilelink">
				<i class="icon-book"> </i><br>  
				Dodaj Ocenę
				</a>
			</div>
			<div class="tile1">
				<a href="ekran-nauczyciel-sprawdz-obecnosc.php" class="tilelink">
				<i class="icon-calendar"> </i><br> 
				Sprawdź Obecność
				</a>
			</div>
			<div style="clear:both;"></div>
			<div class="tile4">
				<a href="nauczycielzaloguj.php" class="tilelink">
				<i class="icon-info-1"> </i><br> 
				Dodaj Ogłoszenie
				</a>
			</div>
			<div class="tile4">
				<a href="logout.php" class="tilelink">
				<i class="icon-logout"> </i><br> 
				Wyloguj
				</a>
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<div class="square">
			<div class="tile3"> <br> <br>
					<div id="panel">
					<form action="sprawdz-obecnosc.php" method="post";>
						Wybierz klasę<br><br>						
						<select id="username" name="klasa" placeholder="Klasa">
							<option>I</option>
							<option>II</option>
							<option>III</option>
						</select>
							<div id="lower">
								<input type="submit" value="Dalej">
							</div>
					</form>
				</div>
				<?php
						if(isset($_SESSION['blad']))
						{
							echo $_SESSION['blad'];
						}
						unset($_SESSION['blad']);
					?>
			</div>
		</div>
		
		<div style="clear:both;"></div>
		
<!--		<div class="rectangle">
		
			<div class="fb">1</div>
			<div class="tw">1</div>
			<div class="yt">1</div>
			<div class="insta">1</div>
		</div>
-->
		<div class="rectangle">2017 &copy; Elektroniczny Dziennik Ucznia</div>
	
</body>

</html>