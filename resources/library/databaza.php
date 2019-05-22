<?php

include (__DIR__."/../config.php");


















class db_connector {
  private $connection;

  protected function connector_create_db() {
       global $config;
       $this->connection=mysqli_connect($config["db"]["host"],$config["db"]["username"],$config["db"]["password"]);
       if(!$this->connection)
       {
           die("Connection failed");

       }

       $sql="CREATE DATABASE ".$config["db"]["dbname"];

       if(mysqli_query($this->connection,$sql))
           $rez=true;
        else
           $rez=false;

//  $this->close_connection();
        return $rez;

        
     
  }
 


};







?>