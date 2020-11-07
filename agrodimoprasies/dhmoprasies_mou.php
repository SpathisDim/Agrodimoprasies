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
			<li ><form action="index.html" method="post"><a>
					<input type="Submit" id="logout_button" name="logout_button" value="Αποσύνδεση"></a>
				</form></li>
        </ul>
      </div>
	  </div>
    </div>
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
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							//echo 'Connected to database';
		
		
    				if(isset($_POST['prosthiki_button'])){
						//epilogh proiodos apo to drop down list 
						if(isset($_POST['Proioda'])){
							
						    $stmt = $db->prepare('SELECT * FROM proioda WHERE Onoma_Proiodos=:Onoma_Proiodos');
							$stmt->bindParam(':Onoma_Proiodos',$_POST['Proioda']);
							$stmt->execute();
						    $row=$stmt->fetch(PDO::FETCH_ASSOC);
						
							//user
							$username=$_SESSION['user_session'];
							$stmt = $db->prepare('SELECT * FROM paragwgoi WHERE usernameP=:usernameP');
							$stmt->bindParam(':usernameP',$username);
							$stmt->execute();
							$rowUSER=$stmt->fetch(PDO::FETCH_ASSOC);
							
							//db table proionta_paragwgwn
							$stmt2=$db->prepare("INSERT INTO proionta_paragwgwn(Email_Paragwgou,Onoma_Proiodos_p)
														VALUES(:Email_Paragwgou,:Onoma_Proiodos_p)");
							$stmt2->bindParam(':Email_Paragwgou',$rowUSER['Email_P']);
							$stmt2->bindParam(':Onoma_Proiodos_p',$row['Onoma_Proiodos']);
							$stmt2->execute();
							
						}
						
						$stmt=$db->prepare("INSERT INTO kataxwrhmena_proioda_dhmoprasias(Eikona,Perigrafh,Posothta,Timh_Ekkinhshs,Hm_W_enarxis,Hmeromhnia_kai_wra_lhxhs,Email_Paragwgou_d) 
											VALUES (:Eikona,:Perigrafh,:Posothta,:Timh_Ekkinhshs,:Hm_W_enarxis,:Hmeromhnia_kai_wra_lhxhs,:Email_Paragwgou)");
											
						//$stmt->bindParam(':Kwdikos_Proiodos',$Kwdikos_Proiodos);
						//$Eikona=addslashes($_FILES['image']['type']);
						$stmt->bindParam(':Eikona',$Eikona);
						$stmt->bindParam(':Perigrafh',$Perigrafh);
						$stmt->bindParam(':Posothta',$Posothta);
						$stmt->bindParam(':Timh_Ekkinhshs',$Timh_Ekkinhshs);
						$stmt->bindParam(':Hm_W_enarxis',$Hm_W_enarxis);
						$stmt->bindParam(':Hmeromhnia_kai_wra_lhxhs',$Hmeromhnia_kai_wra_lhxhs);
						$stmt->bindParam(':Email_Paragwgou',$rowUSER['Email_P']);
						/*if(isset($_POST['productname'])){						
							$Kwdikos_Proiodos=$_POST[''];	
						}*/
						if(isset($_POST['posotita'])){
							$Posothta=$_POST['posotita'];
						}
						if(isset($_POST['perigrafh'])){
							$Perigrafh=$_POST['perigrafh'];
						}
						if(isset($_POST['Timh_Ekkinhshs'])){
							$Timh_Ekkinhshs=$_POST['Timh_Ekkinhshs'];
						}
						if(isset($_POST['start'])){
						
							$Hm_W_enarxis=$_POST['start'];
							
						}
						if(isset($_POST['end'])){
							$Hmeromhnia_kai_wra_lhxhs=$_POST['end'];
						}				
						
						$Eikona=0;
						$stmt->execute();
						/* gia to refresh page na min ginetai xana prosthiki tou idiou proiodos*/
						/*$sql1 = "SELECT * FROM kataxwrhmena_proioda_dhmoprasias";
						$stmt1 = $db->query($sql1);
						$result = $stmt1->fetchAll();
						foreach($result as $row){
							if($row['Perigrafh'] != $Perigrafh){
								$stmt->execute();
							}	  
						}*/
					}
				logout();//kalw synarthsh logout pou pragmatopoiei logout patwntas aposyndesh
			}catch(PDOException $e){
				   echo $e->getMessage();
			}
		    
			$db=null;
			?>
	
	<div id="field">
	  <form class="modal-content" action="dhmoprasies_mou.php" method="POST">
	  <div class="modal-content2">
		<h4>ΛΙΣΤΑ ΜΕ ΤIΣ ΕΝΕΡΓΕΣ ΣΑΣ ΔΗΜΟΠΡΑΣΙΕΣ</h4>
			<table id="list_products"><!-- pinakas me ta proioda poy eishgage o admin -->
				  <tr>
					<th>ID</th>
					<th>Περιγραφή</th>
					<th>Ποσότητα</th>
					<th>Τιμη Εκκίνησης</th>
					<th>Ημερομηνία και ώρα έναρξης</th>
					<th>Ημερομηνία και ώρα λήξης</th>
					<th>Προϊόν</th>
				  </tr>

		  <?php 
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
					

					$stmt= $db->prepare("Select Onoma_Proiodos_p FROM proionta_paragwgwn,kataxwrhmena_proioda_dhmoprasias
										WHERE Email_Paragwgou_d=Email_Paragwgou ");
					//$stmt->bindParam(':proion',$_POST['Proioda']);					
					$stmt->execute();	
										
					$rowProion=$stmt->fetch(PDO::FETCH_ASSOC);
					
					
					$sql1 = "SELECT * FROM kataxwrhmena_proioda_dhmoprasias";
					$stmt1 = $db->query($sql1);
					$result = $stmt1->fetchAll();
					
					foreach($result as $row){
							echo"<tr>
							
								<td>" .$row['Kwdikos_Proiodos']. "</td>
								<td>" .$row['Perigrafh']. "</td>
								<td>" .$row['Posothta']. "</td>
								<td>" .$row['Timh_Ekkinhshs']. " €</td>
								<td>" .$row['Hm_W_enarxis']. "</td>
								<td>" .$row['Hmeromhnia_kai_wra_lhxhs']. "</td>
								<td>" .$rowProion['Onoma_Proiodos_p']."</td>
							</tr>";	
					}
				
					echo'</table>';

					if(isset($_POST['submit_button'])){
							if(isset($_POST['afairesh_id'])){
								$Kwdikos_Proiodos = $_POST['afairesh_id'];
								$sql1 = 'DELETE  FROM kataxwrhmena_proioda_dhmoprasias WHERE Kwdikos_Proiodos=:Kwdikos_Proiodos';
								$sq = $db->prepare($sql1);
								$sq->bindParam(':Kwdikos_Proiodos',$Kwdikos_Proiodos);	
								$sq->execute();
								
								/*$Kwdikos_Proiodos = $_POST['afairesh_id'];
								$sql1 = 'DELETE  FROM kataxwrhmena_proioda_dhmoprasias,proioda_paragwgwn WHERE Email_Paragwgou=Email_Paragwgou_d AND Kwdikos_Proiodos=:Kwdikos_Proiodos';
								$sq = $db->prepare($sql1);
								
								//$sq ->bindParam(':Email_Paragwgou_d',$mailkey2);
								$sq->bindParam(':Kwdikos_Proiodos',$Kwdikos_Proiodos);	
								$sq->execute();*/
								
								
								$stmt =$db->prepare('DELETE FROM proionta_paragwgwn WHERE Email_Paragwgou=:Email_Paragwgou_d AND Onoma_Proiodos_p=:onomap');
									$stmt->bindParam(':Email_Paragwgou_d',$rowUSER['Email_P']);
									$stmt->bindParam(':onomap',$rowProion['Onoma_Proiodos_p']);
								$stmt ->execute();
							}
						echo "<meta http-equiv='refresh' content='0'>";
						}
					
				
			}catch(PDOException $e){
				   echo $e->getMessage();
			}
			$db=null;
			?>
			</br></br></br>
			<label><b>Διαγραφη δημοπρασίας</b></label>
			<input type="text" placeholder="δώστε το ID" name="afairesh_id" >
			<div class="clearfix">
					<button type="submit" name="submit_button" class="cancelbtn">Διαγραφή</button>				
			</div>
		</div>
		
		</div>
	  </form>
	
	
	
	
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
	width:99%;
	font-family:Verdana;
	font-size:11pt;
	color:#107015;
	background-color:#f1f1f1;
	text-align-last:center;
}

#field{
	margin-top:40px;
	margin-left:10%;
	width:80%;
	
	
}
		
body {
	font-family: Arial, Helvetica, sans-serif;
	}


input[type=text], input[type=password] {
    width: 30%;
    padding: 10px;
    margin: 5px 0 25px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

#text_area, #product_value, #startline, #product_quantity, #endline{
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
	margin-left:0%
}


.cancelbtn, .signupbtn {
  float:left;
  width: 20%;
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
    width: 95%; 
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