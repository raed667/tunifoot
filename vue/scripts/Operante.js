function Operante()
{
	Operante=document.getElementById('operante').className="hidden";
	
	if (document.getElementById('Tarif').checked || document.getElementById('Nombre_max_de_joueurs').checked)
	{
		document.getElementById('operante').className="shown";
	}
		
}