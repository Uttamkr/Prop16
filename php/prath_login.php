<?php
session_start();
require_once('dbconnect.php');

			$team_name =  trim(mysqli_real_escape_string($con,$_POST['prath_upload_name']));
			$team_pass =  trim(mysqli_real_escape_string($con,sha1("$_POST[prath_upload_pass]")));
			$team_flag = 0;

			$query = mysqli_query($con,"SELECT team_name FROM team_info");
			//Empty check
			if(empty($team_name)==true){
				echo "Please enter a team name";
				exit(0);
			}
			if(empty($_POST['prath_upload_pass'])==true){
				echo "Please enter a password";
				exit(0);
			}
			while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				if($team_name == $row['team_name'])
				{
					$team_flag = 1;
				}
			}
			if($team_flag == 0){
				echo "The specified team does not exist. Please try again.";
				exit(0);
			}


			$log = "SELECT id FROM `team_info` WHERE team_name = '$team_name' and team_pass = '$team_pass' ";
			$rep = $con->query($log);
			$arr = mysqli_fetch_array(mysqli_query($con,$log),MYSQLI_ASSOC);
			$log_rows = mysqli_num_rows($rep);
			if($log_rows){
				echo "Success";
				$_SESSION['id'] = $arr['id'];

				exit(0);
			}
			else{
				echo "Team name and Password Combination is wrong. Please try again.";
				session_destroy();
				exit();
			}

?>