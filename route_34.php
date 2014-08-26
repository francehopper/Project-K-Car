<!doctype html>
<html>
<head>
	<title>K-Car > Trolley Route 34</title>
</head>
<body>
<?php
// open an SQL connection
$connection = mysqli_connect('totoro.hppr.co', 'SEPTA', 'D1oASa!', 'SEPTA') or die(mysqli_connect_error());
date_default_timezone_set('UTC'); // set timezone as UTC
$today = date("Y-m-d H:i:s"); // fetch current date and time for SQL timestamping
// connect to SEPTA to get vehicle locations
$json = file_get_contents('http://www3.septa.org/hackathon/TransitView/34');
// get data from JSON feed
$data = json_decode($json, true);
// begin data processing
foreach ($data['bus'] as $line) { // parse the returned data
    $lat = $line['lat']; // get lat value
    $lng =  $line['lng']; // get lng value
    $vehicleNo = $line['VehicleID']; // get vehicle ID number
    $direction = $line['Direction']; // get direction of travel
    $goingTo = $line['destination']; // get vehicle destination
    $lastReport = $line['Offset']; // get minutes since last location report
    $message = '<li> Vehicle No. '.$vehicleNo.' heading '.$direction.' to '.$goingTo.' was last seen '.$lastReport.' minutes ago at '.$lat.' latitude and '.$lng.' longitute.';
    echo $message; // return the status
    // record results to SQL for tracking
    $thequery = 'insert into KCar (TrolleyNo, dest, lat, lng, direction, recordedAt) values ("'.$vehicleNo.'","'.$goingTo.'","'.$lat.'","'.$lng.'","'.$direction.'","'.$today.'")';
	mysqli_query($connection, $thequery) or die (mysqli_error($connection));
}
// close SQL connection
mysqli_close($connection);
// END OF PHP!
?>
</body>
</html>