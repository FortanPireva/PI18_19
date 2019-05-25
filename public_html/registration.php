<?php 

require_once("../resources/config.php");

$css_includes=Array("../css/registration.css");
echo bootstrap_includes;  

include_once(databaza);


$db=new database();
echo $db->connect();

$msgError=$email=$machErr="";

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
   else if($_POST['password'] != $_POST['passwordk']){
    $machErr=("Password -at nuk perputhen");
  }
    else
  {
      $emri=$_POST['emri'];
      $mbiemri=$_POST['mbiemri'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $query="INSERT INTO user(emri,mbiemri,email,isManager,password) VALUES('$emri','$mbiemri','$email',0,'$password')";  
      echo $query;  
      echo $db->executeData($query);
    // header("Location:llogin.php");
  }
}

?>
<script>

  function shfaqKushtet(checkbox) {
    if(checkbox.checked == true){
        document.getElementById("divkushtet").style.display="block";
    }
    else {
      document.getElementById("divkushtet").style.display="none";
    }
    
   }
   function isEmailValid(email)
{
    var xmlhttp=new XMLHttpRequest();
    if (email.length == 0) { 
        //shkruj ni alert qi emaili zbrazet
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("paragrafi").style.display="block";
            document.getElementById("paragrafi").innerHTML = this.responseText;
            document.getElementById("email").style.border="1px solid red";
            
          }
          
        };
        xmlhttp.open("GET", "../resources/controllers/verifyemail.php?q=" + email, true);
        xmlhttp.send();
        header("Location:index.php");
      }
}
function border()
{
  document.getElemntById("email").style.border='1px solid #cccccc';
}
    
  </script>

<?php


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
            
            <input type="email" style="border:  1px solid #cccccc"id="email" name="email" placeholder="Email" onblur="isEmailValid(this.value)"/>
            <p id="paragrafi" style="display:none;font-size:10px;text-align:center;color:red"></p>
          
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="password" placeholder="Password"  />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="passwordk" placeholder="Konfirmo Password-in"  />
          </div>
          <span class="error"> <?php echo $machErr;?></span>
            <div class="input_field checkbox_option">
            <input type="checkbox" id="cb1" name="checkbox" onchange="shfaqKushtet(this)">
    			<label for="cb1">Shiko dhe prano kushtet dhe kerkesat</label></div>
          <div style="overflow:scroll;height:150px;display:none" id="divkushtet">
            <?php $readfile=fopen("../resources/library/kushtet.txt", "r") or die("Unable to open file!");
                     
                     while(!feof($readfile)) {
                      echo fgets($readfile) . "\n";
                    }
                    fclose($readfile);

          
          ?>
          <p>
                  </div>
                  <!-- <div class="input_field1 checkbox_optio1n">
          <input type="checkbox" id="cb12" name="checkbox1" >
    			<label for="cb112">Pajtohem me kushtet dhe kerkesat</label>
          </div> -->
           
          <input class="button" type="submit" value="Register" />
          <span class="error"> <?php echo $msgError;?></span>

        </form>
      </div>
    </div>
  </div>
</div>




<?php 

       include(templates_footer); ?>
