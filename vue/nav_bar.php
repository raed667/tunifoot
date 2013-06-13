<style>
.navbar-search {
    position: relative;
}
.navbar-search .search-query {
    padding-left: 29px !important;
}

.navbar-search .icon-search {
    position: absolute;
    top: 7px;
    left: 11px;
}

.navbar-search .search-query:focus, .navbar-search .search-query.focused {
    padding-left: 30px;
}
</style>


 <div class="navbar navbar-inverse navbar-fixed-top">
     <div class="navbar-inner">
    <div class="container" style="width:97%;">

<a class="btn btn-navbar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>

       <ul class="nav">
               <a class="brand" href="../vue/Index.php">TuniFoot</a>

         <li class="active visible-desktop"><a href="../vue/Index.php">Home</a></li>
         <li class="visible-desktop"><a href="Chat.php">Chat</a></li>
         <li class="visible-desktop"><a href="Contact.php">Contact</a></li>
        </ul>
        <ul class="nav pull-right"> 
        <li>           <span class="visible-desktop">
 <form class="navbar-search pull-left align-left" action="Recherche.php" method="GET">
      
     <input type="text" name="recherche" class="search-query" placeholder="Recherche terrain">
     <i class="icon-search"></i>
   </form> </span></li>
        <li class="divider-vertical pull-left visible-desktop" style=""></li>
         <style>
		a .logout
		 {
		height:10px;
		margin-top:-2px; 

			-webkit-filter: invert(75%);
}


		 </style>
         <?php
		 if(isset($_SESSION['IdU']))
        { if($_SESSION['IdU']!=(-1))
{
	if($_SESSION['Type']=='Joueur')
	{
		if (file_exists('../control/uploads/imgJoueur'.$_SESSION['IdU'].".jpg")){
	echo('<li class="visible-desktop"> <a href="../Vue/Joueur.php?Id='.$_SESSION['IdU'].'">
	<img src="../control/uploads/imgJoueur'.$_SESSION['IdU'].'.jpg" style="height:25px; width:25px; background-color:white;"> Profil</a> </li>');}
	else
	{
	echo('<li class="visible-desktop"> <a href="../Vue/Joueur.php?Id='.$_SESSION['IdU'].'">
	<img id="PPimg" src="images/reason1.png" style="height:25px; width:25px; background-color:white;"> Profil</a> </li>');}
	echo('<li class="visible-desktop"><a href="../control/Logout.php"><img class="logout" src="content/img/png/glyphicons_063_power.png" /> Logout</a></li>');
	}
	if($_SESSION['Type']=='Entreprise')
	{
		if (file_exists('../control/uploads/imgEntreprise'.$_SESSION['IdU'].".jpg")){
	echo('<li class="visible-desktop"> <a href="../Vue/Entreprise.php?Id='.$_SESSION['IdU'].'">
	<img src="../control/uploads/imgEntreprise'.$_SESSION['IdU'].'.jpg" style="background-color:white; height:25px; width:25px;"> Profil</a></li>');}
	else
	{
	echo('<li class="visible-desktop"> <a href="../Vue/Entreprise.php?Id='.$_SESSION['IdU'].'">
	<img id="PPimg" src="images/reason2.png" style="height:25px; width:25px; background-color:white;"> Profil</a> </li>');}
	echo('<li class="visible-desktop"> <a href="../control/Logout.php"><img class="logout" src="content/img/png/glyphicons_063_power.png"/> Logout</a> </li>');
	}}}
	
    
	   if(isset($_SESSION['IdP']) and $_SESSION['IdP']!=(-1))
{	if (file_exists('../control/uploads/imgProprietaire'.$_SESSION['IdP'].".jpg"))
	{
	echo('<li class="visible-desktop"> <a href="../Vue/Proprietaire.php?Id='.$_SESSION['IdP'].'">
	<img src="../control/uploads/imgProprietaire'.$_SESSION['IdP'].'.jpg" style="height:25px; width:25px; background-color:white;"> Profil</a></li>');
	}
	else
	{
	echo('<li class="visible-desktop"> <a href="../Vue/Proprietaire.php?Id='.$_SESSION['IdP'].'">
	<img id="PPimg" src="images/reason3.png" style="height:25px; width:25px; background-color:white;"> Profil</a> </li>');
	}
	echo('<li class="visible-desktop"> <a href="../control/Logout.php"><img class="logout" src="content/img/png/glyphicons_063_power.png" /> Logout</a> </li>');
}
if((!isset($_SESSION['IdP']) and (!isset($_SESSION['IdU'])))or ($_SESSION['IdP']==-1 and $_SESSION['IdU']==-1))
echo('<li class="visible-desktop"><a href="../Vue/Login.php"><i class="icon-user-2"></i> Login</a></li>');
		 
        ?>
        
</ul>



<div class="nav-collapse collapse hidden-desktop" style="margin-bottom:2%;">
        <ul class="nav">

         <li><a href="../vue/Index.php">Home</a></li>
         <li><a href="Chat.php">Chat</a></li>
         <li><a href="Contact.php">Contact</a></li>
         
         <li>
         <div class="row-fluid">
         <form class="navbar-search pull-left" action="Recherche.php" method="GET">
      
     <input type="text" name="recherche" class="search-query span6" placeholder="Recherche terrain"> 
     <i class="icon-search" style="margin-top:1.5%; margin-left:1.5%"></i>
     <wbr />
     <input style="margin-top:0px;" class="btn btn-navbar btn-large span6" type="submit" value="Recherche"  />
   </form>
         </div>
          </li>
          
          
           <?php
         if(isset($_SESSION['IdU']) and $_SESSION['IdU']!=(-1))
{
	if($_SESSION['Type']=='Joueur')
	{
		if (file_exists('../control/uploads/imgJoueur'.$_SESSION['IdU'].".jpg"))
		{
	echo('<li class="hidden-desktop"> <a href="../Vue/Joueur.php?Id='.$_SESSION['IdU'].'"><img src="../control/uploads/imgJoueur'.$_SESSION['IdU'].'.jpg" style="height:30px; width:30px;"> Profil</a></li>');
		}
		else
		{
	echo('<li class="hidden-desktop"> <a href="../Vue/Joueur.php?Id='.$_SESSION['IdU'].'">
	<img id="PPimg" src="images/reason1.png" style="height:25px; width:25px; background-color:white;"> Profil</a> </li>');
		}

	echo('<li class="hidden-desktop-desktop"> <a href="../control/Logout.php"><img class="logout" src="content/img/png/glyphicons_063_power.png" /> Logout</a> </li>');
	}
	if($_SESSION['Type']=='Entreprise')
	{
		if (file_exists('../control/uploads/imgEntreprise'.$_SESSION['IdU'].".jpg"))
		{
	echo('<li class="hidden-desktop-desktop"> <a href="../Vue/Entreprise.php?Id='.$_SESSION['IdU'].'"><img src="../control/uploads/imgEntreprise'.$_SESSION['IdU'].'.jpg" style="height:30px; width:30px;"> Profil</a></li>');
		}
		else
		{
	echo('<li class="hidden-desktop"> <a href="../Vue/Entreprise.php?Id='.$_SESSION['IdU'].'">
	<img id="PPimg" src="images/reason2.png" style="height:25px; width:25px; background-color:white;"> Profil</a> </li>');
		}
	echo('<li class="hidden-desktop-desktop"> <a href="../control/Logout.php"><img class="logout" src="content/img/png/glyphicons_063_power.png" /> Logout</a> </li>');
	}}
	
	   if(isset($_SESSION['IdP']) and $_SESSION['IdP']!=(-1))
{
	if (file_exists('../control/uploads/imgProprietaire'.$_SESSION['IdP'].".jpg"))
	{
	echo('<li class="hidden-desktop-desktop"> <a href="../Vue/Proprietaire.php?Id='.$_SESSION['IdP'].'"><img src="../control/uploads/imgProprietaire'.$_SESSION['IdP'].'.jpg" style="height:30px; width:30px;"> Profil</a></li>');
	}
	else
		{
	echo('<li class="hidden-desktop"> <a href="../Vue/Proprietaire.php?Id='.$_SESSION['IdP'].'">
	<img id="PPimg" src="images/reason2.png" style="height:25px; width:25px; background-color:white;"> Profil</a> </li>');
		}
	echo('<li class="hidden-desktop-desktop"> <a href="../control/Logout.php"><img class="logout" src="content/img/png/glyphicons_063_power.png" /> Logout</a> </li>');
}
if((!isset($_SESSION['IdP']) and (!isset($_SESSION['IdU'])))or ($_SESSION['IdP']==-1 and $_SESSION['IdU']==-1))
echo('<li class="hidden-desktop-desktop"><a href="../Vue/Login.php"><i class="icon-user-2"></i> Login</a> </li>');
		 
        ?>
                  <li><div style="margin-top:1%;"></div></li>
 
</ul>

</div>   
</div> 
</div>
</div>
 <br />
<br />

  