<?php require_once("../include/connect.php"); 
session_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Business Listing Details on Find Business Directory</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
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
            <a href=index.php rel=”nofollow” class="navbar-brand">HongKong | Client Panel </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
	<nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li><a class="active-menu" href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="insert_biz.php"><i class="fa fa-desktop"></i> Insert Business</a></li>
                <li><a href="category.php"><i class="fa fa-desktop"></i> Insert Category</a></li>
                <li><a href="biz.php.php"><i class="fa fa-bar-chart-o"></i> Business Records</a></li>
                <li><a href="category_details.php"><i class="fa fa-qrcode"></i> Manage Category Details</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
			</ul>
        </div>
    </nav>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Manage Category Details</h1>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
							<div class="panel panel-primary">
                                <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                    <div class="panel-body">
                                        <div class="panel panel-default">
                        
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Title</th>
                                                                <th>owner</th>
                                                                <th>contact</th>
                                                                <th>category</th>
                                                                <th>address</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <?php 
                                                            $biz_calling = callingQuery("SELECT * from records");
                                                            foreach($biz_calling as $biz):
                                                            ?>
                                                            <tr>
                                                                <td><?= $biz['b_id'];?></td>
                                                                <td><?= $biz['title'];?></td>
                                                                <td><?= $biz['owner'];?></td>
                                                                <td><?= $biz['primary_contact'];?></td>
                                                                <td><?= $biz['category'];?></td>
                                                                <td><?= $biz['street'] . "," . $biz['city'];?></td>
                                                                <td>
                                                                <a href="" class="btn btn-info btn-sm">Edit</a>
                                                                <a href="delete_business.php?delete_business=<?= $biz['b_id'];?>" class="btn btn-danger btn-sm">Delete</a>
                                                                </td>
						                                    </tr>
					                                        <?php endforeach;?>
					                                    </thead>
					                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.metisMenu.js"></script>
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/morris/morris.js"></script>
<script src="assets/js/custom-scripts.js"></script>
</body>
</html>