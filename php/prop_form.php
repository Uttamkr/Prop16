<?php 
session_start();
	require_once('dbconnect.php');
	
			$team_name =  trim(mysqli_real_escape_string($con,$_POST['prop_team_name']));
			$team_email =  trim(mysqli_real_escape_string($con,$_POST['prop_team_email']));
			$team_pass =  trim(mysqli_real_escape_string($con,sha1("$_POST[prop_team_pass]")));
			$team_contact = trim(mysqli_real_escape_string($con,$_POST['prop_team_contact']));
			$team_address =  trim(mysqli_real_escape_string($con,$_POST['prop_team_address']));
			$team_size =  trim(mysqli_real_escape_string($con,$_POST['prop_team_size']));

			$query = mysqli_query($con,"SELECT team_name FROM team_info");
			//Empty check
			if(empty($team_name)==true){
				echo "Please enter a team name";
				exit(0);
			}
			if(empty($team_email)==true){
				echo "Please enter a email";
				exit(0);
			}
			if(empty($_POST['prop_team_pass'])==true){
				echo "Please enter a password";
				exit(0);
			}
			if($_POST['prop_team_pass']!= $_POST['prop_team_repass']){
				echo "Passwords don't match. Please retry.";
				exit(0);
			}
			if(empty($team_contact)==true or $team_contact<999999999 or $team_contact>9999999999){
				echo "Please enter a contact number of 10 digits";
				exit(0);
			}
			if(empty($team_address)==true){
				echo "Please enter a valid address";
				exit(0);
			}
			if(empty($team_size)==true){
				echo "Please enter a team size";
				exit(0);
			}
			
			//Team name check
			while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				if($team_name == $row['team_name'])
				{
						echo "Team Name already exists. Please enter a different Team Name.";
						exit(0);
				}
			}

			$rep = mysqli_query($con,"INSERT INTO `team_info`(`team_name`, `team_contact_email`, `event_type`, `team_contact`, `team_address`, `team_size`, `team_pass`) VALUES ('$team_name','$team_email','PRP','$team_contact','$team_address','$team_size','$team_pass') ");
		

			$id = mysqli_insert_id($con);
			foreach ($_POST['prop_mem_name'] as $index => $value) {
				# code...
				$sem = mysqli_real_escape_string($con,trim($_POST['prop_mem_sem'][$index]));
				$gen = mysqli_real_escape_string($con,trim($_POST['prop_mem_gen'][$index]));
				$col = mysqli_real_escape_string($con,trim($_POST['prop_mem_col'][$index]));
			if($value != NULL && $sem != NULL && $gen != NULL && $col != NULL){
				if(empty($value)){
					echo "Enter member name.";
					exit(0);
				}
				if(empty($sem)){
					echo "Enter member semester.";
					exit(0);
				}
				if(empty($gen)){
					echo "Enter member gender.";
					exit(0);
				}
				if(empty($col)){
					echo "Enter member College name.";
					exit(0);
				}
				if(is_numeric($sem)!=true or $sem<1 or $sem>8){
					echo "Please enter a numeric semester value between 1 & 8.";
					exit(0); 
				}

				


				$reply = mysqli_query($con,"INSERT INTO `members`( `Name`, `semester`, `gender`, `team_info_id`, `college`) VALUES ('$value','$sem','$gen','$id','$col') ");
			}
				else{
					echo "Please insert the team details.";
					exit(0);
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
				echo "Failed to insert. Please try again";
			}
		
 ?>