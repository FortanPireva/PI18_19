<?php

class Flight {
    public $id="";
    public $origin="";
    public $destination="";
    public $flight_date="";

    function __construct($id,$origin,$destination,$flight_date)
    {
        $this->id=$id;
        $this->origin=$origin;
        $this->destination=$destination;
        $this->flight_date=$flight_date;
        
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
        $_POST['destination'], $_POST['flight_date'] );
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
function saveFlight($connection, $id, $origin, $destination, $flight_date)
    {
    $GLOBALS['updateStatus'] = '';
    $flight = new Flight($id, $origin, $destination, $flight_date);
    // set up sql statement and page's message
    if ( $flight->isNew() )
    {
    $sql = "INSERT INTO flights (origin,destination,flight_date)
    VALUES (:origin,:destination,:flight_date)";
    $GLOBALS['saveMessage'] = 'Added new ';
    }
    else {
    $sql = "UPDATE authors SET FirstName=:first,LastName=:last,
    Institution=:institute WHERE ID=:id";
    $GLOBALS['saveMessage'] = 'Edited existing ';
}
      
    }
?>