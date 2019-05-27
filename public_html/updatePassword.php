<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
  require_once("../resources/config.php");
  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  include(databaza);
  $db=new database();


  $password=$_POST['pass'];
  $passwordiri=$_POST['conpass'];
  $passwordiriKonfirmo=$_POST['conpass1'];
  $email=$_POST['email'];

  $salt="SELECT salt from user where email='$email'";
  if($passwordiri==$passwordiriKonfirmo)
  {
      $pass1=sha1($salt.$passwordiri);
      $sql="UPDATE user set password='$pass1' where email='$email';";
      $result=$db->executeData($sql);
      var_dump($result);
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <form  method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <input type="email" name="email" placeholder="Sheno email">
  <input type="password" name="pass" placeholder="Shkruj passing">
  <input type="password" name="conpass" placeholder="Nderro passin">
  <input type="password" name="conpass1" placeholder="Konfirmo passin">
  <input type="submit" value="submit">
  </form>
</body>
</html>