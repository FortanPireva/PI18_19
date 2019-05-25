<?php

class Flight {
    public $id="";
    public $origin="";
    public $destination="";
    public $flight_date="";
    public $flight_return="";

    function __construct()
    {
        $args=func_get_args();
        switch(func_num_args())
        {
            case 4:
              $this->constructor1($args[0],$args[1],$args[2],$args[3]);//thirr konstruktorin me 4 variabla data e kthimit te aeroplanit nuk specifikohet
              break;
            case 5:
              $this->constructor2($args[0],$args[1],$args[2],$args[3],$args[4]);//thirr konstruktorin si funksion me 5 variabla
              break;
            default:
               trigger_error('Incorrect number of arguments for Author::__construct ',  E_USER_WARNING);
        }
       
        
    }
    private function constructor1($id,$origin,$destination,$flight_date)
    {
        $this->id=$id;
        $this->origin=$origin;
        $this->destination=$destination;
        $this->flight_date=$flight_date;
    }
    private function constructor2($id,$origin,$destination,$flight_date,$flight_return) {
        $this->id=$id;
        $this->origin=$origin;
        $this->destination=$destination;
        $this->flight_date=$flight_date;
        $this->flight_return=$flight_return;
    }
    function isNew()
    {
        if(empty($this->id))
             return true;
        return false;
    }

}

function processFlightFormInfo($connection) {
    if(!isThereQueryStringInfo())
    {
        return new Flight("","","","");
    }
    if ( areEditingExisting() ) {
        $which = $_GET['which'];
        // retrieve data from database
        return retrieveFlight($connection, $which);
    }
    if ( areSaving() ) {
        // if here then saving a record
        // we are going to use the existence of an ID querystring to
        // determine whether we should be inserting or updating
        $id = "";
        if ( isset($_POST['id']) ) {
        $id = $_POST['id'];
        }
        $flight = saveFlight( $connection, $id, $_POST['origin'],
        $_POST['destination'], $_POST['flight_date'],$_POST['flight_return']);
        return $flight;
        }
    }
//helper functions

function isThereQueryStringInfo() {
    if ( areEditingExisting() ) {
            return true;
    }
    if ( areSaving() ) {
             return true;
    }
         return false;
    }
    /*
    Checks if query string info tells us whether we are editing
    existing author
    */
function areEditingExisting() {
  if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['which'])) {
    
          return true;
    }
}
function areSaving() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['origin']) &&
    isset($_POST['destination']) ) {
    return true;
    }
    }


function saveFlight($db,$id,$origin,$destination,$flight_date,$flight_return){

     $GLOBALS['updateStatus']='';
     $sql='';
     if(empty($flight_return)) {
               $flight = new Flight($id, $origin, $destination, $flight_date);
    // set up sql statement and page's message
            if ( $flight->isNew() )
                 {
                   $sql = "INSERT INTO flights (origin,destination,flight_date)
                    VALUES (:origin,:destination,:flight_date)";
                    $GLOBALS['saveMessage'] = 'Added new ';
                    $db->sanitizedexecuteData($sql,$origin,$destination,$flight_date);
                 }
           else {
                   $sql = "UPDATE flights SET origin=:origin,destination=:destination,
                     flight_date=:flight_date WHERE fid=:fid";
                    $GLOBALS['saveMessage'] = 'Edited existing ';

     }
        
    }
    else{
        $flight = new Flight($id, $origin, $destination, $flight_date,$flight_return);
    // set up sql statement and page's message
            if ( $flight->isNew() )
                 {
                   $sql = "INSERT INTO flights (origin,destination,flight_date,flight_return)
                    VALUES (:origin,:destination,:flight_date,:flight_return)";
                    $GLOBALS['saveMessage'] = 'Added new ';
                    $db->sanitizedexecuteData($sql,$origin,$destination,$flight_date,$flight_return);

                 }
           else {
                   $sql = "UPDATE flights SET origin=:origin,destination=:destination,
                     flight_date=:flight_date,flight_return=:flight_return WHERE fid=:fid";
                    $GLOBALS['saveMessage'] = 'Edited existing ';


    }

}};

 function retrieveFlight($db,$id) {
         $sql = "SELECT * FROM flights WHERE ID=:fid";
        $row=$db->sanitizedGetDat($sql,$id);
         return new Flight($row['fid'], $row['origin'], $row['destination'],
          $row['flight_date']);
        }
?>