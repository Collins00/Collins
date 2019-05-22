<?php
session_start();
$conn=mysqli_connect("localhost","root","","juja") or die(mysqli_error($conn));
if(isset($_POST['login-submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
    
	$admin=mysqli_query($conn,"select * from admin where username='$username'and password='$password'")or die(mysqli_error($conn));
    
	$row2=mysqli_num_rows($admin);
	
    if($row2==1){
		while($rows2=mysqli_fetch_array($admin)){
			$_SESSION['name']=$rows2['name'];
			$_SESSION['pass']=$rows2['password'];
			$_SESSION['user']=$rows2['username'];
    		?>
            <script>alert("Success");
            window.location.href='database_record.php';
            </script>
            <?php
		}
	}else{
	?>
	<script>
	    alert("failed");
	    window.location.href='login.php';
	</script>
	<?php
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin login</title>
  <link rel="stylesheet" type="text/css" href="missing/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="missing/css/style.css">
  
</head>
<!--  start of main content-->
<body>
<!--start of header bar -->
	<div class="container">
	<div class="row">
		<div class="page-header">
          <h1>Admin Login</h1>
          <span class="icon-bar">
            <i class="glyphicon glyphicon-tower" aria-hidden="true"></i>
          </span>
          <h2></h2>
        </div>
	</div>
</div>
<!--end of header bar-->

<!--start of login and register tabbed forms-->
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="process_login.php" method="POST" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="#"id="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--end of login and register tabbed forms-->


<script type="text/javascript" src="missing/js/jquery.js"></script>
<script type="text/javascript" src="missing/js/bootstrap.min.js"></script>
<script type="text/javascript" src="missing/js/franksjslibrary.js"></script>
</body>
</html>


