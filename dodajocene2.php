<!DOCTYPE html>
<html lang="pl">
<head>
  <title>Elektroniczny Dziennik Ucznia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

<?php

	session_start();

	/*if((!isset($_POST['username'])) || (!isset($_POST['lastname'])))
	{
		header('Location: index.php');
		exit();
	}
	*/
	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if($polaczenie->connect_errno!=0)
	{
		echo "Error: ". $polaczenie->connect_errno;
	}
	else
	{
		
		$przedmiot = $_POST['przedmiot'];  
		$klasa = $_POST['klasa'];
		
		if (!$przedmiot || !$klasa)
			{
				$_SESSION['blad'] = '<span style = "color:red"> Wypełnij wszytkie dane!</span>';
				header('Location: dodajocene2.php');
			}
		
		$sql="SELECT * from klasa_uczen kl JOIN klasa k ON kl.klasa_id=k.id JOIN uczen u ON kl.uczen_id=u.idU JOIN uczen_przedmiot up ON u.idU=up.uczen_id JOIN przedmiot p ON up.przedmiot_id=p.idP AND k.klasa_nazwa='$klasa' AND p.nazwa='$przedmiot';";
		
		$rezultat = @$polaczenie->query($sql);

		
		$ile = $rezultat->num_rows;
		
			echo '<table class="table table-hover">';
				echo '<thead>';
				  echo '<tr>';
					echo '<th>Klasa</th>';
					echo'<th>L</th>';
					echo'<th>Przedmiot</th>';
					echo'<th>Uczen</th>';
					echo'<th>Oceny</th>';
					//echo'<th>Dodaj Ocene</th>';
				  echo '</tr>';
				echo '</thead>';
		
			if ($ile >0)
			{
				for($i=0;$i<$ile;$i++)
				{
					//$_SESSION['zalogowanyNauczyciel'] = true;
					
					$wiersz = $rezultat->fetch_assoc();
					$_SESSION['przedmiotid'] = $wiersz['idP'];
					echo'<tbody>';
					  echo'<tr>';
						echo'<td>'.($wiersz['klasa_nazwa']).'</td>';
						echo'<td>'.($wiersz['idU']).'</td>';
						echo'<td>'.($wiersz['nazwa']).'</td>';
						echo'<td>'.($wiersz['imie']).' '.($wiersz['nazwisko']).'</td>';
						echo'<td>'.($wiersz['ocena']).'</td>';
						//echo'<td>';
										//echo'<form action="phpdodajocene.php" method="post">';
										//echo '<input type="text" name="dodanaocena" />';
									
										//echo '<button type="submit" class="btn btn-primary btn-xs">Dodaj</button></td>';
										//echo'</form>';
					  echo'</tr>';
			
				}
				echo'</tbody>';
			echo'</table>';
			
			}
			echo'<form action="dodajocene.php" method="post">';
			echo 'Wpisz ocene : <input type="text" name="dodanaocena" /><br><br>';
			echo 'Wpisz numer ucznia : <input type="text" name="idUcznia" /><br><br>';
			echo '<button type="submit" class="btn btn-primary btn-xs">Dodaj</button></td>';
			echo'</form>';
			
			
			/*
			$sql3 = "SELECT * FROM uczen_przedmiot where uczen_id=".$_SESSION['idU']." AND przedmiot_id=".$_SESSION['przedmiotid'].";";
			$rezultat3 = @$polaczenie->query($sql3);
			$wiersz3 = $rezultat3->fetch_assoc();
			$stareoceny=$wiersz3['ocena'];
			//$polaczenie->query("DELETE FROM uczen_przedmiot WHERE uczen_id=".$_SESSION['idU']." AND przedmiot_id=".$_SESSION['przedmiotid'].";");
			//$polaczenie->query("INSERT INTO uczen_przedmiot VALUES (NULL,".$_SESSION['idU'].",".$_SESSION['przedmiotid'].", '$stareoceny $ocena')");
			header('Location: ekran-nauczyciel-dodaj-ocene.php');
			
			$polaczenie->query("UPDATE uczen_przedmiot SET ocena='$stareoceny $ocena' WHERE uczen_id=".$_SESSION['idU']." AND przedmiot_id=".$_SESSION['przedmiotid'].";");
		/*$sql1= "SELECT uczen.imie,uczen.nazwisko,przedmiot.nazwa,uczen_przedmiot.ocena FROM uczen JOIN uczen_przedmiot ON uczen.id=uczen_przedmiot.uczen_id AND uczen.imie='$firstname' AND uczen.nazwisko='$lastname' JOIN przedmiot ON uczen_przedmiot.przedmiot_id=przedmiot.id";
		echo '<h2>',$firstname." ".$lastname.'</h2>';
		if ($rezultat = @$polaczenie->query($sql1))
		{
			
					echo '<table class="table table-hover">';
				echo '<thead>';
				  echo '<tr>';
					echo '<th>Przedmiot</th>';
					echo'<th>Ocena</th>';
				  echo '</tr>';
				echo '</thead>';
			$ilu_uczniow = $rezultat->num_rows;
			if ($ilu_uczniow >0)
			{
				for($i=0;$i<$ilu_uczniow;$i++)
				{
					$_SESSION['zalogowanyNauczyciel'] = true;
					
					$wiersz = $rezultat->fetch_assoc();
					
					echo'<tbody>';
					  echo'<tr>';
						echo'<td>'.($wiersz['nazwa']).'</td>';
						echo'<td>'.($wiersz['ocena']).'</td>';
					  echo'</tr>';
			
				}
				echo'</tbody>';
			echo'</table>';
			
				echo'<h2>Dodaj ocene</h2>';
				echo'<form action="szukajucznia.php" method="post">';
				echo'<h3>Przedmiot</h3><input type="text" name="przedmiot" /> <br />';
				echo'<h3>Ocena</h3><input type="text" name="dodanaocena" /> <br />';
				echo'<button type="button" class="btn btn-primary btn-xs">Dodaj</button>';
				echo'</form>';
				echo'</div>';
				
	
				
				$_SESSION['firstname'] = $wiersz['imie'];
				$_SESSION['lastname'] = $wiersz['nazwisko'];
				
				unset($_SESSION['blad']);
				
				$rezultat->free();
			}
			else
			{
				$_SESSION['blad'] = '<span style = "color:red"> Brak ucznia o podanych danych !</span>';
				header('Location: ekran-nauczyciel-dodaj-ocene.php');
			}
			
		}
*/
		$polaczenie->close(); 
	}
	
?>



</body>
</html>