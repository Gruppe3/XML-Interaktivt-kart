<?php

$xml = simplexml_load_file("innbyggertall.xml");
$xml2 = simplexml_load_file("kursliste.xml");

$kode = $xml2->xpath('//kode');
foreach($kode as $k){
    $xml->addChild("kode", $k);
}

$xml->asXML('doc.xml');

$XML1 = new DOMDocument();
$XML1->load( 'doc.xml' );

$xslt = new XSLTProcessor();

$XSL = new DOMDocument();
$XSL->load( 'index.xsl' );
$xslt->importStylesheet($XSL);

print $xslt->transformToXML($XML1);


/*
$xmlFiles = [
    'test.xml',
    'test2.xml'
  ];
  
  $targetDom = new DOMDocument();
  $targetDom->appendChild(
    $targetDom->createProcessingInstruction(
      'xml-stylesheet', 'type="text/xml" href="index.xsl"' 
    )
  );
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
  
  echo $targetDom->save("merged.xml");
  */
?> 