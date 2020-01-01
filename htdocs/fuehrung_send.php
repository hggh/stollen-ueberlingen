<?php
function make_error()
{
	?>
	<br/>
	Bitte Achten Sie auf die oben Aufgeführte Fehlermeldung.<br/>
	Bitte klicken Sie <a href="javascript:history.back()">hier</a>, zum zurück zu kommen.
	<?
}

if (isset($_POST['senden']))
{
	if (!isset($_POST['E-Mail']) || empty($_POST['E-Mail']))
	{
		echo "Bitte eMailadresse eintragen!";
		make_error();
		exit();
	}
	if (empty($_POST['GewuenschtesDatum'])) {
		echo "Bitte Datum angeben!";
		make_error();
		exit();
	}
	$footer="------------\nAnmeldungsmanager fuer Stollen-Ueberlingen.de";
	$text=sprintf("Gruppenname: %s\nGruppenleiter: %s\nE-Mail: %s\nTelefon: %s\nTeilnehmer: %s\nGewuenschtes Datum: %s\nUhrzeit: %s\nAlternatives Datum: %s\nAnmkerungen: %s\n%s",
	$_POST['Gruppenname'],
	$_POST['Gruppenleiter'],
	$_POST['E-Mail'],
	$_POST['Tele'],
	$_POST['Teilnehmer'],
	$_POST['GewuenschtesDatum'],
	$_POST['uhrzeit'],
	$_POST['AlternativDatum'],
	$_POST['anmerkungen'],
	$footer);
	$sender=$_POST['Gruppenleiter']. "<".$_POST['E-Mail'] .">";
	

	mail("we-bux@t-online.de", "Stollen-ueberlingen.de: Anmeldung zur Fuehrung", $text,
	"From: $sender\r\n" .  "Reply-To: $sender\r\n" .  "X-Mailer: PHP/sto-ueb");

	echo "Vielen Dank - wir haben Ihre Anfrage erhalten.";

	
}

?>
