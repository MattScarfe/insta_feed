<!doctype html>
<html>
<head>
<title>Get Instagram Access Token</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Get Instagram Access Token</h1>

<a href="https://api.instagram.com/oauth/authorize/?client_id=3b9fb7d0184048218f734a1d625f6ba9&redirect_uri=https://photofeed.essdesign.co.uk/gettoken.php&response_type=code" class="btn btn-primary btn-lg disabled" tabindex="-1" role="button" aria-disabled="true">Get your Instagram token</a>


<div class="highlight-box">
<?php
if (isset($_GET['code'])) {
    echo $_GET['code'];
} else {
    echo "Error-Parameter not set<br />Please click button above.";
}
?>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>