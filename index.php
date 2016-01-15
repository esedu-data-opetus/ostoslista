<!DOCTYPE html>
<html>
<head>
  <style>
  .otettu, .otettu a { color: #999; }
  li a { color: #000; text-decoration: none; }
  </style>
</head>
<body>
<?php
$lista = simplexml_load_file('lista.xml');
echo "<h1>$lista->nimi</h1>";

$n = 0;
echo '<ul>';
foreach ($lista->tuotteet->children() as $asia) {

  // tarkistetaan onko tuotteella otettu="on" -atribuutti
  if ($asia["otettu"] == 'on') {
    $luokka = ' class="otettu" ';
  } else {
     $luokka = '';
  }

  echo "<li $luokka>
          <a href=\"otajata.php?n=".$n."\">$asia</a>
          <a href=\"poistaTuote.php?n=".$n++."\">poista</a>
        </li>";
}
echo '</ul>';
?>
<form method="get" action="lisaaTuote.php">
  <input type="text" name="tuote" placeholder="lisää tuote" />
  <input type="submit" value="Lisää" />
</form>


</body>
</html>
