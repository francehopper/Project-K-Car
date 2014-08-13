<!doctype html>
<html>
<head>
	<title>K-Car > Trolley Route 10</title>
</head>
<body>
<?php
// connect to SEPTA to get vehicle locations
$json = file_get_contents('http://www3.septa.org/hackathon/TransitView/10');

// get data from JSON feed
$data = json_decode($json, true);

// DEBUG: dump fetched data
// echo "<p>Doing var_dump</p><br/>";
// var_dump($data); // works

// http://stackoverflow.com/questions/17995877/get-value-from-json-array-in-php
// debug
// echo "<p>Doing echo</p><br/>";
// foreach($data['bus'] as $result) {
//     echo $result['Direction'], '<br />';
// }



// $dataForGoogle = array();
// start Google Maps experiment
echo '<script type="text/javascript" src="https://www.google.com/jsapi"></script>';
echo '<script type="text/javascript">';
// echo 'google.load("visualization", "1", {packages:["map"]});';
// echo 'google.setOnLoadCallback(drawChart);';
// echo 'function drawChart() {';
// echo 'var data = google.visualization.arrayToDataTable([';
// echo '[\'Lat\', \'Long\', \'Destination\'],';
foreach ($data['bus'] as $line) { // parse the returned data
    $lat = $line['lat']; // get lat value
    $lng =  $line['lng']; // get lng value
    $vehicleNo = $line['VehicleID']; // get vehicle ID number
    $direction = $line['Direction']; // get direction of travel
    $goingTo = $line['destination']; // get vehicle destination
    $lastReport = $line['Offset']; // get minutes since last location report
    $message = '<li> Vehicle No. '.$vehicleNo.' heading '.$direction.' to '.$goingTo.' was last seen '.$lastReport.' minutes ago at '.$lat.' latitude and '.$lng.' longitute.';
    // echo $message; // return the status
    // echo '[$lat, $lng, $destination],'; // pass needed data to Google Maps for plotting
}
// echo ']);';
// echo 'var map = new google.visualization.Map(document.getElementById(\'map_div\'));';
// echo 'map.draw(data, {showTip: true});';
// echo '}';
echo '</script>';

// draw Google Map
echo '<div id="map_div" style="width: 400px; height: 300px"></div>';
// http://stackoverflow.com/questions/13731800/send-php-variable-to-javascript-function



// '<li>'.$status.'</span> <a style="font-size:85%" href="http://twitter.com/'.$userName.'/statuses/'.$tweetId.'">'. $tweetTime .'</a></li>'; // Render our beautiful new tweet
//     echo $outputTweet; // echo the tweet
// }
?>
    <!--  <script type="text/javascript" src="https://www.google.com/jsapi"></script> 
    <script type="text/javascript">
    //   google.load("visualization", "1", {packages:["map"]});
    //   google.setOnLoadCallback(drawChart);
    //   function drawChart() {
    //     var data = google.visualization.arrayToDataTable([
    //       // ['Lat', 'Long', 'Name'],
    //       // [37.4232, -122.0853, 'Work'],
    //       // [37.4289, -122.1697, 'University'],
    //       // [37.6153, -122.3900, 'Airport'],
    //       // [37.4422, -122.1731, 'Shopping']
    //     ]);

    //     var map = new google.visualization.Map(document.getElementById('map_div'));
    //     map.draw(data, {showTip: true});
    //   }

    // </script> -->
</body>
</html>