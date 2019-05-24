<?php 


require_once("../config.php");

include_once(databaza);


$db=new database();
echo $db->connect();


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

      
      $query="SELECT origin,destination,flight_date FROM flights where origin='$origin'"."AND destination='$destination'"."AND flight_date='$date'";

 //     $db->executeData($query);
       $array=$db->getData($query);
       tabelaeFluturimeve($array);
   
  }
}


function tabelaeFluturimeve($array)
{
echo "<table border='1'>

    <tr>
    <th>Indeksi</th>
    <th>Origjina</th>
    
    <th>Destinacioni</th>
    
    <th>Data</th>
    
    </tr>";

    $i=0;

    while($i<count($array))
    {
        echo "<tr>";
        echo "<td>".($i+1)."</td>";
        echo "<td>" . $array[$i]['origin'] . "</td>";

        echo "<td>" . $array[$i]['destination'] . "</td>";
      
        echo "<td>" . $array[$i]['flight_date'] . "</td>";
      
      
        echo "</tr>";
        $i++;

    }
    echo "</table>";
}


?>