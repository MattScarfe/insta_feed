<?php require_once("templates/header.php") ?>


<div class="row">

	<div class="col-lg-12">
		<div class="page-header">
			<h1>Instagram Feed</h1>
		</div>
	</div>


</div>

<?php

//GET TOKEN

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
		'redirect_uri' => 'https://photofeed.essdesign.co.uk/instafeed.php', 
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
	$access_token = $result->access_token;



//DEFINE PHOTO COUNT
$photo_count=9;


//GET JSON LINK
$json_link="https://api.instagram.com/v1/users/self/media/recent/?";
$json_link.="access_token={$access_token}&count={$photo_count}";


//GET JSON DATA AND DECODE
$json = file_get_contents($json_link);
$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING); //only works in PHP version 5.4+



//LOOP THROUGH THE DATA

foreach ($obj['data'] as $post) {
	
	$pic_text			=	$post['caption']['text'];
	$pic_link			=	$post['link'];
	$pic_like_count		=	$post['likes']['count'];
	$pic_comment_count	=	$post['comments']['count'];
	$pic_src			=	str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
	$pic_created_time	= 	date("F j, Y", $post['caption']['created_time']);
	$pic_created_time 	=	date("F j, Y", strtotime($pic_created_time . " +1 days"));
	
	echo "<div class='col-md-4 col-sm-6 col-xs-12 item_box'>";
		echo "<a href='{$pic_link}' target='_blank'>";
			echo "<img class='img-responsive phot-thumb' src='{$pic_src}' alt='{$pic_text}'>";
		echo "</a>";
		echo "<p>";
			echo "<p>";
				echo "<div style='color:#888'>";
					echo "<a href='{$pic_link}' target='_blank'>{$pic_created_time}</a>";
				echo "</div>";	
			echo "</p>";
			echo "<p>{$pic_text}</p>";
		echo "</p>";
	echo "</div>";	
}

var_dump($access_token);
var_dump($json_link);
var_dump($json);
var_dump($obj);

?>






	
<?php require_once("templates/footer.php") ?>