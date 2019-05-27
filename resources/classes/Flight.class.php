<?php 

class Flight{
  
    private $fid=0;
    private $origin="";
    private $destination="";
    private $flight_date="";
    private $flight_return="";

    public function __construct()
    {
        $nrParametrave=func_num_args();
        $parametrat=func_num_args();
        switch($nrParametrave){
          case 3:
              $this->constructor1($parametrat[0],$parametrat[1],$parametrat[2]);
              break;
          case 4:
              $this->constructor2($parametrat[0],$parametrat[1],$parametrat[2],$parametrat[3]);
          default:
             $this->fid="";

        }
        
    }
    private function constructor1($origin,$destination,$flight_date)
    {
        $fid++;
        $this->origin=$origin;
        $this->destination=$destination;
        $this->flight_date=$flight_date;
        
    }
    private function constructor2($origin,$destination,$flight_date,$flight_return)
    {
        $fid++;
        $this->origin=$origin;
        $this->destination=$destination;
        $this->flight_date=$flight_date;
        $this->flight_return=$flight_return;
        
    }
    
    public function __get($name)
    {
        return $name;
    }
    public function __set($name, $value)
    {
        $this->name=$value;
    }
}

function createFlight()
{
    $flight="";
    $parametrat=func_get_args();
    switch(count($parametrat))
    {
        case 3:
           $flight=new Flight($parametrat[0],$parametrat[1],$parametrat[2]);
        case 4:
           $flight=new Flight($parametrat[0],$parametrat[1],$parametrat[2],$parametrat[3]);
           
    }


}




?>