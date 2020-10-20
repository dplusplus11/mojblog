<?php
	$consumer_key="eQODXwjjVKGrSy5QvTWaDWrg2";
	$consumer_secret= "5fgInUTrOxbQnhKCDANXXcoA2UUH9E49wzcnoyisWsY4X00aPY";
	$access_token= "1008370524161040384-Y16boNorjY695e2CA2FSQ16LE0YYh3";
	$access_token_secret="5jAN9oaBScndj0MKW8fBfI2IcjAHXcj53FOlhD08oE0Ut";

	require "E:/xampp/htdocs/twitteroauth-master/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;

	$connection = new TwitterOAuth ($consumer_key, $consumer_secret, $access_token,$access_token_secret);

	$content = $connection->get("account/verify_credentials");
	$new_status = $connection->post("statuses/update", ["status"=> "Ovaj tvit sam kao poslala preko APIja... Ajde vazi."]);

	$statuses = $connection->get("statuses/home_timeline", ["count"=> 25, "exclude_replies"=> true]);

	print_r($statuses);
?>