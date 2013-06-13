<?PHP

class Login
{
private $Log;
private $Pwd ;

function __construct($Log,$Pwd)
{
$this->Log=$Log;
$this->Pwd=$Pwd;
}

//debut get
function GetLog()
 { return $this->Log;
 }

 function GetPwd()
 { return $this->Pwd;
 }

 //fin GEt
 
 
 //debut SET
 
 function setLog($Log)
 { $this->Log=$Log ;}
 
 function setPwd($Pwd)
 { $this->Pwd=$Pwd;}
 
 //fin SEt
 
}

?>