<?php 
session_start();
	require_once('dbconnect.php');

	$team_name =  trim(mysqli_real_escape_string($con,$_POST['des_team_name']));
	$team_email =  trim(mysqli_real_escape_string($con,$_POST['des_team_email']));
	$team_pass =  trim(mysqli_real_escape_string($con,sha1("Some Text")));
	$team_contact = trim(mysqli_real_escape_string($con,$_POST['des_team_contact']));
	$team_address =  trim(mysqli_real_escape_string($con,$_POST['des_team_address']));
	
	$query = mysqli_query($con,"SELECT team_name FROM team_info");
			//Empty check
			if(empty($team_name)==true){
				echo "Please enter a name";
				exit(0);
			}
			if(empty($team_email)==true){
				echo "Please enter a email";
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
			
			//Team name check
			while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				if($team_name == $row['team_name'])
				{
						echo "Name already exists. Please enter a different Name.";
						exit(0);
				}
			}
	





	$rep = mysqli_query($con,"INSERT INTO `team_info`(`team_name`, `team_contact_email`, `event_type`, `team_contact`, `team_address`, `team_size`,`team_pass`) VALUES ('$team_name','$team_email','DES','$team_contact','$team_address','1','$team_pass') ");
	$id = mysqli_insert_id($con);
		# code...
	
		$sem = mysqli_real_escape_string($con,trim($_POST['des_mem_sem']));
		$gen = mysqli_real_escape_string($con,trim($_POST['des_mem_gen']));
		$col = mysqli_real_escape_string($con,trim($_POST['des_mem_col']));
			

		if($sem != NULL && $gen != NULL && $col != NULL){
				
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

			$reply = mysqli_query($con,"INSERT INTO `members`( `Name`, `semester`, `gender`, `team_info_id`, `college`) VALUES ('$team_name','$sem','$gen','$id','$col') ");
	}
		else{
					echo "Please insert the team details.";
					exit(0);
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