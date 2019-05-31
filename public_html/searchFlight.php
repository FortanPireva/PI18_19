<?php
  require('../resources/config.php');
  include(databaza);

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Flight Ticket Booking a Flat Responsive Widget Template :: w3layouts</title>
        <link rel="stylesheet" href="../css/style.css">
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href="../css/index.css" rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Flight Ticket Booking  Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
        <script type="application/x-javascript">
            addEventListener("load", function() {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>

    </head>

    <body>
        <h1>Flight Ticket Booking</h1>
        <div class="main-agileinfo">
            <div class="sap_tabs">
                <div id="horizontalTab">
                    <ul class="resp-tabs-list">
                        <li class="resp-tab-item"><span>Round Trip</span></li>
                        <li class="resp-tab-item"><span>One way</span></li>
                        
                    </ul>
                    <div class="clearfix"> </div>
                    <div class="resp-tabs-container">
                        <div class="tab-1 resp-tab-content roundtrip">
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                <div class="from">
                                    <h3>From</h3>
                                    <input type="text" name="origin" class="city1" placeholder="Type Departure City" required="">
                                </div>
                                <div class="to">
                                    <h3>To</h3>
                                    <input type="text" name="destination" class="city2" placeholder="Type Destination City" required="">
                                </div>
                                <div class="clear"></div>
                                <div class="date">
                                    <div class="depart">
                                        <h3>Depart</h3>
                                        <input id="datepicker" name="date" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
                                        <span class="checkbox1">
										<label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Flexible with date</label>
									</span>
                                    </div>
                                    <div class="return">
                                        <h3>Return</h3>
                                        <input id="datepicker1" name="Text" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
                                        <span class="checkbox1">
										<label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Flexible with date</label>
									</span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="class">
                                    <h3>Class</h3>
                                    <select id="w3_country1" onchange="change_country(this.value)" class="frm-field required">
                                        <option value="null">Economy</option>
                                        <option value="null">Premium Economy</option>
                                        <option value="null">Business</option>
                                        <option value="null">First class</option>
                                    </select>

                                </div>
                                <div class="clear"></div>
                                <div class="numofppl">

                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>

                                <input type="submit" value="Search Flights" id="searchFlight">
                            </form>
                        </div>
                        <div class="tab-1 resp-tab-content oneway">
                            <form action="#" method="post">
                                <div class="from">
                                    <h3>From</h3>
                                    <input type="text" name="city" class="city1" placeholder="Type Departure City" required="">
                                </div>
                                <div class="to">
                                    <h3>To</h3>
                                    <input type="text" name="city" class="city2" placeholder="Type Destination City" required="">
                                </div>
                                <div class="clear"></div>
                                <div class="date">
                                    <div class="depart">
                                        <h3>Depart</h3>
                                        <input class="date" id="datepicker2" name="Text" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
                                        <span class="checkbox1">
										<label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Flexible with date</label>
									</span>
                                    </div>
                                </div>
                                <div class="class">
                                    <h3>Class</h3>
                                    <select id="w3_country1" onchange="change_country(this.value)" class="frm-field required">
                                        <option value="null">Economy</option>
                                        <option value="null">Premium Economy</option>
                                        <option value="null">Business</option>
                                        <option value="null">First class</option>
                                    </select>

                                </div>
                                <div class="clear"></div>
                                <div class="numofppl">

                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                                <input type="submit"  value="Search Flights" id="searchFlight">
                            </form>

                        </div>
                       

                    </div>
                </div>
            </div>

        </div>
        <div style="color:orange;width:50%;margin:auto" id="tabela1">
            <form method='Post' action="<?php echo $_SERVER['PHP-SELF']?>">
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
                $rez = $db->getData("Select * From flights Where flight_date >= Now() order by flight_date Limit 5");

                foreach ($rez as $rreshti) {
                    echo "<tr><td>".$rreshti['origin']."</td><td>".$rreshti['destination']."</td><td>".$rreshti['flight_date']."</td><td>".$rreshti['Qmimi']."</td> <td style='text-align: center'>"                       
                    . "<input type='submit' value='Rezervo' class='button button-small id-submit' id='id_".$rreshti['fid']."'></td></tr>";
                }
                ?>
                </table>
            </form>
        </div>
        <br/>
        <div style="color:orange;width:50%;margin:auto;display:block	;" id="tabela2">
            <form method='POST' action="payment.php">
                <input type='hidden' id='udhetimiId' name='udhetimiId'>
                <table class='tabela' cellspacing='0' style="align-items:center;">
                    <thead>
                        <th align='left'>Prej</th>
                        <th align='left'>Deri</th>
                        <th align='left'>Data</th>
                        <th align="left">Qmimi</th>
                    </thead>
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
			  $query="SELECT * FROM flights where origin='$origin'"."AND destination='$destination'"."AND flight_date='$date'";
            
	$array=$db->getData($query);

				if (is_array($array) || is_object($array))
				{

				foreach ($array as $key=>$rreshti) {
                    echo "<tr><td>".$rreshti['origin']."</td><td>".$rreshti['destination']."</td><td>".$rreshti['flight_date']."</td><td>".$rreshti['Qmimi']."</td><td style='text-align: center'>"                       
                    . "<input type='submit' name='paySubmit'  value='Rezervo' name class='button button-small id-submit' ></td><td><input type='hidden' name='rreshti' value=\"".$rreshti['fid']."\"> </tr></form>";
					
				}

			}
		}

	}
		?>
                </table>
						</form>
						
        </div>
        <div class="footer-w3l">
            <p class="agileinfo"> &copy; 2016 Flight Ticket Booking . All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
        </div>

        <!--script for portfolio-->
        <script src="../js/jquery.min.js">
        </script>
        <script src="../js/easyResponsiveTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true // 100% fit in a container
                });
            });
        </script>
        <!--//script for portfolio-->
        <!-- Calendar -->
        <link rel="stylesheet" href="../css/jquery-ui.css" />
        <script src="../js/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
            });
            document.getElementById('searchFlight').addEventListener('click', showtable);

            function showtable() {

                document.getElementById("tabela2").style.display = "block";
								document.getElementById("tabela1").style.display = "none";

            }
        </script>
        <!-- //Calendar -->
        <!--quantity-->

        <script>
            $('.value-plus').on('click', function() {
                var divUpd = $(this).parent().find('.value'),
                    newVal = parseInt(divUpd.text(), 10) + 1;
                divUpd.text(newVal);
            });

            $('.value-minus').on('click', function() {
                var divUpd = $(this).parent().find('.value'),
                    newVal = parseInt(divUpd.text(), 10) - 1;
                if (newVal >= 1) divUpd.text(newVal);
            });
        </script>
        <!--//quantity-->
        <!--load more-->
        <script>
            $(document).ready(function() {
                size_li = $("#myList li").size();
                x = 1;
                $('#myList li:lt(' + x + ')').show();
                $('#loadMore').click(function() {
                    x = (x + 1 <= size_li) ? x + 1 : size_li;
                    $('#myList li:lt(' + x + ')').show();
                });
                $('#showLess').click(function() {
                    x = (x - 1 < 0) ? 1 : x - 1;
                    $('#myList li').not(':lt(' + x + ')').hide();
                });
            });
        </script>
        <!-- //load-more -->

    </body>

    </html>