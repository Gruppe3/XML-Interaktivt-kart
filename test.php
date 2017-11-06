<?php
/*
$xml = simplexml_load_file("innbyggertall.xml");
$xml2 = simplexml_load_file("kursliste.xml");

$kode = $xml2->xpath('//kode');
foreach($kode as $k){
    $xml->addChild("kode", $k);
}

$midtkurs = $xml2->xpath('//midtkurs');
foreach($midtkurs as $m){
    $xml->addChild("midtkurs", $m);
}

$xml->asXML('doc.xml');

$XML1 = new DOMDocument();
$XML1->load( 'doc.xml' );

$xslt = new XSLTProcessor();

$XSL = new DOMDocument();
$XSL->load( 'index.xsl' );
$xslt->importStylesheet($XSL);

print $xslt->transformToXML($XML1);
*/

$xmlFiles = [
    'innbyggertall.xml',
    'https://www.dnb.no/portalfront/datafiles/miscellaneous/csv/kursliste_ws.xml',
    'praktiskinfo.xml'
  ];
  
  $targetDom = new DOMDocument();
  $xslt = new XSLTProcessor();
  
  $XSL = new DOMDocument();
  $XSL->load( 'index.xsl' );
  $xslt->importStylesheet($XSL);

  $rootNode = $targetDom->appendChild(
    $targetDom->createElement('root')
  );
  
  foreach ($xmlFiles as $xmlFile) {
    $importDom = new DOMDocument();
    $importDom->load($xmlFile);
    foreach ($importDom->documentElement->childNodes as $node) {
      $rootNode->appendChild($targetDom->importNode($node, TRUE));
    }
  }
  
  $targetDom->save("merged.xml");
  print $xslt->transformToXML($targetDom);
  
?> 
