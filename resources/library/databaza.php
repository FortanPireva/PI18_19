<?php

include (__DIR__."/../config.php");



class database extends db_connector {
  public function __get($name)
  {
    switch($name)
    {
      case "USERS";
         return $this->getData("SELECT * FROM USERS");
    }
  }
}














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
  protected function getData($sql)
  {
    $this->connect();

    $array = array();
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
    mysqli_query($this->connection,$sql);
    $this->close_connection();
  }

  public function connect()
  {
    global $config;
    $this->connection=mysqli_connect($config['db']['host'],$config['db']['user'],$config['db']['password'],$config['db']['dbname']);
    if(!$this->connection)
     {
       die('Connection failed');
     }
  }
  private function close_connection()
  {

    mysqli_close($this->connection);
  }
 


};







?>