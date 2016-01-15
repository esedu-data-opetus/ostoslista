<?php
if (!empty($_GET["tuote"]))
  $tuote = $_GET["tuote"];
else {
  header("Location: index.php");
  die("Die!");
}

$lista = simplexml_load_file('lista.xml');

$uusiTuote = $lista->tuotteet->addChild('tuote', $tuote);
$uusiTuote->addAttribute('otettu','ei');

// Tallennus siistimmin
$dom = new DOMDocument("1.0");
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($lista->asXML());
$dom->save("lista.xml");

header("Location: index.php");
