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
		$klasa = $_POST['klasa'];
		
		if (!$klasa)
			{
				$_SESSION['blad'] = '<span style = "color:red"> Wypełnij wszytkie dane!</span>';
				header('Location: ekran-nauczyciel-sprawdz-obecnosc.php');
			}
		
		echo '<table class="table table-hover">';
				echo '<thead>';
				  echo '<tr>';
					echo '<th>Uczeń</th>';
					echo'<th>Poniedziałek</th>';
					echo'<th>Wtorek</th>';
					echo'<th>Środa</th>';
					echo'<th>Czwartek</th>';
					echo'<th>Piątek</th>';
				  echo '</tr>';
				echo '</thead>';
		
		
		
		$sql="SELECT * from klasa_uczen kl JOIN klasa k ON kl.klasa_id=k.id JOIN uczen u ON kl.uczen_id=u.idU AND k.klasa_nazwa='$klasa';";
		
		$rezultat = @$polaczenie->query($sql);
		
		
		
		$ile = $rezultat->num_rows;
		
			if ($ile >0)
			{
				for($i=0;$i<$ile;$i++)
				{
					$wiersz = $rezultat->fetch_assoc();
					echo'<tbody>';
					echo'<form name="mainHomescreen" action="MainHomescreen.php" method="POST">';
					  echo'<tr>';
						echo'<td>'.($wiersz['imie']).' '.($wiersz['nazwisko']).'</td>';
						echo "<td><input type='checkbox' name='checkbox[$rownumber]' value='[$rownumber]' </td>";
						echo'<td> <input type="checkbox" name="wtorek"></td>';
						echo'<td> <input type="checkbox" name="sroda"></td>';
						echo'<td> <input type="checkbox" name="czwartek"></td>';
						echo'<td> <input type="checkbox" name="piatek"></td>';
						echo'</tr>';
					
				}
				echo '<button type="submit" class="btn btn-primary btn-xs">Dodaj</button>';
				echo'</form>';
				
			}

				/*
			
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