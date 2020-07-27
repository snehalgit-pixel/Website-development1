<?php
// Start the session
session_start();
?>
<html>
<head><title> First db demo</title>
</head>
<body>
<?php
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'apelectronics2');
$uname=$_POST["username"];
$pass=$_POST["password"];
if($uname==" ")
{
	echo "username cann't be blank"; }
    if($pass==" ")
	{
		echo "<br>password can't be blank";
	}
$query1="select * from user where username='$uname' && password='$pass'";
$result=mysqli_query($conn,$query1);
$row = $result->fetch_assoc();

$num=mysqli_num_rows($result);

if($num==1)
{
  $_SESSION['user']=$row['FirstName'];
  $_SESSION['role']=$row['RoleId'];
  $_SESSION['login_user']=$row['Userid'];
//   echo $_SESSION['user'];
//   echo $_SESSION['role'];
//   exit();
echo $query1;

header('location:index.html');

}

else
{
 echo "<br>Incorrect username or password. Try again.";
}

?>

   

</body>
</html>
