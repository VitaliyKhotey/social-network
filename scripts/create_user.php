<?
require '../db/connect.php';
Header('Content-Type: text/html; charset=utf-8');
# путь куда сохранять файл
/*$path ="../uploads/profile_pics/" . time() . $_FILES['user_pic']['name'];
if ($_FILES['user_pic']['error'] == 0) {
		if ($_FILES['user_pic']['type'] == "image/jpeg") {
			if (move_uploaded_file($_FILES['user_pic']['tmp_name'], $path)) {
				
			} else {
				echo "Ошибка";
			}
		} else {
			echo "Формат должен быть jpeg";
		}
}
*/


$image = $_FILES['user_pic'];
$image_file_name = $image['name'];
$image_info = @getimagesize($image['tmp_name']);
$image_mime_type = $image_info['mime'];
$image_size = $image['size'];
$image_data = @file_get_contents($image['tmp_name']);

$insert_image = "INSERT INTO images SET
	file_name = '{$mysqli->real_escape_string($image_file_name)}',
	mime_type = '{$mysqli->real_escape_string($image_mime_type)}',
	file_size = '{$image_size}',
	image_data = '{$mysqli->real_escape_string($image_data)}'";
$mysqli->query($insert_image) or die($mysqli->error);

$image_id = $mysqli->insert_id;

// -----------------------------------------------------------
$firstName = trim($_REQUEST['firstName']);
$lastName = trim($_REQUEST['lastName']);
$email = trim($_REQUEST['email']);
$facebookUrl = str_replace("facebook.org", "facebook.com", trim($_REQUEST['facebookUrl']));
$twitterHandle = trim($_REQUEST['twitterHandle']);
$bio = trim($_REQUEST['bio']);

$positionF = strpos($facebookUrl, "facebook.com");
if (!$position) {
	$facebookUrl = "http://facebook.com/" . $facebookUrl;
}
$positionT = strpos($twitterHandle, "@");
if (!$positionT) {
	$twitterHandle = "http://twitter.com/" . $twitterHandle;
} else {
	$twitterHandle = "http://twitter.com/" . substr($twitterHandle, $positionT + 1);
}

$insert_sql = "INSERT INTO users SET
	first_name = '$firstName',
	last_name = '$lastName',
	email = '$email',
	facebook_url = '$facebookUrl',
	twitter_handle = '$twitterHandle',
	bio = '$bio',
	profile_pic_id = '$mysqli->insert_id'";
$mysqli->query( $insert_sql ) or die( $mysqli->error );



//---------------------------------------------------------------




Header( "Location: show_user.php?user_id=" . $mysqli->insert_id );
exit();
?>