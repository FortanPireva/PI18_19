<?php
 require_once('../../resources/config.php');

 include(databaza);

if($_SERVER['REQUEST_METHOD']=="POST"){
    $id=$_POST['id'];
    $db=new database();

    $sql="DELETE FROM flights where fid=$id";

    if($db->executeData($sql))
    {
        header("Location:tabelaFluturimeve.php");
    }
    

}

?>