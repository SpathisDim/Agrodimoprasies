<?php 

function logout(){
	if(isset($_POST['logout_button'])){
		session_destroy();
		unset($_SESSION['user_session']);
		header("Location: index.html");
	}
	return true;
}
?>