<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Degree Addition | LogIn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="Icon" type="Icon/jpg" href="DIAT_Logo.jpg"/>
  <link rel="stylesheet" type="text/css" href="loginCSS.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h2 align="left">LogIn Panel</h2>
<div class="container">
  
  <form class="form-horizontal" action = "process.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">Email:</label>
      <div class="col-sm-4">
        <input type="username" class="form-control" id="user" placeholder="Please enter admin email" name="user" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-4">          
        <input type="password" class="form-control" id="pass" placeholder="Please enter admin password" name="pass" required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="login-submit">LogIn</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
