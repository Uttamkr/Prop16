
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>PROP'16- Project Open House Panorama</title>
	
	<!-- Main CSS file -->
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css" />
	<link rel="stylesheet" href="../css/magnific-popup.css" />
	<link rel="stylesheet" href="../css/font-awesome.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/responsive.css" />

	<style type="text/css">
.dropdown:hover .dropdown-menu {
    display: block;
    
 }
	</style>

	
	<!-- Favicon -->
	<link rel="shortcut icon" href="images/icon/Logo_57x57.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/icon/Logo_144x144.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/icon/Logo_114x114.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/icon/Logo_72x72.png">
	<link rel="apple-touch-icon-precomposed" href="../images/icon/Logo_57x57.png">

</head>
	
	<!-- HEADER -->
	<header id="header">
		<nav class="navbar st-navbar navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#st-navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
				    	<span class="icon-bar"></span>
				    	<span class="icon-bar"></span>
				    	<span class="icon-bar"></span>
					</button>
					<a class="logo" href="../index.html"><img src="../images/icon/Logo_72x72.png" alt=""></a>
				</div>

				<div class="collapse navbar-collapse" id="st-navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
				    	<li><a href="#header">Home</a></li>

				    	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#prop">Prop</a></li>
            <li><a href="#des">OpenDesign</a></li>
            <li><a href="#code">CodeWars</a></li>
            <li><a href="#prath1">Prastuthi</a></li>
          </ul>
        </li>


				    	<li><a href="#deadlines">Deadlines</a></li>
				    	<li><a href="#rules">Rules</a></li>
				    	<!--li><a href="#our-team">Team</a></li-->
				    	<li><a href="#contact">Contact</a></li>
				    	<li><a href="../PROP_Brochure.pdf">Brochure</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav>
	</header>
	<!-- /HEADER -->
<div class='container' style="padding:120px;">
<h3 style='margin-top:50px; text-align: center;'>
<?php 
	error_reporting(0);
		session_start();
		require_once('dbconnect.php');
		//error_reporting(0);
		if(isset($_POST['dummy']))
		{	
			if(empty(trim($_FILES['userfile']['name']))){
				echo "Please select a file to upload.";
			}else if(($_FILES['userfile']['size'] < 10000) && ($_FILES['userfile']['size']> 6000000)){
				echo "File size should be between than 10KB and 6MB";
				
			}
			else{

				$err=0;
				
				$fileName = $_FILES['userfile']['name'];

				$allowed =  array('docx','doc' ,'pdf');
				$ext = pathinfo($fileName, PATHINFO_EXTENSION);
				
				if(!in_array($ext,$allowed) ) {
				    echo 'Unsupported format. Please upload the file in docx/doc/pdf format.';
				    $err=1;
				}

				if(!$err){
				
				$imgData =addslashes(file_get_contents($_FILES['userfile']['tmp_name']));
				$imageProperties = getimageSize($_FILES['userfile']['tmp_name']);
				$sql = "INSERT INTO abstract_img(abstract_name ,abstract,team_info_id)
				VALUES('{$fileName}', '{$imgData}','{$_SESSION["id"]}')";
				$current_id = mysqli_query($con,$sql);

				if($current_id){
					echo "File uploaded successfully.";
					
				}
				else{
					echo "An error occured while uploading the file. Please try again.";
					
				}
			}
			}
		}
		else{
			echo "Please select a file to upload.";
			
		}
		session_destroy();
		?>
	</h3>
