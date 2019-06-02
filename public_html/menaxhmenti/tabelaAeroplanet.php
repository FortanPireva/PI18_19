<?php


 require_once('../../resources/config.php');

 require_once("../../resources/classes/Flight.class.php");
 include(databaza);

 $bootstrap="../../css/bootstrap.min.css";
 $css_includes=Array("../../css/update.css","../../css/tableMenaxhim.css");
 include(templates_dashboard_header);
 
 ?>
<div style="position:absolute;left:150%;width:100%;top:0%;">
                <input type='hidden' id='udhetimiId' name='udhetimiId'>
                <table class='tabela' cellspacing='0' style="align-items:center;">
                    <thead>
                        <th align='left'>Emri</th>
                        <th align='left'>Rangu i Distances</th>
                
                    </thead>
                    <?php 
				$db=new database();
                $rez = $db->getData("Select * From airplanes  order by aname");
               
                foreach ($rez as $rreshti) {
                    echo "<form method=\"POST\"><tr><td>".$rreshti['aname']."</td><td>".$rreshti['cruisingrange']."</td>
                    <td><input type=\"hidden\" name=\"id\" value=\"".$rreshti['aid']."\"></td> <td style='text-align: center'>"                       
                    . "<input type='submit'formaction=\"editAirplane.php\"value='Edit' class='button button-small id-submit' id='id_".$rreshti['aid']."'></td>
                    <td><input type='submit' formaction=\"deleteAirplane.php\" value='Delete' class='button button-small id-submit' id='id_".$rreshti['aid']."'></td></tr></form>";
                }
                ?>
                </table>  
</div>