	<?php
	
	if (isset($_GET['code'])) {
				$code = $_GET['code'];
	} else {
				echo "Error-Parameter not set.";
	}

	
	/// curl with PHP
	$uri = 'https://api.instagram.com/oauth/access_token'; 
	$data = [
		'client_id' => '3b9fb7d0184048218f734a1d625f6ba9', 
		'client_secret' => '61fc57c78bc747edbe2624067f8482ad', 
		'grant_type' => 'authorization_code', 
		'redirect_uri' => 'https://photofeed.essdesign.co.uk/inc/curl_at.php', 
		'code' => $code
	];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $uri); // uri
	curl_setopt($ch, CURLOPT_POST, true); // POST
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // POST DATA
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // RETURN RESULT true
	curl_setopt($ch, CURLOPT_HEADER, 0); // RETURN HEADER false
	curl_setopt($ch, CURLOPT_NOBODY, 0); // NO RETURN BODY false / we need the body to return
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // VERIFY SSL HOST false
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // VERIFY SSL PEER false
	$result = json_decode(curl_exec($ch)); // execute curl
	echo '<pre>'; // preformatted view
	
	// ecit directly the result
	$accesstoken = (print_r($result->access_token)); 
	var_dump($accesstoken);
	
	?>