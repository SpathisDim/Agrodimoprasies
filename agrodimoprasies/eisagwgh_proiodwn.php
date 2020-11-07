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
			<li><a class="active" href="admin_profil.php">Προφίλ</a></li>
			<li><a class="active" href="eisagwgh_proiodwn.php">ΕΙΣΑΓΩΓΗ Προϊοντων</a></li>
			<li><a href="product_list.php">λιστα προϊοντων</a></li>
			<li><a href="trexouses_dhmoprasies.php">ΤΡΕΧΟΥΣΕΣ ΔΗΜΟΠΡΑΣΙΕΣ</a></li>
			<li><a></a></li>
			<li><a></a></li>
			<li ><form action="index.html" method="post"><a>
					<input type="Submit" id="logout_button" name="logout_button" value="Αποσύνδεση"></a>
				</form></li>
        </ul>
      </div>
    </div>
</div>	
	<div id="field">
	  <form class="modal-content"  method="POST" action="">
		<div class="container">
		  <h1>Εισαγωγη Προϊοντων</h1>

		  <label for="product_name"><b>Όνομα Προϊόντος</b></label>
		  <input type="text" placeholder="Enter product name" name="productname" required>
		  </br>
		  <div class="select-join">
		  <label for="dieuthynsh"><b>Τρόπος Πώλησης: </b></label>
		
			<select name="tropos_plhrwmhs">
				<option value="anaTemaxio">ανά Τεμάχιο</option>
				<option value="anaKilo">ανά Κιλό</option>
			</select>
		  </div>
		  </br></br></br>
		  <label for="product_description"><b>Περιγραφή προϊόντος</b></label>
		  <textarea id="text_area" class="textarea" placeholder="Δωστε μια περιγραφη..." rows="10" cols="36" name="perigrafh"></textarea>

		  <div class="clearfix">
			<button type="reset" class="cancelbtn">Clear</button>
			<button type="submit" name="prosthiki_button" class="signupbtn">Προσθήκη</button>
		  </div>
		</div>
	  </form>

		  <?php 
			    include 'logout.php';
			    session_start();
				header('Content-Type: text/html; charset=utf-8');
				$hostname='localhost';
				$username='root';
				$password='';
				$mysqlDB='dimoprasia';
				
				try{
					$db = new PDO("mysql:host=$hostname;dbname=$mysqlDB",$username,$password);
					//echo 'Connected to database';
    				if(isset($_POST['prosthiki_button'])){
						$stmt=$db->prepare("INSERT INTO proioda(Onoma_Proiodos,tropos_pwlhshs, Perigrafh) VALUES (:Onoma_Proiodos, :tropos_pwlhshs, :Perigrafh)");
						$stmt->bindParam(':Onoma_Proiodos',$Onoma_Proiodos);
						$stmt->bindParam(':tropos_pwlhshs',$tropos_pwlhshss);
						$stmt->bindParam(':Perigrafh',$Perigrafh);
						if(isset($_POST['productname'])){
							
							$Onoma_Proiodos=$_POST['productname'];
							
						}
						if(isset($_POST['tropos_plhrwmhs'])){
							if($_POST['tropos_plhrwmhs']=="anaKilo"){
								$tropos_pwlhshss='ανα Κιλό';
								
							}else if($_POST['tropos_plhrwmhs'] == "anaTemaxio"){
								$tropos_pwlhshss='ανα Τεμαχιo';
								
							}
						}
						if(isset($_POST['perigrafh'])){
							$Perigrafh=$_POST['perigrafh'];
						}
						$stmt->execute();
							
						  echo'<div class="modal-content2">';
						    echo '<u>Η καταχώρηση του προϊόντος <i>' .$_POST['productname']. '</i> έγινε με επιτυχία !!!</u>';
					}
				logout();//kalw synarthsh logout pou pragmatopoiei logout patwntas aposyndesh
			}catch(PDOException $e){
				   echo $e->getMessage();
			}
			$db=null;
			?>
	    </div>
	</div>
	
    <div id="footer">
     <p><a href="index.html">Home</a> | <a href="About.html">About us</a> | <a href="support.html">Support</a></p>
		<p>Copyright &copy; Team_Rocket </a></p>
    </div>
<style>
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

#text_area{
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
    border: 1px solid #888;
    width: 80%; 
}


.modal-content2 {
    
	font-family: Arial, Helvetica, sans-serif;
	font-size:14pt;
	padding-top: 12px;
    padding-bottom: 12px;
	margin-left:50px;
    text-align: left;
    color: white;
    margin: 1% auto 5% auto; /* 5% from the top, 15% from the bottom and centered */
    width: 50%; /* Could be more or less, depending on screen size */
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



</style>

	
</body>
</html>