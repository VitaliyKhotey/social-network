<?
require '../db/connect.php';

$user_id = $_REQUEST['user_id'];
$getUserQuery = "SELECT * FROM users WHERE user_id = " . $user_id;
$result = $mysqli->query($getUserQuery) or die( $mysqli->error );

$row = $result->fetch_array();

$firstName = $row['first_name'];
$lastName = $row['last_name'];
$bio =$row['bio'];
$email = $row['email'];
$faceBook = $row['facebook_url'];
$twitterHandle = $row['twitter_handle'];
$userImage = $row['profile_pic_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Профиль</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="header">
		<ul class="nav nav-tabs">
			<li role="presentation">
				<a href="../create_user.html">Регистрация</a>
			</li>
			<li role="presentation" class="active">
				<a href="../create_user.html">Профиль</a>
			</li>
		</ul>
	</div>
	<div id="content">
		<div class="panel panel-primary" >
			<div class="panel-heading">
				<h2 class="panel-title"><?= $firstName . " " . $lastName ?></h2>
			</div>	
			<div class="panel-body" style="background-color:rgba(80,90,20,0.1);">
				<div style="float:left;">
					<img width="140px" class="img-rounded" src="show_image.php?image_id=<?= $userImage ?>" alt="Аватар">
				</div>
				<div class="panel panel-default" style="float:left;width:600px; min-height:311px;margin-left:10px;">
				<div class="panel-heading"><h3 class="panel-title">Основная информания</h3></div>
					<div class="panel-body" >
						<?= $bio ?>
						<h5>Связь с <?= $firstName . " " . $lastName ?></h5>
						<ul class="list-group">
							<li class="list-group-item"><a href="<?= $email ?>">По електронной почте</a></li>
							<li class="list-group-item"><a href="<?= $faceBook ?>">Facebook</a></li>
							<li class="list-group-item"><a href="<?= $twitterHandle ?>">Twitter</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>