<!doctype html>
<html>
<head>
<title>K-Car > Trolley Routes 10</title>


</head>
<body>
<?php
// connect to SEPTA to get vehicle locations
// create a new cURL resource
// $ch = curl_init();

// // set URL and other appropriate options
// curl_setopt($ch, CURLOPT_URL, "http://www3.septa.org/hackathon/TransitViewAll/'");
// curl_setopt($ch, CURLOPT_HEADER, 0);

// // grab URL and pass it to the browser
// curl_exec($ch);

// close cURL resource, and free up system resources

$json = file_get_contents('http://www3.septa.org/hackathon/TransitView/10');
// $json = "http://www3.septa.org/hackathon/TransitViewAll/";

// you can save $json to a file, if needed :
//file_put_contents('file/path/my-file.txt', $json);

// get data from JSON feed
$data = json_decode($json, true);

// DEBUG: dump fetched data
var_dump($data);

// http://stackoverflow.com/questions/17995877/get-value-from-json-array-in-php

echo $data;

foreach ($data as $line) { // parse the returned data
    $lat = $line->bus->lat; // get lat value
    $lng =  $line->bus->lng; // get lng value
    $vehicleNo = $line->bus->VehicleID; // get vehicle ID number
    $direction = $line->bus->Direction; // get direction of travel
    $goingTo = $line->bus->destination; // get vehicle destination
    $lastReport = $line->bus->Offset; // get minutes since last location report
    $message = '<li> Vehicle No. '.$vehicleNo.' heading '.$direction.' to '.$goingTo.' was last seen '.$lastReport.' minutes ago at '.$lat.' latitude and '.$lng.' longitute.';
    echo $message; // return the status
}
// curl_close($ch);



// '<li>'.$status.'</span> <a style="font-size:85%" href="http://twitter.com/'.$userName.'/statuses/'.$tweetId.'">'. $tweetTime .'</a></li>'; // Render our beautiful new tweet
//     echo $outputTweet; // echo the tweet
// }

?>
</body>
</html>