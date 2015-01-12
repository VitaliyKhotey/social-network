<?
# достать изображение пользователя по ид когорый передается

require_once '../db/connect.php';

$image_id=$_REQUEST['image_id'];
$select_query = "SELECT * FROM images WHERE image_id = " .$image_id;

$result = $mysqli->query($select_query) or die($mysqli->error);

if ($result->num_rows == 0) {
	echo "Изображение не найдено";
}

if ($result) {
	$image = $result->fetch_array();
}

Header("Content-Type: ".$image['mime_type']);
Header("Content-length: ".$image['file_size']);

echo $image['image_data'];
?>