<?php 
//Login checker
session_start();
if($_POST){
	
	$email 		= $_POST['email'];
	$password 	= $_POST['password'];
	$code 		= $_POST['code'];
	
	$sql = "SELECT * FROM users WHERE email = '$email' AND password=  '$password' AND code= '$code';";
			
	//echo $sql;exit;
	
	include_once 'dbCon.php';
	
	$con = connect();
	
	$result = $con->query($sql);
	//var_dump($result->num_rows);exit;
	
	if($result->num_rows > 0){
	
		$row1 = $result->fetch_array(MYSQLI_ASSOC);
		
		if($row1['user_type'] != 0){
			//you are not admin
			header('location:admin/login.php');exit;
		}

		$_SESSION['isLoggedIn'] = TRUE;
		
		foreach($result as $row){
			$_SESSION['user_id'] 	= $row['user_id'];
			$_SESSION['email'] 		= $row['email'];
			$_SESSION['name'] 		= $row['name'];
			$_SESSION['role'] 		= $row['user_type'];
		}

		//echo  '<script>alert("Something went wrong, Please try again later.");</script>';
		//var_dump($_SESSION);exit;
		header('location:adminIndex.php');	
		
	}else{
		//remove all session variables
		//session_destroy();
		
		//remove value of all session variables
		session_unset(); 
		$_SESSION['errorMsg'] ='<script>alert("Something went wrong, Please try again later.");</script>';
		header('location:admin/login.php');
		//header('location:signin.php?errorMsg=email or password is wrong');
		
	}
}











