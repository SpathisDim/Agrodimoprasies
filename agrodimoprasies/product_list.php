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
          <!-- class="logo_colour", allows you to change the colour of the text -->
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
	  <form class="modal-content" action="product_list.php" method="POST">
		<div class="modal-content2">
		 <h4>ΛΙΣΤΑ ΜΕ ΤΑ ΔΙΑΘΕΣΙΜΑ ΠΡΟΙΟΝΤΑ ΓΙΑ ΔΗΜΟΠΡΑΣΙΑ</h4>
		 <table id="list_products"><!-- pinakas me ta proioda poy eishgage o admin -->
		  <tr>
			<th>Όνομα προϊόντος</th>
			<th>Τρόπος Πώλησης</th>
			<th>Περιγραφή</th>
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

					/* 
						SELECT proioda
					*/
						$sql = "SELECT * FROM proioda";
						$stmt = $db->query($sql);
						$result = $stmt->fetchAll();
						
						foreach($result as $row){
							
							echo"<tr>
									<td>" .$row['Onoma_Proiodos']. "</td>
									<td>" .$row['tropos_pwlhshs']. "</td>
									<td>" .$row['Perigrafh']. "</td>
								</tr>";						
						}
						echo"</table>";
						
						/* 
							diagrafh proiodos apo tin vash
						*/
						if(isset($_POST['submit_button'])){
							if(isset($_POST['afairesh_pro'])){
								$Onoma_Proiodos = $_POST['afairesh_pro'];
								$sql1 = 'DELETE  FROM proioda WHERE Onoma_Proiodos =:Onoma_Proiodos';
								$sq = $db->prepare($sql1);
								$sq->bindParam('Onoma_Proiodos',$Onoma_Proiodos);	
								if($sq->execute()){
									echo "<meta http-equiv='refresh' content='0'>";
								}else{
									echo"Αποτυχια διαγραφης.Προσπαθηστε ξανα!";
								}
							  						
							}
						
						}
						if(isset($_POST['diagrafh_button'])){
							$stmt=$db->prepare('DELETE FROM proioda');
							$stmt->execute();
							echo "<meta http-equiv='refresh' content='0'>";
						}
			}catch(PDOException $e){
				
				echo $e->getMessage();
			}
			$db=null;
			?>
		   </br></br></br></br>
		   <label><b>Αφαίρεση προϊόντος απο την λιστα</b></label>
			
				<input type="text" placeholder="δωστε το ονομα του προϊόντος" name="afairesh_pro" >
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