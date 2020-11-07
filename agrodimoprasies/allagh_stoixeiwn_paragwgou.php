<html>

<head>
    <meta charset=utf-8>
	<title>Agrodimoprasies</title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>

<div id="main">
    <div id="header">
      <div >
        <div id="logo_text">
          <h1><a href="index.html">Agro<span class="logo_colour">dimoprasies</span></a></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
			<li><a class="active" href="paragwgos.php">Προφίλ</a></li>
			<li><a class="active" href="diathesima_proioda.php">Διαθεσιμα Προιοντα</a></li>
			<li><a href="ekinhsh_dhmoprasias.php">Εκκινηση ΔΗΜΟΠΡΑΣΙΑΣ</a></li>
			<li><a href="dhmoprasies_mou.php">ΟΙ ΔΗΜΟΠΡΑΣΙΕΣ ΜΟΥ</a></li>
			<li><a></a></li>
			<li><a></a></li>
		  <li ><a href="support.html">SUPPORT</a></li>
		  <li><form action="" method="post"><a>
					<input type="Submit" id="logout_button" name="logout_button" value="Αποσύνδεση"></a>
				</form>
		  </li>
		</ul>
      </div>
    </div>
</div>
	<div id="field">
		<form class="modal-content" action="" method="POST">
		  <div class="container">
		  <h1>Αλλαγή στοιχείων λογαριασμού</h1>  
		  <h5>Τα πεδία είναι συμπληρωμένα με τα ήδη υπάρχοντα στοιχεία σας, επιλέξτε το πεδίο 
				που θέλετε να αλλάξετε και πατήστε αλλαγή</h5>
		<hr></hr>
		  </br>
<?php 
include 'logout.php';
header('Content-Type: text/html; charset=utf-8');
session_start();
$hostname='localhost';
$username='root';
$password='';
$mysqlDB='dimoprasia';
$db = new PDO("mysql:host=$hostname;dbname=$mysqlDB",$username,$password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try{	
	$username=$_SESSION['user_session'];
	$stmt = $db->prepare('SELECT * FROM paragwgoi WHERE usernameP=:usernameP');
	$stmt->bindParam(':usernameP',$username);
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	
	if(isset($_POST['signupbtn'])){
		
		$stmt = $db->prepare('UPDATE paragwgoi SET Email_P=:Email_P,OnomaP=:OnomaP,EpithetoP=:EpithetoP,usernameP=:usernameP,passwordP=:passwordP,T_Dieuthunsh_P=:T_Dieuthunsh_P,ThlefwnoP=:ThlefwnoP
							WHERE Email_P=:Email_P');
		$Email_P=$_POST["email"];
		$OnomaP=$_POST["firstname"];
		$EpithetoP=$_POST["lastname"];
		$usernameP=$_POST["username"];
		//$passwordP=$_POST["psw"];
		$T_Dieuthunsh_P=$_POST['dieuthynsh'];
		$ThlefwnoP=$_POST['phone'];
							
		$stmt->bindParam(':Email_P',$Email_P);
		$stmt->bindParam(':OnomaP',$OnomaP);
		$stmt->bindParam(':EpithetoP',$EpithetoP);
		$stmt->bindParam(':usernameP',$usernameP);
		$stmt->bindParam(':passwordP',$passwordP);
		$stmt->bindParam(':ThlefwnoP',$ThlefwnoP);
		$stmt->bindParam(':T_Dieuthunsh_P',$T_Dieuthunsh_P);
		
			if($_POST['psw']==$_POST['psw-repeat']){
				$psw=$_POST['psw'];
				$passwordP = trim( password_hash($psw, PASSWORD_DEFAULT));
				$stmt->execute();
				echo "<meta http-equiv='refresh' content='1'>";
				echo"<div class='msg'>Η ΑΛΛΑΓΗ ΕΓΙΝΕ ΜΕ ΕΠΙΤΥΧΙΑ</div></br></br>";
				//header("Location: admin_profil.php");
			}
			else{
				echo'<b>*** WARNING:Λαθος επαλήθευση password ***</b></br></br>';
			}
	}
	
	
	
	
	logout();//kalw synarthsh logout pou pragmatopoiei logout patwntas aposyndesh

}catch(PDOException $e){
			echo $e->getMessage();
	}

$db=null;
?>
			  <label for="firstname"><b>Όνομα</b></label>
			  <input type="text" placeholder="Δώστε νέο ονόμα" value="<?php echo $row['OnomaP'];?> " name="firstname" required>
			  
			  <label for="laststname"><b>Επώνυμο</b></label>
			  <input type="text" placeholder="Δώστε νέο επιθέτο" value="<?php echo $row['EpithetoP']; ?>" name="lastname" required>
			  
			  <label for="dieuthynsh"><b>Διεύθυνση</b></label>
			  <input type="text" placeholder="Δώστε νέα Διεύθυνση" value="<?php echo $row['T_Dieuthunsh_P'];?>" name="dieuthynsh" required>
			  
			  <label for="phone"><b>Τηλέφωνο</b></label>
			  <input type="text" placeholder="Δώστε νέο αριθμό τηλεφώνου" value="<?php echo $row['ThlefwnoP'];?>" name="phone" maxlength="10" required>
			  </br>
			  <label for="email"><b>Email</b></label>
			  <input type="text" placeholder="Δώστε νέο email" value="<?php echo $row['Email_P'];?>" name="email" required>
			  
			  <label for="email"><b>Username</b></label>
			  <input type="text" placeholder="Δώστε νέο username" value="<?php echo $row['usernameP'];?>" name="username" required>
			  
			  <label for="psw"><b>Νεο Password</b></label>
			  <input type="text" placeholder="Δώστε νέο Password"  name="psw" required>

			  <label for="psw-repeat"><b>Επαλήθευση Password</b></label>
			  <input type="password" placeholder="Επιβεβαιωση νεου κωδικου"  name="psw-repeat" required>
			  
			        <div class="clearfix">
			   <button type="submit" name="signupbtn" class="signupbtn">Αλλαγή</button></div>
 </form>
</div>
</div>	
	
	<div id="footer">
     <p><a href="index.html">Home</a> | <a href="About.html">About us</a> | <a href="support.html">Support</a></p>
		<p>Copyright &copy; Team_Rocket </a></p>
    </div>
	
	
<style>
.epexergasia_stoixeiwn1{
	position:relative;
	left:27%;
	bottom:10px;
}
.epexergasia_stoixeiwn{
	font-family:Verdana;
	color:blue;
}

.text2{
	font-family:Verdana;
	font-size:10pt;
	color:black;
	padding-bottom:5%;
	padding-left:33%;

}
#profiltext1{
	font-family:sans-serif;
	margin-left:33%;
}
#profiltext{
	font-family:sans-serif;
	margin-left:37%;
}

