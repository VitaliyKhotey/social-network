<?
require_once '../db/connect.php';

$user_id = $_REQUEST['user_id'];
$image_id = $_REQUEST['image_id'];

$delete_query = "DELETE FROM users WHERE user_id=".$user_id;
$mysqli->query($delete_query);

$delete_query_image = "DELETE FROM images WHERE image_id=".$image_id;
$mysqli->query($delete_query_image);

$msg = "User deleted !";
Header('Content-Type: text/html; charset=utf-8');
Header("Location: show_users.php?success_message=".$msg);
exit();

?>