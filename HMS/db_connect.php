
<!-- 
<?php

// function db_connect() {
//   $result = new mysqli('localhost', 'bm_user', '1234', 'bookmarks');
//    if (!$result) {
//      throw new Exception('Could not connect to database server');
//    } else {
//      return $result;
//    }
// }

?>
-->

<?php
function db_connect(){
	try {
		$db = new PDO('mysql:host=localhost;dbname=bookmarks;charset=utf8', 'bm_user', 'steven88');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(Exception $e){
		echo $e->getMessage();
		die();
	}
	return $db;
}
?>