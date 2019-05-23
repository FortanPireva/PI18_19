<?php 

require_once("../resources/config.php");

$css_includes=Array("../css/registration.css");
echo bootstrap_includes;  

include_once(databaza);


$db=new database();
echo $db->connect();

if($_SERVER['REQUEST_METHOD']=="POST")
{
  if(
     $_POST['email']==""||
     $_POST['password']=="")
     {
        $msgError=htmlspecialchars("Fusha nuk duhet te lihet e zbrazet");
     }
  else
  {
      $email=$_POST['email'];
      $password=$_POST['password']; 
      $query="SELECT emri FROM  user where email='$email' and password='$password';";    
      $array=array();
      $array=$db->getData($query);
  if(count($array)>0)
      {
          echo 'Jeni lloguar si: '.$array[0]['emri'];
      }
  }
}


include_once(templates_header);
?>




