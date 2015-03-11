<?php
/*
	Klasa odpowiedzialna za zapisywanie błędów to pliku log.txt i wyswietlanie bledow
*/
class Debug 
{

	
	public function saveToLogFileError($date, $error)
	{	
		$msg = $error;
		
		// zmienna $dane, która będzie zapisana
		// może także pochodzić z formularza np. $dane = $_POST['dane'];
		
	
		// przypisanie zmniennej $file nazwy pliku
		$file="./log.txt";
		
		$error = $date . ", " . $error . "\n";
		

		// uchwyt pliku, otwarcie do odczytu i dopisania
		$fp=fopen("$file", "r+");

		// dodanie do zmiennej dane poprzedniej zawartości pliku
		$error=$error.fread($fp, filesize($file));
		

		// ustawienie kursora na początku pliku
		rewind($fp);

		// blokada pliku do zapisu
		flock($fp, 2);
		
		// zapisanie danych do pliku
		
		fwrite($fp, $error);

		// odblokowanie pliku
		flock($fp, 3);

		// zamknięcie pliku
		fclose($fp);
		
		print $msg;
	}
	
	public static function getMessage($message, $status) /* funkcja zwracajaca bledy na podstawie argumentow*/
	{
			if($status != 1)
			{
				return "<div class='debugGreen'>" . $message . "</div>";
		
			} else
			{
				return "<div class='debugRed'>" . $message . "</div>";
			}
	}
}

?>