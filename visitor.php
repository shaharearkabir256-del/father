<?php
	$cog=mysqli_fetch_object($query=$mysqli->query("SELECT * FROM `cog` where `page`='home' and `type`='ecom' and chk=1"));
	require_once('geoplugin/geoplugin.class.php');
	$geoplugin = new geoPlugin();
	$geoplugin->locate();
	require 'browser.php';
	$ua=getBrowser();
	$platform=$ua['platform'];
	$browser=$ua['name'];
	$location=$_SERVER["PHP_SELF"];
	$geopluginchk=mysqli_num_rows($query=$mysqli->query("SELECT * FROM `geoplugin` WHERE `page`='$page' and `ip`='$geoplugin->ip' "));
	if($geopluginchk==0){
	//SELECT `serial`, `ip`, `city`, `region`, `regionCode`, `regionName`, `dmaCode`, `countryName`, `countryCode`, `inEU`, `euVATrate`, `latitude`, `longitude`, `locationAccuracyRadius`, `timezone`, `currencyCode`, `currencySymbol`, `currencyConverter`, `page`, `pageLocation` FROM `geoplugin` WHERE 1
	$query=$mysqli->query("INSERT INTO `geoplugin`(`platform`,`browser`,`stime`,`page`,`pageLocation`,`ip`, `city`, `region`, `regionCode`, `regionName`, `dmaCode`, `countryName`, `countryCode`, `inEU`, `euVATrate`, `latitude`, `longitude`, `locationAccuracyRadius`, `timezone`, `currencyCode`, `currencySymbol`, `currencyConverter`) VALUES ('$platform','$browser','$timef','$page','$location','$geoplugin->ip','$geoplugin->city','$geoplugin->region','$geoplugin->regionCode','$geoplugin->regionName','$geoplugin->dmaCode','$geoplugin->countryName','$geoplugin->countryCode','$geoplugin->inEU','$geoplugin->euVATrate','$geoplugin->latitude','$geoplugin->longitude','$geoplugin->locationAccuracyRadius','$geoplugin->timezone','$geoplugin->currencyCode','$geoplugin->currencySymbol','$geoplugin->currencyConverter')");
	}
?>