<?php 

require_once("../resources/config.php");

$css_includes=Array("../css/registration.css");
echo bootstrap_includes;  

include_once(databaza);


$db=new database();
echo $db->connect();

$msgError = $passerror= "";
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
      $query="SELECT * FROM  user where email='$email' and password='$password';";    
      
      $array=array();
      $array=$db->getData($query);
  if(count($array)>0)
      {
          $teksti="Perdoruesi : ".$array[0]['emri']." ".$array[0]['mbiemri']." eshte kyqur me:". date("Y-m-d h:i:sa")."\n";
          fwrite($myfile,$teksti);
          header("Location:searchFlight.php");
          $myfile = file_put_contents('../resources/library/userdata.txt', $teksti.PHP_EOL , FILE_APPEND | LOCK_EX);
      }
    
  else{
    $passerror=("Email ose Passwordi jan gabim");
  }
}

$header_css="../css/style2.css";

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
          <span class="error"> <?php echo $passerror;?></span>
          <div class="input_field checkbox_option">
            	<input type="checkbox" id="cb1" name="rememberme">
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
<!-- <div class="dim-overlay"></div> -->

<?php include_once(templates_footer);

