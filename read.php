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
		<a href="index.php" class="navbar-brand">Sri Lanka | Business Directory</a>
	</div>
</div>
<div class="container mt-5">
	<div class="row">
		<div class="col-lg-9">
			<div class="row">
			<?php 
				if(isset($_GET['biz_id'])){
				$id = $_GET['biz_id'];
				$calling = callingQuery("SELECT * FROM records JOIN categories ON records.category = categories.cat_id WHERE records.b_id='$id'");
				foreach($calling as $data);
			?>
			<div class="col-lg-12">	
				<div class="row">
					<div class="col-lg-12">
						<h4 class="text-uppercase font-weight-bolder"><?= $data['title'];?></h4>
					</div>
				</div>
				<div class="card mb-2 bg-light">
					<div class="row">
						<div class="col-lg-4">
							<img src="photo/<?= $data['image1'];?>" alt="image name" class="w-100" style="object-fit: contain;height: 220px;">
						</div>
						<div class="col-lg-8">
							<table class="table table-striped">
							<tr>
								<td>Category </td>
								<td><?= $data['cat_title'];?></td>
							</tr>
							<tr>
								<td>Contact </td>
								<td><?= $data['primary_contact'];?></td>
							</tr>
							<tr>
								<td>Secondary Contact </td>
								<td><?= $data['secondary_contact'];?></td>
							</tr>
							<tr>
								<td>Email </td>
								<td><?= $data['email'];?></td>
							</tr>
							<tr>
								<td>Address </td>
								<td><?= $data['street'] . ", " . $data['city'] . " (". $data['state'] . ")" ;?></td>
							</tr>
							<tr>
								<td>Zip Code </td>
								<td><?= $data['pincode'];?></td>
							</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">	
							<div class="card border-primary">
								<div class="card-header bg-primary text-white">Description</div>
									<div class="card-body">
									<p class="small text-justify"><?= $data['description'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
</div>
</div>
				</div>
<footer>
  <div class="container mt-5">
    <div class="col-lg-10">
      <div>
        <p style="padding-left:300px;">Copyright © 2022 Bluechip Technologies Asia Limited. All Rights Reserved.
      </div>
    </div>
  </div>
</footer>
</body>
</html>