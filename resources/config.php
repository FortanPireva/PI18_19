<?php
$_DIR=str_replace('\\','/',dirname(__FILE__));
$config=array(
    "db"=>array(
       "dbname"=>"c1vzMm1txW",
       "user"=>"c1vzMm1txW",
       "password"=>"EbTHDUUq4C",
      "host"=>"remotemysql.com",
    ));
$path=array(
  "css"=>array(
    "site.css","index.css","main.css","registration.css","style.css","util.css","jquery-ui.css"
  ),
  "js"=>array(
    "easyRespnsiveTabs.js","jquery-ui.js","jqeury-min.js","main.js","map-custom.js","stick-custom.js"
  )

  );
$siteLinks=array(
  "index.php","llogin.php","registration.php","searchFlight.php"
);

defined("databaza") or define("databaza",$_DIR."/library/databaza.php");
defined("templates_header") or define("templates_header", $_DIR . "/templates/header.php");
defined("templates_footer") or define("templates_footer", $_DIR. "/templates/footer.php");
defined("bootstrap_includes") or define("bootstrap_includes","<link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.8.2/css/all.css\" integrity=\"sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay\" crossorigin=\"anonymous\">");
defined("templates_dashboard_header") or define("templates_dashboard_heade",$_DIR."/templates/dashboard-header.php");
?>
