<?php 
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  header("Location:searchFlight.php");
}


require_once("../resources/config.php");

$css_includes=Array("../css/registration.css");
echo bootstrap_includes;  

include_once(databaza);


$db=new database();
echo $db->connect();

$msgError = $passerror= $member_login=$member_password="";
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
      $query1="SELECT salt from user where email='$email'";
      $salt=$db->getData($query1);
      $salt=implode(",",$salt[0]);
      echo $salt."<br/>";
      $password=sha1($salt.$password);
      echo $password;
      $query="SELECT * FROM  user where email='$email' and password='$password';";    
      
      $array=array();
      $array=$db->getData($query);
  if(count($array)>0)
      { 
          $teksti="Perdoruesi : ".$array[0]['emri']." ".$array[0]['mbiemri']." eshte kyqur me:". date("Y-m-d h:i:sa")."\n";
          fwrite($myfile,$teksti);
          if(!empty($_POST["rememberme"]))
          {
            setcookie('member_login',$_POST['email'],time() +(10 *3600));
            setcookie('member_password',$_POST['password'],time() +(10 *3600));
          }
          else{
            if(isset($_COOKIE['member_login'])){
              setcookie('member_login',"");
            }
            if(isset($_COOKIE['member_password'])){
              setcookie('member_password',"");
            }
          }
        if($array[0]['isManager']==0)
          header("Location:searchFlight.php");
        else
          header("Location:menaxhmenti/shtouser.php");
          $myfile = file_put_contents('../resources/library/userdata.txt', $teksti.PHP_EOL , FILE_APPEND | LOCK_EX);
      }
    
  else{
    $passerror=("Email ose Passwordi jan gabim");
    $error=true;
  }
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
      <div class="" style="width:100%;">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
       
       <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
         <input type="email" name="email" placeholder="Email" <?php if(isset($_COOKIE['member_login'])){echo "value='{$_COOKIE['member_login']}'";} ?>>
       </div>
       <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
         <input type="password" name="password" placeholder="Password" <?php if(isset($_COOKIE['member_password'])){echo "value='{$_COOKIE['member_password']}'";} ?>>
       </div>
       <span class="error"> <?php echo $passerror;?></span>
       <div class="input_field checkbox_option">
           <input type="checkbox" id="cb1" name="rememberme">
       <label for="cb1">Remember Me</label>
      </div> 
          <input class="button" type="submit" name="login" value="Llog in" />
          <input class="button" type="submit" name="createaccount" value="Create account" />
          <span class="error"> <?php echo $msgError;?></span>
          <?php
            if(isset($error))
            {
                 echo "<span><a href=\"updatePassword.php\">Update Pass</a></span>";
            }
          ?>
          
          
        </form>
      </div>
    </div>

  </div>
  
</div>
<!-- <div class="dim-overlay"></div> -->
<!-- <div class="dim-overlay"></div> -->

<?php include_once(templates_footer);
?>
