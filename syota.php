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
  <div class="keskusta">
    <h1>
      Kiitos!
    </h1>
    <span class="teksti">
      <br />
      <?php
      $aineisto = $_POST["aineisto"];
      $tapaus = $_POST["tapaus"];
      $osakohteet = $_POST["osakohteet"];
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
     if(!$db) {
      echo $this->lastErrorMsg()."<br />\n";
    } else {
      $sql="INSERT INTO tietueet (AINEISTO, TAPAUS, OSAKOHTEET, AIKA, KOMMENTTI) values ('$aineisto', '$tapaus', '$osakohteet', '$aika', '$kommentti');";
      $ret = $db->exec($sql);
      if(!$ret){
        echo $db->lastErrorMsg(); echo "<br>\n";
      } else {
        echo "Tietojen syöttäminen onnistui. ";
      }
      $sql="SELECT COUNT(*) FROM tietueet";
      $count = $db->querySingle($sql);
      echo "Tietoja on nyt syötetty yhteensä $count tietueesta.";
      $db->close();
    }
    ?>
    <br />
    <br />
    <a href="http://kuvailu.melinda.kansalliskirjasto.fi/lomake/" target="_parent"><button>Palaa pääsivulle</button></a>
  </span>
</body>
</html>
