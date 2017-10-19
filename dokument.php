<?php
$xmldoc = '<standard></standard>';

$domdoc=new DOMDocument();
$domdoc->loadXML($xmldoc);
$kapittel = $domdoc->createElement("kapittel");
$kap = new DOMDocument();

$kap->load("kapittel-0.xml");
$kap2 = $domdoc->importNode($kap->firstChild,true);
$domdoc->firstChild->appendChild($kap2);

$kap->load("kapittel-1.xml");
$kap2 = $domdoc->importNode($kap->firstChild,true);
$domdoc->firstChild->appendChild($kap2);

$kap->load("kapittel-4.xml");
$kap2 = $domdoc->importNode($kap->firstChild,true);
$domdoc->firstChild->appendChild($kap2);

$kap->load("kapittel-7.xml");
$kap2 = $domdoc->importNode($kap->firstChild,true);
$domdoc->firstChild->appendChild($kap2);

echo "Har skrevet ".$domdoc->save("dokument.xml");
echo " byte til fil dokument.xml<br />";
$xsldoc = new DOMDocument();
$xsldoc->load("innhold.xsl");
$xslt = new XSLTProcessor();
$xslt->importStyleSheet($xsldoc);
$xslresultat = $xslt->transformToDoc($domdoc);

echo "Har skrevet ".$xslresultat->save("innhold.xml");
echo " byte innhold til fil innhold.xml<br />";

// Jeg skal nå sette inn inholdsfortegnelse foran første kapittel
$next_path = "//standard/kapittel";
$xpath = new DOMXPath($domdoc);

$next = $xpath->query($next_path);

$kap3 = $domdoc->importNode($xslresultat->firstChild,true);
$domdoc->firstChild->insertBefore($kap3,$next->item(0));
echo "Har skrevet ".$domdoc->save("dokument_3.xml");
echo " byte til fil dokument_3.xml<br />";
?>