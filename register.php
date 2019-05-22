<?php
$conn=mysqli_connect("localhost","root","","juja");
$db=mysqli_select_db($conn,"juja");

$name=$_POST['fname'];
$phonenumber=$_POST['pnumber'];
$email=$_POST['email'];

$query="INSERT INTO profile(id,name,phonenumber,email)VALUE(NULL,'.$name.','.$phonenumber.','.$email.')";
$insert=mysqli_query($conn,$query);
if($insert){
	echo"<script>window.alert('thank you for contacting us ')</script>";
	header('refresh:0;url=index.html');
}else{
	echo"<script>window.alert('failed')</script>";
	header('refresh:0;url=contact.html');
}


?>