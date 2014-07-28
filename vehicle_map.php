<!doctype html>
<html>
<head>
<title>K-Car > All vehicles on network</title>


</head>
<body>
<?php

$json = file_get_contents('http://www3.septa.org/hackathon/TransitViewAll/');

// you can save $json to a file, if needed :
//file_put_contents('file/path/my-file.txt', $json);

$data = json_decode($json);

var_dump($data);

// foreach ($tweets as $line) { // step through each returned tweet
//     $status = $line->text; // strip the Tweet from the JSON
//     $tweetTime =  $line->created_at; // strip creation time from the JSON
//     $tweetId = $line->id_str; // strip the tweet ID so we can link back to the source tweet
//     $outputTweet = '<li>'.$status.'</span> <a style="font-size:85%" href="http://twitter.com/'.$userName.'/statuses/'.$tweetId.'">'. $tweetTime .'</a></li>'; // Render our beautiful new tweet
//     echo $outputTweet; // echo the tweet
// }

?>
</body>
</html>