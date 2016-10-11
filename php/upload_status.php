<?php 
session_start();
require_once('dbconnect.php');
if(isset($_POST['team_name']) && isset($_POST['password']))
{
$name = $_POST['team_name'];
$pass = $_POST['password'];
$query = mysql_query("SELECT * FROM team_info WHERE team_name = '$name' AND event_type = 'PRP' ") or die(mysql_error());
$row = mysql_fetch_array($query);
if($row['team_pass'] == sha1($pass))
{
	if($row['abstract_status'] == "Waiting for an upload")
	{
		$_SESSION['id'] = $row['id'];
		print "1";
	}
	else
	{
		print "2";
	}
}
else
{
	print "3";
}
}
else
{
	print "4";
}
?>