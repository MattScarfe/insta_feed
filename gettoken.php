<?php require_once("templates/header.php") ?>

<?php

if (isset($_GET['code'])) {
	$code = $_GET['code'];
} else {
	echo "Error-Parameter not set<br />Please click button.";
}

$client_id = "3b9fb7d0184048218f734a1d625f6ba9";
$client_secret = "61fc57c78bc747edbe2624067f8482ad";

//CURL Exchange code for Access Token


$fields = array(
           'client_id'     => $client_id,
           'client_secret' => $client_secret,
           'grant_type'    => 'authorization_code',
           'redirect_uri'  => 'https://photofeed.essdesign.co.uk/instafeed.php&token={$access_token}',
           'code'          => $code
    );
    $url = 'https://api.instagram.com/oauth/access_token';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch,CURLOPT_POST,true); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    $result = curl_exec($ch);
    curl_close($ch); 
    $result = json_decode($result);
    return $result->access_token; //your token
	
	$access_token = $result->access_token;
 ?>

<div class="row">
	<div class="col-lg-12">
		<div class="page-header">

			<h1>Get Instagram Access Token</h1>
		</div>	
	</div>
</div>	
	
<div class="row">
	<div class="col">
	
	
		<a href="https://api.instagram.com/oauth/authorize/?client_id=3b9fb7d0184048218f734a1d625f6ba9&redirect_uri=https://photofeed.essdesign.co.uk/gettoken.php&response_type=code" class="btn btn-primary btn-lg">Get your Instagram token</a>
	</div>
	<div class="col">
		<div class="highlight-box">
			<?php
			if (isset($_GET['code'])) {
				echo $_GET['code'];
			} else {
				echo "Error-Parameter not set<br />Please click button above.";
			}
			?>
		</div>
	</div>

</div>

<?php require_once("templates/footer.php") ?>