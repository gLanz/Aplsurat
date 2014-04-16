<?
// Script write url 
function geturl() {
	//$host =$_SERVER['HTTP_HOST'];
$url = $_SERVER['REQUEST_URI']; 
return $url;
}
function getIP() {
    return $_SERVER["REMOTE_ADDR"];
}

?>