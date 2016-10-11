<?php 
session_start();
	require_once('dbconnect.php');

		$team_name =  trim(mysqli_real_escape_string($con,$_POST['cwr_team_name']));
		$team_email =  trim(mysqli_real_escape_string($con,$_POST['cwr_team_email']));
		$team_contact = trim(mysqli_real_escape_string($con,$_POST['cwr_team_contact']));
		$team_address =  trim(mysqli_real_escape_string($con,$_POST['cwr_team_address']));
		$team_pass =  trim(mysqli_real_escape_string($con,sha1("Some Text")));
		//$team_size =  trim(mysqli_real_escape_string($con,$_POST['cwr_team_size']));

		$query = mysqli_query($con,"SELECT team_name FROM team_info");
			//Empty check
			if(empty($team_name)==true){
				echo "Please enter a team name";
				return -1;
			}
			if(empty($team_email)==true){
				echo "Please enter a email";
				return -1;
			}
			
			if(empty($team_contact)==true or $team_contact<999999999 or $team_contact>9999999999){
				echo "Please enter a contact number of 10 digits";
				return -1;
			}
			if(empty($team_address)==true){
				echo "Please enter a valid address";
				return -1;
			}
			
			//Team name check
			while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				if($team_name == $row['team_name'])
				{
						echo "Team Name already exists. Please enter a different Team Name.";
						return -1;
				}
			}
	



	$rep = mysqli_query($con,"INSERT INTO `team_info`(`team_name`, `team_contact_email`, `event_type`, `team_contact`, `team_address`, `team_size`,`team_pass`) VALUES ('$team_name','$team_email','CW','$team_contact','$team_address','2','team_pass') ");

			$id = mysqli_insert_id($con);
			foreach ($_POST['cwr_mem_name'] as $index => $value) {
				# code...
				$sem = mysqli_real_escape_string($con,trim($_POST['cwr_mem_sem'][$index]));
				$gen = mysqli_real_escape_string($con,trim($_POST['cwr_mem_gen'][$index]));
				$col = mysqli_real_escape_string($con,trim($_POST['cwr_mem_col'][$index]));
			
			if($value != NULL && $sem != NULL && $gen != NULL && $col != NULL){
				if(empty($value)){
					echo "Enter member name.";
					return -1;
				}
				if(empty($sem)){
					echo "Enter member semester.";
					return -1;
				}
				if(empty($gen)){
					echo "Enter member gender.";
					return -1;
				}
				if(empty($col)){
					echo "Enter member College name.";
					return -1;
				}
				if(is_numeric($sem)!=true or $sem<1 or $sem>8){
					echo "Please enter a numeric semester value between 1 & 8.";
					return -1; 
				}

		$reply = mysqli_query($con,"INSERT INTO `members`( `Name`, `semester`, `gender`, `team_info_id`, `college`) VALUES ('$value','$sem','$gen','$id','$col') ") or die(mysql_error());
		}
		else{
					echo "Please insert the team details.";
					return -1;
			}
	}	
	if($rep){
				if($reply)
				{
				echo "You have been successfully registered.\nThank You";
				}
				else{
					"Failed to insert. Please try again";
				}
			}
			else{
				echo "Failed to insert. Please try again.";
				echo $rep;
			}
		
 ?>