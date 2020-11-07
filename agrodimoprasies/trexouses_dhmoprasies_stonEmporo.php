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
		  <li ><a href="support.html">SUPPORT</a></li>
		  <li ><form action="" method="post"><a>
					<input type="Submit" id="logout_button" name="logout_button" value="Αποσύνδεση"></a>
				</form></li>
        </ul>
      </div>
    </div>
</div>
<div id="field">
	 <form class="modal-content" action="prosfores_emporou.php" method="POST">
	 <div class="modal-content2">
	 <div class="container">
	 <h1>Συμμετοχη σε δημοπρασια</h1>
	 <h5>Δωστε το ID του προϊόντος για το οποίο θέλετε να κάνετε προσφορά και ορίστε την τιμη εκκινησης του.!</h5>
	 <hr></hr>
	 <label for="product_name"><b>ID Προϊόντος</b></label>
		<input type="text" placeholder="Enter product ID" name="productid" required>
	  </br>
	 <label  for="product_value"><b>Τιμή Εκκίνησης</b></label></br>
		<input id="product_value" name="Timh_Ekkinhshs" type="number" placeholder="Τιμή εκκίνησης"> €
	</br>
	<label for="startline"><b>Ημερομηνία και ώρα προσφοράς</b></label>
			<input id="startline" type="datetime-local" name="date_time">
	</br></br> </br>
	<div class="clearfix">
		<button type="submit" class="signupbtn" name="prosthiki_button">Συμμετοχή</button>
	</div>
	</div>
	</br> 
		<hr></hr>
		<h4>ΕΝΕΡΓΕΣ  ΔΗΜΟΠΡΑΣΙΕΣ</h4>
			<table id="list_products"><!-- pinakas me ta proioda poy eishgage o admin -->
				  <tr>
					<th>ID</th>
					<th>Περιγραφή</th>
					<th>Ποσότητα</th>
					<th>Τιμη Εκκίνησης</th>
					<th>Ημερομηνία και ώρα έναρξης</th>
					<th>Ημερομηνία και ώρα λήξης</th>
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
					
					$sql1 = "SELECT * FROM kataxwrhmena_proioda_dhmoprasias";
					$stmt1 = $db->query($sql1);
					$result = $stmt1->fetchAll();
					
					foreach($result as $row){
						
						echo"<tr>
								<td>" .$row['Kwdikos_Proiodos']. "</td>
								<td>" .$row['Perigrafh']. "</td>
								<td>" .$row['Posothta']. "</td>
								<td>" .$row['Timh_Ekkinhshs']. "</td>
								<td>" .$row['Hm_W_enarxis']. "</td>
								<td>" .$row['Hmeromhnia_kai_wra_lhxhs']. "</td>
							</tr>";
					}
					echo'</table>';
	
				logout();//kalw synarthsh logout pou pragmatopoiei logout patwntas aposyndesh
			}catch(PDOException $e){
				   echo $e->getMessage();
			}
			$db=null;
			?>
	
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
</style>

	
</body>
</html>