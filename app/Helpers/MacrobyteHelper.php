<?php

use Illuminate\Support\Facades\Auth;



function randomText()
{
  $items = [
    'Cargando recursos',
    'Seguridad e innovacion',
    'Pioneros en tecnologia',
    'Calidad y confianza'
  ];
  return $items[array_rand($items)] . '...';
}
function logoMacrobyte()
{
  return asset('assets/logos/logo.png');
}
function infoUser($variable)
{
  if (Auth::check()) {
    return Auth::user()->$variable;
  } else {
    return null;
  }
}
function imageUser($allPath = true)
{
  if ($allPath) {
    return asset('assets/logos/logo.png');
  } else {
    return 'assets/logos/logo.png';
  }
}
function addDays($days, $addSabado = false, $format = "Y-m-d")
{
  $array = [];
  if ($addSabado) {
    $limite = 6;
  } else {
    $limite = 5;
  }
  for ($i = 0; $i < $days; $i++) {
    $day = date('N', strtotime("+" . ($i + 1) . "day"));
    if ($day > $limite)
      $days++;
  }
  return date($format, strtotime("+$i day"));
}
