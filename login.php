<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>User Login -Find Business Directory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Members Sign In. Welcome to Find Business. Enter your username and password here in order to login on Find Business Directory:">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <!--custom style-->
  <style type="text/css">
    .container-fluid{
      background-image: url(./images/img004.jpg);
      background-size:cover;
    }
    .text-center{
      font-weight:bold;
      font-family: Arial, Helvetica, sans-serif;
      font-style:italic;
      font-size:35px;
      color:#061356;
    }
   .registration-form{
      background: #ffffff;
      padding: 20px;
      margin: 100px 0px;
      border-radius:20px;
    }
    .err-msg{
      color:red;
    }
    .registration-form form{
      padding: 10px;
      
    }
    .btn-secondary{
      background-color:#5cdb5c ;
      text-align:center;
      margin:auto;
      display:flex;
      border:none;
    }
    .signup{
      color:black;
      padding-left:50px;
      font-family:Georgia;
    }
    #signup{
      color:#ff0021;
      text-decoration: none;
    }
    #back-btn{
      color:#fff;
      text-decoration: none;
    }
    .btn-back{
      background-color:orange ;
      text-align:center;
      margin:auto;
      border:none;
      border-radius:5px;
      display:flex;
      font-size:16px;
    }
    .form-control{
      border-radius:10px;
      background: #f7f7f7;
      box-shadow:10px;
    }
  </style>
</head>
<body>
<div class="container-fluid">
 <div class="row">
   <div class="col-sm-4"></div>
      <div class="col-sm-4">
   
        <div class="registration-form">
          <h4 class="text-center">Login</h4>
            <p class="text-success text-center"></p>
              <form action="check-login.php" method="post">
              <?php if(isset($_GET['error'])){ ?>
                <div class="alert alert-danger" role="alert">
                  <?=$_GET['error']?>
              </div>
              <?php } ?>
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control"  placeholder=" User name" name="username">
                </div>
  
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control"  placeholder=" Password" name="password">
                </div>
                <div class="form-group mb-0">
                    <label>Select User Type:</label>
                   
                </div>
                <select class="form-control mb-3" name="role">
                    <option selected value="user"> User</option>
                    <option value="admin">Admin</option>
                </select>
                  <button type="submit" class="btn btn-secondary">Login</button>
                <hr/>
                <div>
                  <p class="signup">Dont't Have an Account ? <a id="signup" href="signup.php">Sign Up </a></p>
                </div>
              </form>
              <button class="btn-back"><a id="back-btn" href ="index.php">Back To Home</a></button>
          </div>
      </div>
    </div>
  </div>
  <footer>
  <div class="container">
    <div class="col-lg-9">
      <div>
        <p style="padding-left:275px;margin-top:2%;">Copyright © 2022 Bluechip Technologies Asia Limited. All Rights Reserved.
      </div>
    </div>
  </div>
  </footer>
</body>
</html>