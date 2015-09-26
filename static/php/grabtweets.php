<?

//We use already made Twitter OAuth library
//https://github.com/mynetx/codebird-php
require_once ('codebird.php');

//Twitter OAuth Settings, enter your settings here:
$CONSUMER_KEY = 'vc5zMaa1FJ1xrWL6E0YTE8G3I';
$CONSUMER_SECRET = 'g0fINwUZU4RpNi3ilWDskK2PWtk7UYqLrilDUE6G9uiHpgTphy';
$ACCESS_TOKEN = '1661162972-T773tKTBn6Gcu2XMZ3N2Rvxv4Y8w61lYFERwjOo';
$ACCESS_TOKEN_SECRET = '4FhoPIdTQRZUMjQb8zEX7U8VXtJK78eMjwEIGZW0nBtZm';

//Get authenticated
Codebird::setConsumerKey($CONSUMER_KEY, $CONSUMER_SECRET);
$cb = Codebird::getInstance();
$cb->setToken($ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);


//retrieve posts
$q = $_POST['q'];
$count = $_POST['count'];
$api = $_POST['api'];

//https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
//https://dev.twitter.com/docs/api/1.1/get/search/tweets
$params = array(
	'screen_name' => $q,
	'q' => $q,
	'count' => $count
);

//Make the REST call
$data = (array) $cb->$api($params);

//Output result in JSON, getting it ready for jQuery to process
echo json_encode($data);

?>