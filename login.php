<?php include('lib\server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quan Ly Kho</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	
	<div class="container">
		<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align: center;"><b>login</b></div>
                    <div class="card-body">
                         <form class="form-horizontal" method="Post" action="login.php">
						
                                     <div class="form-group">
                                        <label for="username" class="cols-sm-2 control-label">Username/Email:</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="usernamelg" id="username" placeholder="Enter your Username" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="cols-sm-2 control-label">Password:</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="passwordlg" placeholder="Enter your Password" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="log_user">Login</button>
                                    </div>
                                    <div class="login-register">Don't have an account?
                                        <a href="register.php"> Register</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
</div>

	
	
</body>
</html>