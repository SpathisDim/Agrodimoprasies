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
          <li><a class="active" href="emporos.php">Προφίλ</a>
		  <li><a class="active" href="diathesima_proioda_stonEmporo.php">Διαθεσιμα Προιοντα</a></li>
		  <li><a href="trexouses_dhmoprasies_stonEmporo.php">ΤΡΕΧΟΥΣΕΣ ΔΗΜΟΠΡΑΣΙΕΣ</a></li>
		  <li><a href="prosfores_emporou.php">Οι προσφορες μου</a></li>
		  <li><a></a></li>
		  <li><a></a></li>
		<li><a></a></li>
		  <li ><a href="support.html">SUPPORT</a></li>
		  <li ><form action="" method="post"><a>
					<input type="Submit" id="logout_button" name="logout_button" value="Αποσύνδεση"></a>
				</form></li>
        </ul>
      </div>
    </div>
</div>	
<div id="field">
	  <form class="modal-content" action="" method="POST">
		<div class="modal-content2">
		
		 <h4>ΛΙΣΤΑ ΜΕ ΤΙΣ ΠΡΟΣΦΟΡΕΣ ΣΑΣ</h4>
		 <table id="list_products"><!-- pinakas me ta proioda poy eishgage o admin -->
		  <tr>
			<th>Τιμη Προσφορας</th>
			<th>Ημερομηνια και ωρα προσφορας</th>
			<th>Κωδικος Δημοπρασιας</th>
			<th>Προϊον</th>
		  </tr>
		  <?php 
				include 'logout.php';
				session_start();
				header('Content-Type: text/html; charset=utf-8');
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
					//echo 'Connected to database';

					
					if(isset($_POST['prosthiki_button'])){
						//susxetish id proiodos me eporo
						$stmt=$db->prepare('INSERT INTO dhmopratouda_proionta_endiaferonta_pros_emporous(Kwdikos_Proiod,Email_E)
											VALUES(:Kwdikos_Proiod,:Email_E)');	
						$stmt->bindParam(':Kwdikos_Proiod',$_POST['productid']);
						
							//koitazw ton syndedemeno xrhsth pairnw to email tou wste na ginei swsth antistoixish ID proiodos me Email emporou
							$username=$_SESSION['user_session'];
							$stmt1 = $db->prepare('SELECT * FROM emporoi WHERE usernameE=:usernameE');
							$stmt1->bindParam(':usernameE',$username);
							$stmt1->execute();
							$row=$stmt1->fetch(PDO::FETCH_ASSOC);
									
						$stmt->bindParam(':Email_E',$row['Email_Emporou']);	
						$stmt->execute();	
						
						//perasma stin database table Prosfores ta stoixeia 
						$stmt2=$db->prepare('INSERT INTO prosfores(Kwdikos_Emporou,Kwdikos_Dhmoprasias,Timh_Prosforas,Hmeromhnia_kai_wra_prosforas,Email_E)
											VALUES(:Kwdikos_Emporou,:Kwdikos_Dhmoprasias,:Timh_Prosforas,:Hmeromhnia_kai_wra_prosforas,:Email_E)');
						$stmt2->bindParam(':Kwdikos_Emporou',$Kwdikos_Emporou);
						$stmt2->bindParam(':Kwdikos_Dhmoprasias',$Kwdikos_Dhmoprasias);
						$stmt2->bindParam(':Timh_Prosforas',$_POST['Timh_Ekkinhshs']);
						$stmt2->bindParam(':Hmeromhnia_kai_wra_prosforas',$_POST['date_time']);
						$stmt2->bindParam('Email_E',$row['Email_Emporou']);

						
						$Kwdikos_Emporou=1;
						$Kwdikos_Dhmoprasias=1;
						$stmt2->execute();
					}
					

						$sql = "SELECT * FROM prosfores";
						$stmt = $db->query($sql);
						$result = $stmt->fetchAll();
						
						foreach($result as $row){
							
							echo"<tr>
									<td>" .$row['Timh_Prosforas']. " €</td>
									<td>" .$row['Hmeromhnia_kai_wra_prosforas']. "</td>
									<td>" .$row['Kwdikos_Dhmoprasias']. "</td>
								</tr>";						
						}
						echo"</table>";
						if(isset($_POST['diagrafh_button'])){
							$stmt=$db->prepare('DELETE FROM prosfores');
							$stmt->execute();
							$stmt=$db->prepare('DELETE FROM dhmopratouda_proionta_endiaferonta_pros_emporous');
							$stmt->execute();
							
							echo "<meta http-equiv='refresh' content='0'>";
						}
					logout();//kalw synarthsh logout pou pragmatopoiei logout patwntas aposyndesh
			}catch(PDOException $e){
				   echo $e->getMessage();
			}
			
			?>
		   </br></br></br></br>
		   <label><b>Ακύρωση Προσφοράς</b></label>
			
				<input type="text" placeholder="δωστε το id της δημοπρασιας" name="afairesh_pro" >
				<div class="clearfix">
					<button type="submit" name="submit_button" class="cancelbtn">Αφαίρεση</button>				
				</div>
				</br></br></br></br>
				<button type="submit" name="diagrafh_button" class="cancelbtn33">Διαγραφή Λίστας</button>
		</div>
      </form>
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

#text_area{
   padding: 15px;
    margin: 5px 0 25px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

/* Set a style for all buttons */
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
  width: 22%;
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
    margin: 1% auto 5% auto; 
    border: 0px solid #888;
    width: 80%; 
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
</style>

	
</body>
</html>