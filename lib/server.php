
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

$host="localhost";
$root="root";
$pass="";
$dbname="qlhh";
try{
  $options = array(
PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
$conn = new PDO("mysql:host=$host;dbname=$dbname", $root, $pass,$options);
 // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  $conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));}
catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
// $conn = mysqli_connect($host, $root, $pass, $dbname);
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
	// array_push($errors, "The two passwords do not match");
   echo '<script language="javascript">alert("Mật khẩu không trùng khớp"); window.location="register.php";</script>';
   exit;
  }
  $password = md5($password_1);
  $email_check='#^[a-z][a-z0-9\._]{2,31}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
   if(!preg_match($email_check, $email)){
      echo '<script language="javascript">alert("Email không hợp lệ!"); window.location="register.php";</script>';
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
     echo '<script language="javascript">alert("Đăng ký thành công"); window.location="index.html";</script>'; 
  }
}






