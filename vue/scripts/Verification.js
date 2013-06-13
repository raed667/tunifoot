function Verification()
{
	mail = document.getElementById('mail').value;
	tailleMail = (document.getElementById('mail').value).length;

	if(window.XMLHttpRequest)
		xhr=new XMLHttpRequest();
		
	xhr.onreadystatechange = function()
	{
		if((xhr.readyState==4) && (xhr.status==200))
		{
		
			//alert(xhr.responseText);
		   	if(tailleMail==0)
			document.getElementById('img').src="../vue/content/img/png/empty.png";
			else
			{
			if(xhr.responseText==0)
			document.getElementById('img').src="../vue/content/img/png/glyphicons_198_ok.png";
			else
			document.getElementById('img').src="../vue/content/img/png/glyphicons_197_remove.png";
			}
		}
	};
	
	xhr.open('GET','../control/Verification.php?mail='+mail,true);
	xhr.send(null);
	
}