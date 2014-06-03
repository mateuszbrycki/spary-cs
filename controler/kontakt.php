<?php
	
	if(isset($_POST['send_mail']))
	{
		if(!empty($_POST['mail']) AND !empty($_POST['wiadomosc']))
		{
			
			$kontakt = new Kontakt($_POST['mail'], $_POST['wiadomosc']);
			$kontakt->sendMessage();
			$objSmarty->assign('message', Debug::getMessage('Wysłano wiadomość do administracji. Teraz musisz czekać na odpowiedź.', 0)); //1 - blad, 0 - nie	
		} else {
			$objSmarty->assign('message', Debug::getMessage('Wypełnij wszystkie pola!', 1)); //1 - blad, 0 - nie	
		}
	} 

class Kontakt
{
	public function __construct($mail, $text)
	{
		$this->mail = $mail;
		$this->text = $text;
	}
	
	public function sendMessage()
	{	
			$temat = 'Kontakt: spary-cs.pl';
																				
											
			$headers .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= 'From: spary-cs.pl' . "\r\n";

 
			mail('bryla33@gmail.com', $temat, $this->text, $headers);
	}
}
?>