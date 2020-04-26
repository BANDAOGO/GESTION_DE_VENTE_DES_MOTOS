<?php 
function bd()
{
try {
$connect= new PDO('mysql:host=localhost;dbname=gestion','root','', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
	$e->getMessage();
}
 return $connect;
}
?>
