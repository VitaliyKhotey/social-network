<?
require_once '../db/connect.php';
Header('Content-Type: text/html; charset=utf-8');
$select_users = "SELECT user_id, first_name, last_name, email, profile_pic_id FROM users";
$result = $mysqli->query($select_users) or die($mysqli->error);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script>
	window.onload = function() {
		var d = document,
			answer = false;
		for (var i = 0, count = d.getElementsByClassName("delete").length; i < count; i++) {
			d.getElementsByClassName("delete")[i].onclick = function(e){
				answer = confirm("Вы действительно хотите удалить пользователя ?");
				if (answer) {
					return true;
				} else {
					return false;					}
				};
			};
		function get_request_param_value(param_name) {
			param_name = param_name.replace(/[\][]/, "\\\[").replace(/[\]]/,"\\\]");
			var regexS = "[\\?&]" + param_name + "=([^&#]*)",
				regex = new RegExp(regexS),
				result = regex.exec(unescape(window.location.href));
			if (result == null) {
				return "";
			} else {
				return result[1];
			}
		}
		msg = get_request_param_value("success_message");
		if (msg.length > 0) { alert(msg) };
	};
	</script>
</head>
<body>
	<div>
		<ul class="list-group" id="myElement">
			<? while($user = $result->fetch_array()): ?>
			<li class="list-group-item">
				<a href="show_user.php?user_id=<?= $user['user_id'] ?>"><?= $user['first_name']." ".$user['last_name']?></a><small>( <?=$user['email'] ?> )</small>
				<a class="delete" href="delete_user.php?user_id=<?= $user['user_id'] ?>&image_id=<?= $user['profile_pic_id'] ?>" >Удалить</a>
			</li>
			<? endwhile ?>
		</ul>
	</div>
</body>
</html>