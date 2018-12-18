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
	
	$access_token=$_GET['code'];
	
} else {
	echo "<script>
alert('Invalid Access Token Get Token. Click OK to get token.');
window.location.href='gettoken.php';
</script>"; 
}


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