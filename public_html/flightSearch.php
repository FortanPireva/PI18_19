<?php 

require("../resources/config.php");

				include_once(databaza);
				
				$db=new database();
			
				global $array;
				
				if($_SERVER['REQUEST_METHOD']=="POST")
				{
				  if($_POST['origin']==""||
					$_POST['destination']==""||
					 $_POST['date']==""){
				
						   echo 'Sheno te dhenat';
					 }
					else
				  {
					  $origin=$_POST['origin'];
					  $destination=$_POST['destination'];
					  $date=$_POST['date'];
					  $date=date('Y-m-d',strtotime($_POST['date']));
        
					  echo $origin." ".$destination." ".$date;
					  $query="SELECT origin,destination,flight_date FROM flights where origin='$origin'"."AND destination='$destination'"."AND flight_date='$date'";
        
            $array=$db->getData($query);
					  
          }
          
					
        }
				



?>