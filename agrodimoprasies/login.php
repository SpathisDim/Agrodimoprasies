<html>
<head> <title> Login </title>

</head>
<?php

header('Content-Type: text/html; charset=utf-8');
	session_start();
	$hostname='localhost';
	$username='root';
	$password='';
	$mysqlDB='dimoprasia';
	
			
	try{
		/* 
				pdo sundesh me thn vash
		*/	
	  $db = new PDO("mysql:host=$hostname;dbname=$mysqlDB",$username,$password);
	  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	  if(isset($_POST['login'])){	
		$login_username=!empty($_POST['username']) ? trim($_POST['username']):null;
		$login_password=!empty($_POST['password']) ? trim($_POST['password']):null;
		$message='';
		echo '<b>Δωσατε για username:</b>' .$login_username;
		echo'</br>';
		echo '<b>Δωσατε για password:</b>'.$login_password;
		echo'</br>';echo'</br>';
		if(empty($username) || empty($password)){
			$message = "Username/Password δεν μπορει να ειναι κενά!";
		}
						//gia paragwgo
						$stmt =$db->prepare("SELECT usernameP,passwordP FROM paragwgoi WHERE usernameP = :usernameP");
						//$stmt ->execute(array(':usernameP'=>$login_username));
						$stmt->bindParam(':usernameP',$login_username);
						$stmt->execute();
						$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
						if($userRow === false){
							
									//gia emporo
									$stmt1 =$db->prepare("SELECT usernameE,passwordE FROM emporoi WHERE usernameE = :usernameE");
									//$stmt ->execute(array(':usernameP'=>$login_username));
									$stmt1->bindParam(':usernameE',$login_username);
									$stmt1->execute();
									
									$userRow2 = $stmt1->fetch(PDO::FETCH_ASSOC);
									if($userRow2 === false){
														//gia admin
														$stmt2 =$db->prepare("SELECT username_D,password_D FROM diaxeirisths WHERE username_D =:username_D");
														$stmt2->bindParam(':username_D',$login_username);
														$stmt2->execute();
														$userRow1 = $stmt2->fetch(PDO::FETCH_ASSOC);
														if($userRow1 === false){
															die('Λαθος username/password </br><INPUT TYPE="button" VALUE="Προσπαθήστε ξανά!" onClick="history.go(-1);">');
														}
														if($stmt2->rowCount() > 0){ //count($userRow);
															if($login_password==$userRow1['password_D']){
																$_SESSION['user_session']= $userRow1['username_D'];

																header("Location: admin_profil.php");	
															}else{
																die('Λαθος s username/password </br><INPUT TYPE="button" VALUE="Προσπαθήστε ξανά!" onClick="history.go(-1);">');
														}
												}	 
									}
									if($stmt1->rowCount() > 0){ //count($userRow2);
										$valid = password_verify($login_password, $userRow2['passwordE']);
										if($valid){
											$_SESSION['user_session']= $userRow2['usernameE'];
											header("Location: emporos.php");	
										}
										else{
											 die('Λαθος username/password </br><INPUT TYPE="button" VALUE="Προσπαθήστε ξανά!" onClick="history.go(-1);">');
											 
										}
									}
						}
						if($stmt->rowCount() > 0){ //count($userRow);
							$valid = password_verify($login_password, $userRow['passwordP']);
							if($valid){
								$_SESSION['user_session']= $userRow['usernameP'];
								header("Location: paragwgos.php");	
							}
							else{
								 die('Λαθος  username/password </br><INPUT TYPE="button" VALUE="Προσπαθήστε ξανά!" onClick="history.go(-1);">');
							}
						}
				
	}	
	}catch(PDOException $e){
			echo $e->getMessage();
	}
$db=null;


?>
</html>