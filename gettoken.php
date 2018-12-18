<?php require_once("templates/header.php") ?>



<div class="row">
	<div class="col-lg-12">
		<div class="page-header">

			<h1>Get Instagram Access Token</h1>
		</div>	
	</div>
</div>	
	
<div class="row">
	<div class="col">
	
	
		<a href="https://api.instagram.com/oauth/authorize/?client_id=3b9fb7d0184048218f734a1d625f6ba9&redirect_uri=https://photofeed.essdesign.co.uk/instafeed.php&response_type=code" class="btn btn-primary btn-lg">Get your Instagram token</a>
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