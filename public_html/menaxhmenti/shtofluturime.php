<?php
// initialize page globals
require_once('../../resources/config.php');
require_once('../../resources/classes/Flight.class.php');

include(databaza);
// class name for hiding a <div>
$GLOBALS['updateStatus'] = 'hide';
// the message to be displayed after saving
$GLOBALS['saveMessage'] = '';
try {
// set up the PDO connection to database
$db=new database();
// perform the algorithm and return populated Author object
$Flight = processFlightFormInfo($db);
if ( $Flight->isNew() ) {
	$buttonText = 'Add';
	}
	else {
	$buttonText = 'Edit';
	}
	}
	catch (Exception $e) {
	die( $e->getMessage() );
	}
	?>


<!DOCTYPE html>
<html>
<head lang="en">
<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP-SELF']?>">
<fieldset>
<legend>Flight Form</legend>
<input type="hidden" name="id" value="<?php echo $Flight->id ?>" />
<label>Origjina</label>
<input type="text" name="origin"
placeholder="Enter origin" value=" <?php echo $Flight->origin; ?>">
<label>Destination</label>
<input type="text" name="destination"
placeholder="Enter destination"
value="<?php echo $Flight->destination; ?>">
<label>Flight date</label>
<input type="text" name="flight_date"
placeholder="Enter flight_date"
value="<?php echo $Flight->flight_date; ?>">
<button type="submit" >
<?php echo $buttonText; ?>
</button>
</fieldset>
</form>
<div class="alert alert-info <?php echo $GLOBALS['updateStatus']; ?>">
<p> <?php echo $GLOBALS['saveMessage']; ?> </p>
</div>