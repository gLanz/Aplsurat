<?php ob_start(); ob_clean();
require"../../config/includes.php";

if($_POST['id'])
{
	
	$parameter = new Board(); // Create a new News Object
    $id = $_POST['id'];
	$parameter->deleteBoard($id);
	echo"Berhasil";
}
?>