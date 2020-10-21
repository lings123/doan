
<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$Name="";
$password_1="";
$password_2="";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'qlhh');
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $name= mysqli_real_escape_string($db, $_POST['name']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  if (!$username || !$password_1 || !$password_2 || !$email || !$name){
       echo '<script language="javascript">alert("Vui lòng nhập đầy đủ thông tin!"); window.location="register.php";</script>';
        exit;
    }
  if ($password_1 != $password_2) {
	// array_push($errors, "The two passwords do not match");
   echo '<script language="javascript">alert("Mật khẩu không trùng khớp"); window.location="register.php";</script>';
   exit;
  }
  $password = md5($password_1);
   
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      // array_push($errors, "Username already exists");
      // 
      echo '<script language="javascript">alert("Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác"); window.location="register.php";</script>';
        exit;
    }

    if ($user['email'] === $email) {
      // array_push($errors, "email already exists");
       echo '<script language="javascript">alert("Email này đã có người dùng. Vui lòng chọn Email khác."); window.location="register.php";</script>';
        exit;
    }
  }

  	// $query = "INSERT INTO users (username, email, password,fullname,createdate) VALUES('$username', '$email', '$password','$name',now();"
   //  mysqli_query($db, $query);
    $sql = "INSERT INTO users(username, password,fullname, email, createdate ) VALUES ( '$username', '$password',$name', '$email', now())";
      // thực thi câu $sql với biến conn lấy từ file connection.php
      mysqli_query($db,$sql);
    // $_SESSION['username'] = $username;
   echo '<script language="javascript">alert("Đăng ký thành công"); window.location="index.html";</script>';     
        
  }






