<!DOCTYPE html>

<head>
	<link rel="stylesheet" type="text/css" href="css/tyyli.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>
	<meta charset="UTF-8"/>
	<title>Hyötyselvityksen syöttölomake</title>
	<script>
		$(document).ready(function() {
			$('.tooltip').tooltipster({
				theme: 'tooltipster-shadow'});
			// $('input[type="button"]').click(function(){
			// if(!$(this).hasClass('nappi'))
			// $(this).addClass('nappi');
			  //});
			$( "#start" ).click(function() {
			  $( ".showhide" ).first().show( "fast", function showNext() {
			  $( this ).next( "h5" ).show( "fast", showNext );
				});
			});
			 $( "#stop" ).click(function() {
			   $( ".showhide" ).hide( 100 );
		   });
		});
	</script>
</head>
<body>
<br />
<img src="http://www.kansalliskirjasto.fi/imgs/kk/logot/kansalliskirjastologo_fi.gif">
<br /><br />
<div id="keskusta">
<h1>
Hyötyselvityksen syöttölomake
</h1>
<span class="teksti">
<p> 
Tällä lomakkeella kerätään tietoa Melinda-luetteloinnin kestosta. Kansalliskirjasto arvioi kerättyjen tietojen perusteella Melindaan liittymisen hyötyjä kirjastoille. Tuloksia käytetään Kansallinen metatietovaranto -hankkeen ohjauksessa.
<br /><br /> 
Tietueiden luettelointiajat kirjataan lomakkeella yksi kerrallaan. Kyselyssä huomioidaan ainoastaan kirja-aineisto (painetut monografiat, joilla oma nimeke) ja tapaukset, joissa paikalliskantaan tuotetaan uusi bibliografinen tietue. Esimerkiksi uuden niteen lisäämistä jo kokoelmassa olevalle nimekkeelle ei näin ollen huomioida, sillä tämä tapahtuu Melindan ulkopuolella.
<br /><br /> 
Kommenttikentässä voit tarvittaessa mainita luetteloinnin kestoon vaikuttaneita asioita, erityisesti jos tietueeseen liittyi kuvailua hidastavia tekijöitä (translitteroitava kieli, paljon tuplia joista valita, epäselvyyksiä tekijän nimimuodossa...). Mainitse kommentissa myös, mikäli luetteloinnin aikana tapahtui keskeytys (vastasit puhelimeen tms.).
<br /> <br /> 
Voit mainita kommenttikentässä myös yleisesti kokemuksiasi Melindassa työskentelystä, ei välttämättä vain kirjattavaan tietueeseen liittyen.
</p>
</span>
</div>
<br />
<div id="keskusta">
<span class="teksti">
<form id="lomake" action="syota.php" method="post">Kirjaa tähän tiedot suorittamastasi kuvailutapauksesta.
<br><br>
<input type="radio" name="tapaus" value="Tapaus 1"><span class="tooltip" title="Teos luetteloidaan ennakkotietueen pohjalta itse.">Tapaus 1</span>
<br />
<input type="radio" name="tapaus" value="Tapaus 2"><span class="tooltip" title="Valmis tietue tallennetaan tietokantaan.">Tapaus 2</span>
<br />
<input type="radio" name="tapaus" value="Tapaus 3"><span class="tooltip" title="Nimeke kuvaillaan tallennuspohjan päälle.">Tapaus 3</span>
<br />
<br />
<input type="button" value="Aloita kellotus" id="start" onclick="doTimer()" /></span>
<input type="hidden" id="txt" />
<input type="hidden" id="aika" name="aika" />
<input type="button" value="Pysäytä kellotus" id="stop" onclick="stopCount()" />
<span class="showhide">Kellotus on käynnissä.</span>
<script type="text/javascript">

var start = new Date().getTime(); 
var elapsed = '0.0'; 
var t;
var timer_is_on=0;

function refreshPage() {
	location.reload();
}

function timedCount() {
	var time = new Date().getTime() - start;
	elapsed = Math.floor(time / 100) / 10; 
	if(Math.round(elapsed) == elapsed) { elapsed += '.0'; } 
	document.getElementById('txt').value = Math.round(elapsed);
	t=setTimeout("timedCount()",50);
}

function showElapsed() {
	alert('Kellon lukema: ' + Math.floor(elapsed) + " s.");
}

function doTimer() {
if (!timer_is_on) {
    start = new Date().getTime(); 
	timer_is_on=1;
	timedCount();
	}
}

function stopCount() {
	clearTimeout(t);
	document.getElementById('aika').value = Math.floor(elapsed);
	timer_is_on=0;
}

function resetCount() {
	document.getElementById('txt').value='0';
	var elapsed = '0.0';
}
</script>
<br /> <br />
Kommentti (vapaaehtoinen)
<br />
<span class="tooltip" title="Voit liittää halutessasi mukaan kommentteja kuvailemastasi nimekkeestä."><textarea name="kommentti" rows=10 cols=50 /></textarea></span>
<br />
<input type="submit" name="laheta" value="Tallenna tiedot">
<span class="tooltip" title="Jos haluat tarkistaa kellon mittaaman lukeman, se onnistuu tästä."><input type="button" value="Tarkista lukema" onclick="showElapsed()" /></span>
<span class="tooltip" title="Jos jotain meni vikaan, voit tyhjentää lomakkeen tästä."><input type="button" value="Tyhjennä lomake" onclick="refreshPage()" /></span>
</form>
</span>
</div>
</body>
</html>
