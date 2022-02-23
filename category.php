<?php require_once("include/connect.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="admin/assets/css/custom-styles.css" rel="stylesheet" />

    <title>Business Directory Website</title>
    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-plot-listing.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>
<body>

<div class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
	    <a href="index.php" class="navbar-brand">HongKong | Business Directory</a>
    <div class="col-lg-9">
      <form id="search-form" name="gs" method="get" role="search" action="index.php">
        <div class="row">
          <div class="col-lg-8 align-self-center">
            <fieldset>
              <input type="text" name="search" class="searchText" placeholder="Search Here.." autocomplete="on" required>
            </fieldset>
          </div>
          <div class="col-lg-3">                        
            <fieldset>
              <button type="submit" name="find" class="main-button"><i class="fa fa-search"></i> Search Now</button>
            </fieldset>
          </div>
        </div>
      </form>
      <a href="login.php" style="padding-left:35px;color:white;">Login</a>
      <a href="contact_us.php" style="padding-left:10px;color:white;">Contact Us</a>
    </div>
  </div>
</div>

<div class="container mt-5">
	<div class="row">
		<div class="col-lg-3">
		  <?php include "side.php";?>
		</div>
		<div class="col-lg-9">
			<div class="row">
			<?php 
				if(isset($_GET['cat'])){
					$cat = $_GET['cat'];

					$calling = callingQuery("SELECT * FROM records JOIN categories ON records.category = categories.cat_id where records.category='$cat'");

					if(empty($calling)){
						echo "<div class='alert alert-warning'>Not Found</div>";
					}
				}
				
			foreach($calling as $data):
				?>
				<div class="col-lg-12">
					<div class="card mb-2 bg-light">
						<div class="row">
							<div class="col-lg-4">
								<img src="photo/<?= $data['image1'];?>" class="w-100" style="object-fit: contain;height: 220px;">
							</div>
							<div class="col-lg-8">
								<div class="card-body">
									<h5 class="text-uppercase text-truncate"><?= $data['title'];?></h5>
									<span class="badge bg-primary"><?= $data['cat_title'];?></span>
									<p class="small text-justify"><?= $data['description'];?></p>
									<h5 class="text-muted float-left"><?php echo $data['primary_contact']; if($data['secondary_contact']!=''){echo ", " .$data['secondary_contact'];}?> </h5>
									<h5 class="text-muted float-right"><?= $data['email'];?> </h5>
									<div class="clearfix"></div>
									<a href="read.php?biz_id=<?= $data['b_id'];?>" class="btn btn-success float-right">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach;?>
			</div>
		</div>	
	</div>
</div>
      </div>

  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>
      
<footer>
  <div class="container">
    <div class="col-lg-12">
      <div class="sub-footer">
        <p>Copyright © 2022 Bluechip Technologies Asia Limited. All Rights Reserved.
      </div>
    </div>
  </div>
  </footer>
</body>

</html>