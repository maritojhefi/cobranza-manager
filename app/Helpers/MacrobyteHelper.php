<?php

use Illuminate\Support\Facades\Auth;



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
function infoUser($variable)
{
  if(Auth::check())
  {
    return Auth::user()->$variable;
  }
  else
  {
    return null;
  }
  
}
function imageUser()
{
  return asset('assets/logos/logo.png');
}
