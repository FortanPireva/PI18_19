<?php
$_DIR=str_replace('\\','/',dirname(__FILE__));
$_DIR1=substr($_DIR,15,23);
$config=array(
    "db"=>array(
      "dbname"=>"menaxhimiifluturimeve",
      "user"=>"root",
      "password"=>"",
      "host"=>"localhost",
    ),
    
);


defined("databaza") or define("databaza",$_DIR."/library/databaza.php");
defined("templates_header") or define("templates_header", $_DIR . "/templates/header.php");
defined("templates_footer") or define("templates_footer", $_DIR. "/templates/footer.php");
defined("bootstrap_includes") or define("bootstrap_includes","<link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.8.2/css/all.css\" integrity=\"sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay\" crossorigin=\"anonymous\">");

?>