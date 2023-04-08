<?php



function randomText()
{
  $items=[
    'Cargando recursos',
    'Seguridad e innovacion',
    'Pioneros en tecnologia',
    'Calidad y confianza'
  ];
  return $items[array_rand($items)].'...';
}
function logoMacrobyte()
{
  return asset('assets/logos/logo.png');
}
