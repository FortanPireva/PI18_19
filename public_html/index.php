<?php

 require_once("../resources/config.php");
 include_once(databaza);

 $db=new database();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/index.css">
    <title>Menaxhimi i Aeroportit</title>
</head>
<body>
    <?php include(templates_header) ?>
  
 
<section class="padded">
        <h3 class="padded">5 Udhetimet e ardhshme Aeroplan</h3>
        <form method='Post' action="<?php echo $_SERVER['PHP-SELF']?>">
            <input type='hidden' id='udhetimiId' name='udhetimiId'>
            <table class='tabela' cellspacing='0'>
                <thead>
                    <th align='left'>Prej</th>
                    <th align='left'>Deri</th>
                    <th align='left'>Data</th>
                    <th style='width: auto;'></th>
                </thead>
                <?php 
                $rez = $db->getData("Select * From flights Where flight_date >= Now() order by flight_date Limit 5");
                
                foreach ($rez as $rreshti) {
                    echo "<tr><td>".$rreshti['origin']."</td><td>".$rreshti['destination']."</td><td>".$rreshti['flight_date']."</td><td style='text-align: center'>"                       
                    . "<input type='submit' value='Rezervo' class='button button-small id-submit' id='id_".$rreshti['fid']."'></td></tr>";
                }
                ?>
            </table>
        </form>

  
</body>
</html>