#logout_button{
    background: none;
    color: inherit;
    border: none;
    padding: 0;
    font-family:san-serif;
	font-size:10pt;
    cursor: pointer;
    outline: inherit;
}

.select-join select{
	width:61%;
	font-family:Verdana;
	font-size:10pt;
	color:#107015;
	background-color:#f1f1f1;
	text-align-last:center;
}

#field{
	margin-top:40px;
	margin-left:20%;
	width:60%;
	//border:2px solid white;
	}
		
body {
	font-family: Arial, Helvetica, sans-serif;
	}


input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 25px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

#text_area,#product_value,#startline{
   padding: 15px;
    margin: 5px 0 25px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
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


.cancelbtn,.cancelbtn33 {
    padding: 10px 15px;
    background-color: #f44336;
}


.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
  margin-left:50px;
}


.container {
    padding: 16px;
}

.modal-content {
    background-color: #fefefe;
    margin: 1% auto 5% auto; 
    border: 1px solid #888;
    width: 80%; 
	
}
.modal-content2 {
    background-color: #fefefe;

	margin:10%;
    border: 1px solid #888;
    width: 80%; 
	background-color:#e0ebeb;
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

/* Clear floats */
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

#list_products {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#list_products td, #list_products th {
    border: 1px solid #ddd;
    padding: 8px;
}

#list_products tr:nth-child(even){background-color: #f2f2f2;}

#list_products tr:hover {background-color: #ddd;}

#list_products th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
#imageUpload
{
    display: none;
}

#profileImage
{
    cursor: pointer;
}

#profile-container {
    width: 150px;
    height: 150px;
    overflow: hidden;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border-radius: 50%;
	margin-left:37%;
}

#profile-container img {
    width: 150px;
    height: 150px;
}
</style>

	
</body>
</html>