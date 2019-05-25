<?php

include (__DIR__."/../config.php");



class database extends db_connector {
  
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
  public function getData($sql)
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
    mysqli_real_escape_string($sql);
    mysqli_query($this->connection,$sql);
    $this->close_connection();
  }
  public function sanitizedexecuteData() {
    $this->connect();
    $parametrat=func_get_args();
    $sql=array_shift($parametrat);
    if(count($parametrat)==3){
           $stmt=mysqli_prepare($sql);
           $stmt->bind_param("ssss",$parametrat[0],$parametrat[1],$parametrat[2]);
           $stmt->execute();
           $stmt->close();
    }
    if(count($parametrat)==4){
      $stmt=mysqli_prepare($sql);
      $stmt->bind_param("sssss",$parametrat[0],$parametrat[1],$parametrat[2],$parametrat[3]);
      $stmt->execute();
      $stmt->close();
    }
    $this->close_connection();
  }
  public function sanitizedgetData(){
    $this->connect();
    $parametrat=func_num_args();
    $sql=array_shif($parametrat);
       $stmt=mysqli_prepare($sql);
       $stmt->bind_param("i",$parametrat[0]);
       $stmt->execute();
       $result=$stmt->get_result();

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