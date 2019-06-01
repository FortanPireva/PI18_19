<?php
 require_once('../../resources/config.php');

 include(databaza);

if($_SERVER['REQUEST_METHOD']=="POST"){
    $id=$_POST['uid'];
    $db=new database();

    $sql="DELETE FROM user where uid=$id";

    if($db->executeData($sql))
    {
        header("Location:tabelaPerdoruesit.php");
    }
    

}

?>