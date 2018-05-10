<?php

include 'vendor/twitteroauth/autoload.php';
 
use Abraham\TwitterOAuth\TwitterOAuth;

 

function getInstaID($username) 
{
  
  
  $connection = new TwitterOAuth("cZBCuiDOZnGSyCCssNU4YOmfF","tssAe8dcAP96XVxVhe8vA3WrPjy5B6xiibaOTQmozaywZtGQ5E","2920969476-HtdwXKlXtkXeZsiEqfglPDUvdPSOUUphcXChLUf","RalbVNL1z9aLx7iHXHJRlMX17MffcsRqQfkiN8xkR3Sbh");
 
  $statues = $connection->post("statuses/update", ["status" => "hello world"]);
if ($connection->getLastHttpCode() == 200) {
    // Tweet posted succesfully
} else {
    // Handle error case
}
 // $content =  $connection->get("search/tweets", ["q" => "twitterapi"]);
 
    return 1; // return this if nothing is found
}//

echo getInstaID('aliciakeys'); // this should print 20979117

?> 