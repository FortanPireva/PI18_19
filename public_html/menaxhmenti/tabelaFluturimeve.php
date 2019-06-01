<?php


 require_once('../../resources/config.php');

 require_once("../../resources/classes/Flight.class.php");
 include(databaza);

 $bootstrap="../../css/bootstrap.min.css";
 $css_includes=Array("../../css/update.css","../../css/tableMenaxhim.css");
 include(templates_dashboard_header);
 
 ?>
<div style="position:absolute;left:150%;width:100%;top:0%;">
<form method='POST'>
                <input type='hidden' id='udhetimiId' name='udhetimiId'>
                <table class='tabela' cellspacing='0' style="align-items:center;">
                    <thead>
                        <th align='left'>Prej</th>
                        <th align='left'>Deri</th>
                        <th align='left'>Data</th>
                        <th align="left">Qmimi</th>
                    </thead>
                    <?php 
				$db=new database();
                $rez = $db->getData("Select * From flights  order by flight_date");

                foreach ($rez as $rreshti) {
                    echo "<tr><td>".$rreshti['origin']."</td><td>".$rreshti['destination']."</td><td>".$rreshti['flight_date']."</td><td>".$rreshti['Qmimi']."</td> <td style='text-align: center'>"                       
                    . "<input type='submit'formaction=\"editFlight.php\"value='Edit' class='button button-small id-submit' id='id_".$rreshti['fid']."'></td><td><input type='submit' formaction=\"deleteFlight.php\" value='Delete' class='button button-small id-submit' id='id_".$rreshti['fid']."'></td></tr>";
                }
                ?>
                </table>
            </form>
</div>