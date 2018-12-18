<?php require_once("templates/header.php") ?>


<div class="row">

	<div class="col-lg-12">
		<div class="page-header">
			<h1>Instagram Feed</h1>
		</div>
	</div>


</div>

<div class="row">

	<div class="col-lg-12">
		<div class="page-header">
			<h1>Instagram Feed</h1>
		</div>
	</div>


</div>

<?php

if (isset($_GET['code'])) {
	
	$access_token=$_GET['code'];
	
} else {
	echo "<script>
alert('Invalid Access Token Get Token. Click OK to get token.');
window.location.href='gettoken.php';
</script>"; 
}

$photo_count=9;
     
$json_link="https://api.instagram.com/v1/users/self/media/recent/?";
$json_link.="access_token={$access_token}&count={$photo_count}";

?>
	
<?php require_once("templates/footer.php") ?>