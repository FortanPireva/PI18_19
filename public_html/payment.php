<?php 

require_once("../resources/config.php");

$css_includes=Array("../css/registration.css");
echo bootstrap_includes;  

include_once(databaza);
session_start();
if(!isset($_SESSION['email']) || !isset($_SESSION['password'])){
  header("Location: llogin.php");
}


$db=new database();
echo $db->connect();

$msgError=$email=$machErr="";

if($_SERVER['REQUEST_METHOD']=="POST")
{
  if($_POST['name_on_card']==""||
    $_POST['card_number']==""||
    
     $_POST['data_skadimit']==""||
     $_POST['CVV']=="" ||
     empty($_POST['checkbox']))
     {
        $msgError=("Plotesoni te gjitha fushat dhe vendos tik-un");
     }
   
     header("Location:searchFlight.php");
      
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
   
  </script>

<?php
  $css="../css/registration.php";
  $header_css="../css/style2.css";

include_once(templates_header);
?>


<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Formulari per Pagese</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
       
          <div class="input_field"></span>
            
            <input type="text" style="border:  1px solid #cccccc"id="email" name="name_on_card" placeholder="Name on Card" onblur="isEmailValid(this.value)"/>
            <p id="paragrafi" style="display:none;font-size:10px;text-align:center;color:red"></p>
          
          </div>
          <div class="input_field"> 
            <input type="text" name="card_number" placeholder="Card Number"  />
          </div>
        
          <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> </i></span>
                <input type="month" style="width=30px" name="data_skadimit" />
                
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> </span>
                <input type="text" name="CVV" placeholder="CVV"  />
              </div>
            </div>
          </div>
          <span class="error"> <?php echo $machErr;?></span>
            <div class="input_field checkbox_option">
            <input type="checkbox" id="cb1" name="checkbox" onchange="shfaqKushtet(this)">
    			<label for="cb1">Shiko dhe prano kushtet dhe kerkesat</label></div>
          <div style="overflow:hidden;height:150px;display:none" id="divkushtet">
            <?php $readfile=fopen("../resources/library/kushtet.txt", "r") or die("Unable to open file!");
                     
                     while(!feof($readfile)) {
                      echo fgets($readfile) . "\n";
                    }
                    fclose($readfile);

          
          ?>
                  </div>
            
           
          <input class="button" type="submit" value="Paguaj" />
          <span class="error"> <?php echo $msgError;?></span>

        </form>
      </div>
    </div>
  </div>
</div>




<?php 

       include(templates_footer); ?>