</div>

	<div>
		<!-- FOOTER -->
	<footer id="footer">
		<div style="text-align: center;" class="container">
			<div class="row">
				<div style="text-align: center;" class='col-sm-12'>
				<h3>Our Title Sponsors</h3><br>
					<img style="  height:130px;" src="../images/sponsors/glynk.png">
					<p style='text-align: center; color:purple; font-size:3em;'><strong>GLYNK</strong></p>
				</div>
				<hr>
			</div>
			
			<div class='row'>
               	<div class='col-sm-6'>
                	<h3 style='text-align: center;'>Internship Partner</h3><br>
				<div style='text-align: center;' class="top_marg">
					<img style="width:210px; text-align:center;" src="images/sponsors/internshala.png">
				</div>
				</div>
                
                <div class='col-sm-6'>
                	<h3 style='text-align: center;'>Online Media Partner</h3><br>
					<div style='text-align: center;' class="top_marg">
						<img style="width:210px;" src="images/sponsors/iuemag.jpg">
					</div>
				
                </div>
			</div><br>




			
				<h3 style='text-align: center;'>Associate Sponsors</h3><br>
			
			<div class='row'>

				<div class="top_marg col-sm-4">
					<img style="width:210px;" src="images/sponsors/coke.png">
				</div>
				<div class="top_marg col-sm-4">
					<img style="width:210px;" src="images/sponsors/hacker.png">
				</div>
				<div class="top_marg col-sm-4">
					<img style="width:210px;" src="images/sponsors/oyo.jpg">
				</div>
			</div><br>


			<div class='row'>
				<div class="top_marg col-sm-4">
					<img style="width:180px;" src="images/sponsors/buddy.png">
				</div>
				<div class="top_marg col-sm-4">
					<img style="width:180px;" src="images/sponsors/inkinite.png">
				</div>
				<div class="top_marg col-sm-4">
					<img style="width:180px;" src="images/sponsors/iuemag.jpg">
				</div>
				
			</div><br>
			<div class='row'>
				<div class="top_marg col-sm-6">
					<img style="width:180px;" src="images/sponsors/lbtc.jpg">
				</div>
				<div class="top_marg col-sm-6">
					<img style="width:180px;" src="images/sponsors/hpa.jpg">
				</div>
				<!--div class="top_marg col-sm-4">
					<img style="width:180px;" src="images/sponsors/rentomo.jpg">
				</div-->
			</div>
			<br>
			<div class='row'>
				<div class="col-sm-6 col-sm-push-6 footer-social-icons">
					<span>Follow us:</span>
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
					<a href=""><i class="fa fa-google-plus"></i></a>
					<a href=""><i class="fa fa-pinterest-p"></i></a>
				</div>
				
				<div class="col-sm-6 col-sm-pull-6 copyright">
					<p>&copy; 2016 <a href="">Aikya Software Wing</a>. All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</footer>
	</div>
	<!-- /FOOTER -->




	<!-- JS -->
	<script type="text/javascript" src="../js/jquery.min.js"></script><!-- jQuery -->
	<script type="text/javascript" src="../js/bootstrap.min.js"></script><!-- Bootstrap -->
	<script type="text/javascript" src="../js/jquery.parallax.js"></script><!-- Parallax -->
	<script type="text/javascript" src="../js/smoothscroll.js"></script><!-- Smooth Scroll -->
	<script type="text/javascript" src="../js/masonry.pkgd.min.js"></script><!-- masonry -->
	<script type="text/javascript" src="../js/jquery.fitvids.js"></script><!-- fitvids -->
	<script type="text/javascript" src="../js/owl.carousel.min.js"></script><!-- Owl-Carousel -->
	<script type="text/javascript" src="../js/jquery.counterup.min.js"></script><!-- CounterUp -->
	<script type="text/javascript" src="../js/waypoints.min.js"></script><!-- CounterUp -->
	<script type="text/javascript" src="../js/jquery.isotope.min.js"></script><!-- isotope -->
	<script type="text/javascript" src="../js/jquery.magnific-popup.min.js"></script><!-- magnific-popup -->
	<script type="text/javascript" src="../js/scripts.js"></script><!-- Scripts -->
	<script type="text/javascript" src="../js/newScripts.js"></script><!-- Scripts -->

</body>
</html>