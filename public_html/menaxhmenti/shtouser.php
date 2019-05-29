<?php

 require_once("../../resources/config.php");

 require_once("../../resources/classes/User.class.php");
 include(databaza);

 $db=new database();
 if($_SERVER['REQUEST_METHOD']=="POST")
  {
      if($_POST['isManager']=="on")
       {
           $isManager=1;
       }
       else {
           $isManager=0;
       }
      $user=new User($_POST['emri'],$_POST['mbiemri'],$_POST['email'],$_POST['password'],$isManager);
      echo "{$user->getManager()}";
      if(insertUser($db,$user))
       { 
            echo "sukses";
       }
       else {
           echo "fuck";
       }

  }

  
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" name="emri">
    <input type="text" name="mbiemri">
    <input type="email" name="email" id="">
    <input type="password" name="password">
    <input type="radio" name="isManager">
    <input type="submit" value="Submit">
 
</form>

 <?php
 function RandomString()
 {
     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $randstring = '';
     for ($i = 0; $i < 10; $i++) {
         $randstring = $characters[rand(0, strlen($characters))];
     }
     return $randstring;
 }
 RandomString();
 $str = "Hello";
 echo sha1(RandomString().$str)."<br/>";
 echo sha1(RandomString().$str);
 ?>
