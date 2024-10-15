<?php 
function convertHashtags($str){ 
	$regex = "/#+([a-zA-Z0-9_]+)/"; 
	$str = preg_replace($regex, '<a href="search.php?s=%23$1">$0</a>', 
	$str); return($str); 
}
?>