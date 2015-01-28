<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/tyyli.css" type="text/css" />
<meta charset="UTF-8"/>
<title>Hyötyselvityksen syöttölomake</title>
</head>
<body>
<br />
<img src="http://www.kansalliskirjasto.fi/imgs/kk/logot/kansalliskirjastologo_fi.gif">
<br /><br />
<div id="keskusta">
<h1>
Kiitos!
</h1>
<span class="teksti">
<br />
<?php
	$tapaus = $_POST["tapaus"];
	$kommentti = $_POST["kommentti"];
	$aika = $_POST["aika"];
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('tietokanta.db');
      }
   }
   $db = new MyDB();
   $sql="INSERT INTO tietueet (TAPAUS, AIKA, KOMMENTTI) values ('$tapaus', '$aika', '$kommentti')";
	
	$ret = $db->exec($sql);
	if(!$ret){
		echo $db->lastErrorMsg();
	} else {
		 echo "Tietojen syöttäminen onnistui. ";
	}
	$sql="SELECT COUNT(*) FROM tietueet";
	$count = $db->querySingle($sql);
	echo "Tietoja on nyt syötetty yhteensä $count tietueesta.";
	$db->close();
?>
<br />
<br />
<a href="index.php" target="_parent"><button>Palaa pääsivulle</button></a>
</span>
</body>
</html>
