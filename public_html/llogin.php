<?php 

require_once("../resources/config.php");

$css_includes=Array("../css/registration.css");
echo bootstrap_includes;  

include_once(databaza);


$db=new database();
echo $db->connect();

$msgError = "";
if($_SERVER['REQUEST_METHOD']=="POST")
{
  if(isset($_POST['createaccount']))
    header("Location:registration.php");
  if(
     $_POST['email']==""||
     $_POST['password']=="")
     {
        $msgError=("Fusha nuk duhet te lihet e zbrazet");
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


<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Prishtina Airport</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
       
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input type="email" name="email" placeholder="Email" />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="password" placeholder="Password"  />
          </div>
          <div class="input_field checkbox_option">
            	<input type="checkbox" id="cb1">
    			<label for="cb1">Remember Me</label>
            </div>
          <input class="button" type="submit" name="login" value="Llog in" />
          <input class="button" type="submit" name="createaccount" value="Create account" />
          <span class="error"> <?php echo $msgError;?></span>
        </form>
      </div>
    </div>

  </div>
  
</div>
<!-- <div class="dim-overlay"></div> -->



