<?php
$key=$_GET['key'];
if($key=='home')
{
include('home.php'); // Home page
}
else if($key=='login')
{
include('login.php'); // Login page
}
else if($key=='terms')
{
include('terms.php'); // Terms page
}
else
{
include('users.php'); // Users Gateway
}
?>