<?

define("SUCCES_MESSAGE", "sucess");
define("ERROR_MESSAGE", "error");

function display_messages($sucess_msg, $error_msg){
	echo "<div id=messages";
	display_message($success_msg ,SUCCES_MESSAGE);
	display_message($error_msg ,ERROR_MESSAGE);
	echo "</div>\n\n";
}

function display_message($msg, $msg_type){
	echo "<div class='{$msg_type}'";
	echo "<p> $msg </p>";
	echo "</div>\n";
}

?>