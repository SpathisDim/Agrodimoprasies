<html>

<head>
	<title>Register</title>
	<meta charset=utf-8>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>

<div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
         
          <h1><a href="index.html">Agro<span class="logo_colour">dimoprasies</span></a></h1>
          <h2>Αγροτικα Προίοντα σε δημοπρασια</h2>
        </div>
      </div>
      <div id="menubar">
	     <ul id="menu">
          <li><a href="index.html">HOMEPAGE</a></li>
          <li><a href="About.html">ABOUT US</a></li>
          <li><a href="support.html">SUPPORT</a></li>
		  <li class="selected"><a href="register.html">Εγγραφή</a></li>
        </ul>
		</div>
	</div>
</div>
	<div id="field">
	<div class="modal-content">
		
	
<?php
	header('Content-Type: text/html; charset=utf-8');
	/*$hostname='sql311.ezyro.com';
	$username='ezyro_22147343';
	$password='12345';
	$mysqlDB='ezyro_22147343_dimoprasia';*/
	$hostname='localhost';
	$username='root';
	$password='';
	$mysqlDB='dimoprasia';
	
	$flag=0;		
	try{
		/* 
				pdo sundesh me thn vash
		*/	
		$db = new PDO("mysql:host=$hostname;dbname=$mysqlDB",$username,$password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			

		   
		   if(isset($_POST['signupbtn'])){
			if(isset($_POST['radio-b'])){		
						/*check gia idiotita sto log in kai analogi topothetisi stoixeiwn stin vash*/
					if($_POST['radio-b']=='paragwgos'){
						
						$stmt=$db->prepare("INSERT INTO paragwgoi(Email_P,OnomaP,EpithetoP,usernameP,passwordP,ThlefwnoP,T_Dieuthunsh_P)
											VALUES(:Email_P,:OnomaP,:EpithetoP,:usernameP,:passwordP,:ThlefwnoP,:T_Dieuthunsh_P)");
						$stmt->bindParam(':Email_P',$email);
						$stmt->bindParam(':OnomaP',$firstname);
						$stmt->bindParam(':EpithetoP',$lastname);
						$stmt->bindParam(':usernameP',$username);
						$stmt->bindParam(':passwordP',$new_password);
						$stmt->bindParam(':ThlefwnoP',$phone);
						$stmt->bindParam(':T_Dieuthunsh_P',$dieuthynsh);
						
						if(isset($_POST['email'])){
							$email=$_POST['email'];
							
						}
						if(isset($_POST['firstname'])){
							$firstname=$_POST['firstname'];
							
						}
						if(isset($_POST['lastname'])){
							$lastname=$_POST['lastname'];
						}
						if(isset($_POST['username'])){
							$username=$_POST['username'];
						}
						if(isset($_POST['dieuthynsh'])){
							$dieuthynsh=$_POST['dieuthynsh'];
						}
						if(isset($_POST['phone'])){
							$phone=$_POST['phone'];
						}
						//check  password == repeat password
						if(isset($_POST['psw'])){
							if(isset($_POST['psw-repeat'])){
								
								if($_POST['psw']== $_POST['psw-repeat']){
									$psw=$_POST['psw'];
									//$new_password = password_hash($psw, PASSWORD_BCRYPT, array("cost" => 12));//hashing pass
									$new_password = trim(password_hash($psw, PASSWORD_DEFAULT));
									$success = $stmt->execute();//stin if apo katw
								}
								else{
									echo'Συμπληρωστε ξανά τα πεδία του Password και Repeat Password.</br>';
								}
							}
						}
						if(isset($success)){	//success gia paragwgo
								echo'<div class="if_success_style">';
								echo'Η εγγραφή σας ως<b> παραγωγός</b> έγινε με επιτυχία.<br>';
								echo'Μπορείτε να πραγματοποιήσετε απευθείας συνδεση πατωντας είσοδος! </div>';
								$flag=1;
						}
						else{
								echo'Kατι πηγε στραβα<br>Προσπαθήστε ξανά.</br>';
								echo '</br><INPUT TYPE="button" VALUE="Επιστροφή στην προηγούμενη σελιδα." onClick="history.go(-1);">';
							}
						
					}
				if(isset($_POST['radio-b'])){		
						/*check gia idiotita sto log in kai analogi topothetisi stoixeiwn stin vash*/
					if($_POST['radio-b']=='emporos'){
							
							$stmt=$db->prepare("INSERT INTO emporoi(Email_Emporou,OnomaE,EpithetoE,usernameE,passwordE,ThlefwnoE,T_Dieuthunsh_E)
												VALUES(:Email_Emporou,:OnomaE,:EpithetoE,:usernameE,:passwordE,:ThlefwnoE,:T_Dieuthunsh_E)");
							$stmt->bindParam(':Email_Emporou',$email);
							$stmt->bindParam(':OnomaE',$firstname);
							$stmt->bindParam(':EpithetoE',$lastname);
							$stmt->bindParam(':usernameE',$username);
							$stmt->bindParam(':passwordE',$new_password);
							$stmt->bindParam(':ThlefwnoE',$phone);
							$stmt->bindParam(':T_Dieuthunsh_E',$dieuthynsh);
							
							if(isset($_POST['email'])){
								$email=$_POST['email'];
								
							}
							if(isset($_POST['firstname'])){
								$firstname=$_POST['firstname'];
								
							}
							if(isset($_POST['lastname'])){
								$lastname=$_POST['lastname'];
							}
							if(isset($_POST['username'])){
								$username=$_POST['username'];
							}
							if(isset($_POST['dieuthynsh'])){
								$dieuthynsh=$_POST['dieuthynsh'];
							}
							if(isset($_POST['phone'])){
								$phone=$_POST['phone'];
							}
							//check an password == repeat password
							if(isset($_POST['psw'])){
								if(isset($_POST['psw-repeat'])){
									
									if($_POST['psw']== $_POST['psw-repeat']){
										$psw=$_POST['psw'];
										//$new_password = password_hash($psw, PASSWORD_BCRYPT, array("cost" => 12));//hashing pass
										$new_password = trim( password_hash($psw, PASSWORD_DEFAULT));
										$success = $stmt->execute();//stin if apo katw
									}
									else{
										echo'Συμπληρωστε ξανά τα πεδία του Password και Repeat Password</br>';
									}
								}
							}
							if(isset($success)){	//$success gia emporo
									echo'<div class="if_success_style">';
									echo'Η εγγραφή σας ως<b> έμπορος</b> έγινε με επιτυχία.<br>';
									echo'Μπορείτε να πραγματοποιήσετε απευθείας συνδεση πατωντας είσοδος! </div>';
									$flag=1;
							}
							else{
									echo'Kατι πηγε στραβα<br>Προσπαθήστε ξανά</br>';
									echo '</br><INPUT TYPE="button" VALUE="Επιστροφή στην προηγούμενη σελιδα." onClick="history.go(-1);">';
							}
					}
				}		
			}
			if($flag == 1){
				//μετα το register φορμα για απεθειας συνδεση
				echo'<div class="login-page">
						<div class="form">
							<h2 class="eisodos">Σύνδεση Χρήστη</h2>
								<form class="login-form" method="POST" action="login.php">
									<input type="text" name="username" value="'.$username.'"/>
									<input type="hidden" name="password" value="'.$psw.'"/>
									<button name="login">ΕΙΣΟΔΟΣ</button>				  
								</form>
						</div>
					</div>';
			}	
		}
   
          
		  
       
	}
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }    	
$db=null;
?>		
		   </div>
		
	  </div>
</div>
<style>

.if_success_style{
	margin-bottom:50px;
	font-family:Verdana;
	font-size:15pt;
	color:#333333;
}

.login-page {
  width: 360px;
  border:absolute;
  padding-top:10px;
  padding-left:10px;
  padding-right:10px;
  padding-bottom:10px;
	margin:auto;
}
#field{
	margin-top:40px;
	margin-left:20%;
	width:60%;
	}

body {font-family: Arial, Helvetica, sans-serif;}


input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 25px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}


input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}


button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}


.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}


.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}


.container {
    padding: 16px;
}

.modal-content {
    background-color: #fefefe;
    margin: 1% auto 5% auto; 
    border: 1px solid white;
    width: 80%;
	padding:5%;
	
}


hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
 
.close:hover,
.close:focus {
    color: #f44336;
    cursor: pointer;
}


.clearfix::after {
    content: "";
    clear: both;
    display: table;
}


@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>

    <div id="footer">
     <p><a href="index.html">Home</a> | <a href="About.html">About us</a> | <a href="support.html">Support</a></p>
		<p>Copyright &copy; Team_Rocket </a></p>
    </div>
  </div>
</body>
</html>