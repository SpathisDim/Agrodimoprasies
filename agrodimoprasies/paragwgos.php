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
		<form class="modal-content" action="dhmoprasies_mou.php" method="POST">
		 <div class="modal-content2">
					 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<div id="profile-container">
	   <image id="profileImage" src="https://www.lemma.com/assets/img/lemma-default-profile.png" />
		</div>
		<input id="imageUpload" type="file" 
		   name="profile_photo" placeholder="Photo" required="" capture>
		   
		<script type="text/javascript">
				$("#profileImage").click(function(e) {
					$("#imageUpload").click();
				});

				function fasterPreview( uploader ) {
					if ( uploader.files && uploader.files[0] ){
						  $('#profileImage').attr('src', 
							 window.URL.createObjectURL(uploader.files[0]) );
					}
				}

				$("#imageUpload").change(function(){
					fasterPreview( this );
				});
			</script>
	
	
<br>
<h6 id="profiltext1">*** Πατήστε στην εικόνα για εισαγωγή εικόνας προφίλ ***</h6>
<p><h2 id="profiltext"> ΤΟ ΠΡΟΦΙΛ ΜΟΥ </h2></p>
<hr></hr>

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
	
	logout();//kalw synarthsh logout pou pragmatopoiei logout patwntas aposyndesh

}catch(PDOException $e){
			echo $e->getMessage();
	}

$db=null;
?>
				<div class="text2">
				</br>
				<p><b> Όνομα:</b><?php echo $row['OnomaP']; ?>
				</br>
				<p ><b> Επίθετο:</b><?php echo $row['EpithetoP']; ?>
				</br>
				<p><b> Username:</b><?php echo $row['usernameP']; ?>
				</br>
				<p><b>Ταχυδρομική διεύθυνση:</b><?php echo $row['T_Dieuthunsh_P']; ?>
				</br>
				<p><b>Τηλέφωνο:</b><?php echo $row['ThlefwnoP']; ?>
				</br>
				<p><b>Email:</b><?php echo $row['Email_P']; ?>
				</br>
				</div>
					<div class="epexergasia_stoixeiwn1"><a class="epexergasia_stoixeiwn" href="allagh_stoixeiwn_paragwgou.php"><b>Πατήστε εδώ για αλλαγή των στοιχείων σας!</b></a>
					</div>
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