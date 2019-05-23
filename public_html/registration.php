<?php 

require_once("../resources/config.php");

$css_includes=Array("../css/registration.css");
echo bootstrap_includes;  

include_once(databaza);


$db=new database();
echo $db->connect();

if($_SERVER['REQUEST_METHOD']=="POST")
{
  if($_POST['emri']==""||
    $_POST['mbiemri']==""||
     $_POST['email']==""||
     $_POST['password']==""||
     $_POST['passwordk']=="")
     {
        $msgError=htmlspecialchars("Fusha nuk duhet te lihet e zbrazet");
     }
  else
  {
      $emri=$_POST['emri'];
      $mbiemri=$_POST['mbiemri'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $query="INSERT INTO user(emri,mbiemri,email,password) VALUES('$emri','$mbiemri','$email','$password')";    

      $db->executeData($query);
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
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
        <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="emri" placeholder="Emri" />
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="mbiemri" placeholder="Mbiemri" required />
              </div>
            </div>
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input type="email" name="email" placeholder="Email" required />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="password" placeholder="Password" required />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="passwordk" placeholder="Konfirmo Password-in" required />
          </div>
          
            
            <div class="input_field checkbox_option">
            	<input type="checkbox" id="cb1">
    			<label for="cb1">Pajtohem me kushtet dhe kerkesat</label>
            </div>
           
          <input class="button" type="submit" value="Register" />
        </form>
      </div>
    </div>
  </div>
</div>




<?php 

       include(templates_footer); ?>
