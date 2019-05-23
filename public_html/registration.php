<?php 

require_once("../resources/config.php");

$css_includes=Array("../css/registration.css");
echo bootstrap_includes;  

include_once(databaza);


$db=new database();
echo $db->connect();

$msgError=$email="";
if($_SERVER['REQUEST_METHOD']=="POST")
{
  if($_POST['emri']==""||
    $_POST['mbiemri']==""||
     ($_POST['email']=="" && $_POST['email'] != filter_var($email,FILTER_VALIDATE_EMAIL)) ||
     $_POST['password']==""||
     $_POST['passwordk']=="" ||
     empty($_POST['checkbox']))
     {
        $msgError=("Plotesoni te gjitha fushat dhe vendos tik-un");
     }
    else
  {
      $emri=$_POST['emri'];
      $mbiemri=$_POST['mbiemri'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $query="INSERT INTO user(emri,mbiemri,email,password) VALUES('$emri','$mbiemri','$email','$password')";    

      $db->executeData($query);
    header("Location:llogin.php");
  }
}


include_once(templates_header);
?>


<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Formulari i Regjistrimit</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="emri" placeholder="Emri" />
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="mbiemri" placeholder="Mbiemri"  />
              </div>
            </div>
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input type="email" name="email" placeholder="Email"  />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="password" placeholder="Password"  />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="passwordk" placeholder="Konfirmo Password-in"  />
          </div>
            <div class="input_field checkbox_option">
            	<input type="checkbox" id="cb1" name="checkbox">
    			<label for="cb1">Pajtohem me kushtet dhe kerkesat</label>
            </div>
           
          <input class="button" type="submit" value="Register" />
          <span class="error"> <?php echo $msgError;?></span>

        </form>
      </div>
    </div>
  </div>
</div>




<?php 

       include(templates_footer); ?>
