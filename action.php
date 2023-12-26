<?php
session_start();
include 'class/Rating.php';
$rating = new Rating();//obj
if(!empty($_POST['action']) && $_POST['action'] == 'userLogin') {
	$user = $_POST['user'];
	$pass=md5 ($_POST['pass']);//hashing
	//$pass = $_POST['pass'];
	$loginDetails = $rating->userLogin($user, $pass);	//call gareko ani return type array store
	$loginStatus = 0;
	$userName = "";
	if (!empty($loginDetails)) {
		$loginStatus = 1;
		$_SESSION['userid'] = $loginDetails[0]['userid'];
		$_SESSION['username'] = $loginDetails[0]['username'];		
		$_SESSION['avatar'] = $loginDetails[0]['avatar'];
		$userName = $loginDetails[0]['username'];
	}		
	$data = array(
		"username" => $userName,
		"success"	=> $loginStatus,	
	);
	echo json_encode($data);//converting into jason format
}
if(!empty($_POST['action']) && $_POST['action'] == 'saveRating' 
	&& !empty($_SESSION['userid']) 
	&& !empty($_POST['rating']) 
	&& !empty($_POST['itemId'])) {
		$userID = $_SESSION['userid'];	
		$rating->saveRating($_POST, $userID);	
		$data = array(
			"success"	=> 1,	
		);
		echo json_encode($data);		
}
if(!empty($_GET['action']) && $_GET['action'] == 'deleteRating' 
	&& !empty($_SESSION['userid'])
	&& !empty($_SESSION['item_id']) ) {
		$userID = $_SESSION['userid'];
		$itemId = $_SESSION['item_id'];	
		$rating->deleteRating($userID, $itemId);	
		header("Location:index.php");	
}

if(!empty($_GET['action']) && $_GET['action'] == 'logout') {
	session_unset();
	session_destroy();
	header("Location:index.php");
}
?>