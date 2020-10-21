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
                    <div class="card-header" style="text-align: center;"><b>Register</b></div>
                    <div class="card-body">
                         <form class="form-horizontal" method="post" action="register.php">
					
							<div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">Your Name</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" />
                                            </div>
                                        </div>
                            </div>
                            <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Your Email</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" />
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="username" class="cols-sm-2 control-label">Username</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Username" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="cols-sm-2 control-label">Password</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="password_1" placeholder="Enter your Password" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="password_2" placeholder="Confirm your Password" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="reg_user">Register</button>
                                    </div>
                                    <div class="login-register">Already have an account?
                                        <a href="login.php"> Login</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>s
</div>

				
				<!-- <tr>
					<td><label for="password" style="color: #000000 ;">Password: </label></td>
					<td><input type="password" name="password_1"></td>
				</tr>
				<tr>
					<td><label for="passwordcf" style="color: #000000 ;">Confirm password: </label></td>
					<td><input type="password" name="password_2"></td>
				</tr>
				<tr>
					<td><label for="name" style="color: #000000 ;">Full Name: </label></td>
					<td><input type="text" name="name" ></td>
				</tr>
				<tr>
					<td><label for="email" style="color: #000000 ;">Email: </label>
				</td>
					<td><input type="email" name="email" value="<?php echo $email; ?>"></td>
				</tr>
				<tr>
					<td colspan=2 align="center" style="padding-top: 20px;"> <button type="submit" class="btn" name="reg_user">Register</button></td>
				</tr>
				
			</table>
		</div>
	</form> -->

	
</body>
</html>