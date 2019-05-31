<?php

include (__DIR__."/../config.php");



class database extends db_connector {
  
}


class db_connector {
  public $connection;

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
  public function getData($sql)
  {
    $this->connect();
   
    $array = array();
      mysqli_real_escape_string($this->connection,$sql);
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($array, $row);
            }
        }
        $this->close_connection();
        return $array;

  }
  public function executeData($sql){
    
    $this->connect();
    mysqli_real_escape_string($this->connection,$sql);  
    $result=mysqli_query($this->connection,$sql);
    $this->close_connection();
    return $result;
  }

  public function connect()
  {
    global $config;
    $this->connection=mysqli_connect($config['db']['host'],$config['db']['user'],$config['db']['password'],$config['db']['dbname']);
    $error = mysqli_connect_error();
    if ( mysqli_connect_errno() ) {
      die( mysqli_connect_error() ); // die() is equivalent to exit()
      }

  }
  private function close_connection()
  {

    mysqli_close($this->connection);
  }
 


};







?>