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
	<div id="field">
		 
	  <form class="modal-content"  method="POST" action="dhmoprasies_mou.php">
		<div class="container">
		  <h1>ΕΝΑΡΞΗ ΔΗΜΟΠΡΑΣΙΑΣ</h1>  
		  </br>
		 
			<div class="select-join">
				<label for="product_name"><b>Επιλογή προϊόντος:</b></label>
		  <!--input type="text" placeholder="Όνομα προϊόντος" name="productname" required-->
					<select name="Proioda" id="proioda">
						<option selected disabled>-- Προϊόντα --</option>
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
							
								$sql = "SELECT * FROM proioda";
								$stmt1 = $db->query($sql);
								$result = $stmt1->fetchAll();
								$i=0;
								foreach($result as $row){
									$i=$i+1;
									echo"<option value= " .$row["Onoma_Proiodos"]. ">"  .$row["Onoma_Proiodos"]." ".$row["tropos_pwlhshs"]."</option>";						
								}
							}catch(PDOException $e){
								echo $e->getMessage();
							}
							$db=null;
						?>
					</select>
			</div>	
		  
		  </br></br>
		  <label for="product_description"><b>Περιγραφή προϊόντος</b></label>
		  <textarea id="text_area" name="perigrafh" class="textarea" placeholder="Περιγραφή προϊόντος..." rows="10" cols="36" name="perigrafh"></textarea>
		  </br>
		  <form action="upload_file.php" method="post" enctype="multipart/form-data">
		  <label for="product_name"><b>Εικόνα Προϊόντος</b></label>
			<input type="file" name="image" id="file"></form>
		  </br></br>
		  <label  for="product_quantity"><b>Ποσότητα Προϊόντος</b></label>
			<input id="product_quantity" name="posotita" type="number" placeholder="Ποσότητα προϊόντος">
		  </br>
		  <label  for="product_value"><b>Τιμή Εκκίνησης</b></label></br>
			<input id="product_value" name="Timh_Ekkinhshs" type="number" placeholder="Τιμή εκκίνησης"> €
		  </br>
		  <label for="startline"><b>Ημερομηνία και ώρα εκκίνησης</b></label>
			<input id="startline" type="datetime-local" name="start">
		  </br>
		  <label for="endline"><b>Ημερομηνία και ώρα λήξης</b></label>
			<input id="endline" type="datetime-local" name="end">
			
		  <div class="clearfix">
			<button type="reset" class="cancelbtn">Clear</button>
			<button type="submit" class="signupbtn" name="prosthiki_button">Έναρξη</button>
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
    margin: 1% auto 5% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}
.modal-content2 {
    background-color: #fefefe;
    margin: 1% auto 5% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 0px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
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