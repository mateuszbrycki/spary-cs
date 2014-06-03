document.getElementByTagName('select').onLoad = wybierz();

function wybierz(id)
{
	opcja = document.getElementByTagName('value');
	
	if(opcja == id)
	{
		pozycja = document.getElementByTagName('option');
		
		pozycja += ' SELECTED';
	} 
}