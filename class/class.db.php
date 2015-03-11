<?php
/* 
	klasa zarządzająca połączeniami z bazą danych, w razie niepowodzeń zgłasza błędy przez klasę debug, która zapisuje je do pliku log.txt
*/

require_once("class.debug.php");
require_once("./functions.php");
class Database
{		
	public function __construct()
    {	
		$db = array (
				'host' => 'localhost',
				'user' => 'root',
				'pass' => '',
				'name' => 'sparycs_spary'
			);
		
		
		$debug = new Debug();
		/* połączenie z bazą danych */
    	mysql_connect($db['host'], $db['user'], $db['pass'])
			or die($debug->saveToLogFileError(getServerDate(), "Nie połączono z bazą danych!"));
		
		/* wybranie bazy danych */
		mysql_select_db($db['name'])
			or die($debug->saveToLogFileError(getServerDate(), "Nie wybrano bazy danych!"));
			
		
    }
	
	public function __dectruct()  /* zamykanie połączenia */
	{
		mysql_close();
	}
	
	
	public function dbQuery($query)  /* wykonuje zapytanie */
	{		
			$this->result = mysql_query($query) or die(mysql_error());
			if(!isset($this->result))
			{
				Debug::getMessage("Nie udało się wykonać polecenia query", 1);
			} else {
				return $this->result;
			}	
	}
		
	public function dbNumRows($result) /* zwraca ilosc rekordow */
	{		
			$this->num = mysql_num_rows($result);	
			if(!isset($this->num))
			{
				Debug::getMessage("Nie udało się wykonać polecenia num rows", 1);
			} else {
				return $this->num;
			}
	}
		
	public function dbFetchArray($result) /* wykonuje przypisanie do tablicy */
    {
        if($result) {
            $this->row = mysql_fetch_array($result);
            if (!isset($this->row)) {
                Debug::getMessage("Nie udało się wykonać polecenia fetch array", 1);
            } else {
                return $this->row;
            }
        }
    }
}

?>
