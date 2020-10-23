
<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// initializing variables
$username = "";
$email    = "";
$Name="";
$password_1="";
$password_2="";
$date=date('y-m-d H:i:s');;


require_once("connection.php");
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $name= $_POST['name'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];


  if (!$username || !$password_1 || !$password_2 || !$email || !$name){
       echo '<script language="javascript">alert("Vui lòng nhập đầy đủ thông tin!"); window.location="register.php";</script>';
        exit;
    }
  if ($password_1 != $password_2) {
   echo '<script language="javascript">alert("Mật khẩu không trùng khớp"); window.location="register.php";</script>';
   exit;
  }
  //Kiểm tra password
  $password_check='/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/';
  if(!preg_match($password_check, $password_1)){
      echo '<script language="javascript">alert("password không hợp lệ!"); window.location="register.php";</script>';
   exit;
 }
  $password = md5($password_1);
  //Kiểm tra email
  $email_check='#^[a-z][a-z0-9\._]{2,31}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
   if(!preg_match($email_check, $email)){
      echo '<script language="javascript">alert("Email không hợp lệ!"); window.location="register.php";</script>';
   exit;
   }
  //Kiểm tra username
  $username_check='/^[a-z0-9_\.]{6,32}$/';
  if(!preg_match($username_check, $username)){
      echo '<script language="javascript">alert("username không hợp lệ!"); window.location="register.php";</script>';
   exit;
 }
  

  $user_check_query =$conn->prepare("SELECT * FROM users WHERE username=:username OR email=:email");
  $user_check_query->setFetchMode(PDO::FETCH_ASSOC);
  $user_check_query->execute(array('username'=>$username,'email'=>$email));
 
  while ($user=$user_check_query->fetch()) {
    if ($user['username'] === $username) {
      
      echo '<script language="javascript">alert("Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác"); window.location="register.php";</script>';
        exit;
    }

    if ($user['email'] === $email) {
      // array_push($errors, "email already exists");
       echo '<script language="javascript">alert("Email này đã có người dùng. Vui lòng chọn Email khác."); window.location="register.php";</script>';
        exit;
    }
  }


  	$query =$conn->prepare ("INSERT INTO users (username, email, password,fullname,createdate) VALUES(?,?,?,?,?)");
   
  $query->bindParam(1, $username);
  $query->bindParam(2, $email);
  $query->bindParam(3, $password);
  $query->bindParam(4, $name);
  $query->bindParam(5, $date);

  if($query->execute()){
     echo '<script language="javascript">alert("Đăng ký thành công! Vui lòng đăng nhập."); window.location="login.php";</script>'; 
  }
}
//LOGIN
if (isset($_POST['log_user'])){
  $usernamelg = $_POST['usernamelg'];
  $passwordlg_m = $_POST['passwordlg'];
  if(!$usernamelg || !$passwordlg_m){
         echo '<script language="javascript">alert("Vui lòng nhập đầy đủ thông tin!!"); window.location="login.php";</script>';
            exit;
          }
  else{
      $passwordlg = md5($passwordlg_m);
      $sql = "SELECT * FROM users WHERE (username=:username OR email=:email) AND password=:password";
      $query = $conn->prepare($sql);
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $query->execute(array('username'=>$usernamelg,'email'=>$usernamelg,'password'=>$passwordlg));
       while ($user=$query->fetch()) {
      
          if ($user['username'] === $usernamelg || $user['email']===$usernamelg ){
            if($user['password']===$passwordlg) {
               echo '<script language="javascript">alert("Đăng nhập thành công! "); window.location="index.html";</script>'; 

          }
        }
      }
        if(($user['username'] != $usernamelg || $user['email']!=$usernamelg)||$user['password']!=$passwordlg) {
         echo '<script language="javascript">alert("Username or password is not correct!! vui lòng nhập lại"); window.location="login.php";</script>';
            exit;
        }
      
    }
        

}

$conn=null;




