<?php
$key = 'login';

if (isset($_COOKIE[$key])) 
  exit;

$animals = json_decode(file_get_contents('./animals.json') , true);
$result = false;
$rand_i = rand(0, count($animals) - 1);
$rand_animal = false;
$i = 0;

foreach($animals as $animal => $count){
	if ($i == $rand_i) $rand_animal = $animal;
	$i++;
	if (0 === $count){
		$result = $animal;
		break;
	}
  
}

if (false === $result) 
  $result = $rand_animal;
$result = $result . (0 === $count ? '' : $count);
$animals[$result]++;
file_put_contents('./animal/animals.json', json_encode($animals));
$count = $animals[$result];
setcookie($key, $result, time() + (3600 * 24 * 30) , "/");

