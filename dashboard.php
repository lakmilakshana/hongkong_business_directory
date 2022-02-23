<?php require_once("include/connect.php"); 
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['id'])){
	?>
	
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name= "description" content="We offer an integrated approach to online marketing for businesses in Sri Lanka. The site allows consumers to review, rate, comment and recommend businesses and products that they have used.">
	<title>Client Dashboard </title>
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="admin/assets/css/custom-styles.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
		<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
		<a href= index.php rel=”nofollow” class="navbar-brand">HongKong | Business Directory </a>
</div>
            <ul class="nav navbar-top-links navbar-right">
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="./admin/index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
					<li> 
						<a href="../dashboard.php" class="active-menu"><i class="fa fa-pencil-square-o"></i> Insert Business</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
				</ul>
            </div>
        </nav>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">WELCOME ! <small >Add Business </small></h1>
				</div>				
            </div>
		<?php 
			if(isset($_POST['insert'])){

				$title  = $_POST['title'];
				$owner  = $_POST['owner'];
				$primary_contact  = $_POST['primary_contact'];
				$secondary_contact  = $_POST['secondary_contact'];
				$email  = $_POST['email'];
				$category  = $_POST['category'];
				$description  = $_POST['description'];
				$street  = $_POST['street'];
				$city  = $_POST['city'];
				$state  = $_POST['state'];
				$pincode  = $_POST['pincode'];

				//image work and validation
				
				//image name
				$image1  = $_FILES['image1']['name'];
				$image2  = $_FILES['image2']['name'];
				
				//image tmp name

				$tmp_image1  = $_FILES['image1']['tmp_name'];
				$tmp_image2  = $_FILES['image2']['tmp_name'];
					
				move_uploaded_file($tmp_image1,"../photo/$image1");
				move_uploaded_file($tmp_image2,"../photo/$image2");

				$query = "INSERT INTO records (title,owner,primary_contact,secondary_contact,email,category,description,street,city,state,pincode,image1,image2) 
				value('$title','$owner','$primary_contact','$secondary_contact','$email','$category','$description','$street','$city','$state','$pincode','$image1','$image2')";

				if(runQuery($query)){
					echo '<script>alert("Business has been registered successfully.")</script>';
    					echo "<script>window.location.href ='admin/business_details.php'</script>";
				}
				else{
					echo "fail";
				}
			}
		?>
		<div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                     <div class="panel-body">
                            <div class="panel-group" id="accordion">
								<form action="dashboard.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label>Business Title</label>
									<input type="text" name="title" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['title'];}?>">
								</div>
								<div class="form-group">
									<label>Owner Name</label>
									<input type="text" name="owner" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['owner'];}?>">
								</div>
								<div class="form-group">
									<label>Primary Contact</label>
									<input type="text" name="primary_contact" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['primary_contact'];}?>">
								</div>
								<div class="form-group">
									<label>Secondary Contact</label>
									<input type="text" name="secondary_contact" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['secondary_contact'];}?>">
								</div>	
								<div class="form-group">
									<label>Email</label>
									<input type="text" name="email" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['email'];}?>">
								</div>
								<div class="form-group">
									<label>Category</label>
									<select name="category" class="form-control">
										<?php 
											$cat_calling = callingQuery("select * from categories");
											foreach($cat_calling as $cat):
										?>
										<option value="<?= $cat['cat_id'];?>"><?= $cat['cat_title'];?></option>
									<?php endforeach;?>
									</select>
								</div>
								<div class="form-group">
									<label>Business Description</label>
									<textarea rows="5" name="description" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['description'];}?>"></textarea>
								</div>
								<div class="form-group">
									<label>Street</label>
									<input type="text" name="street" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['street'];}?>">
								</div>
								<div class="form-group">
									<label>City</label>
									<input type="text" name="city" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['city'];}?>">
								</div>
								<div class="form-group">
									<label>State</label>
									<input type="text" name="state" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['state'];}?>">
								</div>
								<div class="form-group">
									<label>Zip code</label>
									<input type="text" name="pincode" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['pincode'];}?>">
								</div>
								<div class="form-group">
									<label>Image 1</label>
									<input type="file" name="image1" class="form-control" >
								</div>
								<div class="form-group">
									<label>Image 2</label>
									<input type="file" name="image2" class="form-control" >
								</div>
								<div class="mb-3">
									<input type="submit" name="insert" class="btn btn-success btn-block" Value="Add Business">
								</div>
								</form>
							</div>				
						</div>
					</div>
				</div>
			</div>
			<?php } ?>  
		</div>
	</div>
</div>
											
<script src="admin/assets/js/jquery-1.10.2.js"></script>
<script src="admin/assets/js/bootstrap.min.js"></script>
<script src="admin/assets/js/jquery.metisMenu.js"></script>
<script src="admin/assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="admin/assets/js/morris/morris.js"></script>
<script src="admin/assets/js/custom-scripts.js"></script>
<footer>
  <div class="container">
    <div class="col-lg-9">
      <div>
        <p style="padding-left:320px;">Copyright © 2022 Bluechip Technologies Asia Limited. All Rights Reserved.
      </div>
    </div>
  </div>
  </footer>
</body>
</html>