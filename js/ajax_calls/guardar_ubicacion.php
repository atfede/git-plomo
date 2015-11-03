<?php

//$link = mysqli_connect("mysql122int.srv-hostalia.com", "u2894782_ta", "Lsnsdmsdp_222", "db2894782_trabajoautonomo") or die("could not connect to mysql");
$link = mysqli_connect("localhost", "1018246", "qwerpoiu1", "1018246") or die("could not connect to mysql");
mysqli_set_charset($link, "utf8");

$latitud = $_POST['lat'];
$longitud = $_POST['long'];

$query = "UPDATE usuarios SET latitud = '" . $latitud . "', longitud ='" . $longitud . "' WHERE id = 2";
$rows = mysqli_query($link, $query) or die(mysqli_error($link));
$results = mysqli_fetch_array($rows);



