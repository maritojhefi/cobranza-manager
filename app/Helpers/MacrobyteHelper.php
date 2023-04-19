<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Abono;
use App\Models\Prestamo;
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

function retrasosPrestamos()
{
  $retrasos = collect();
  $prestamos = Prestamo::where('estado_id', 2)->get();
  foreach ($prestamos as $item) {
    $diasSemana = $item->dias_por_semana;
    $fechaCreadoCarbon = Carbon::parse($item->created_at)->addDays(1);

    $diferencia = 0;

    // Creamos un array con los días de la semana que queremos tomar en cuenta
    $diasSemanaArray = range(1, 7);
    $diasSemanaArray = array_slice($diasSemanaArray, 0, $diasSemana);

    // Iteramos por cada día entre las dos fechas
    for ($date = $fechaCreadoCarbon; $date->lte(Carbon::now()); $date->addDay()) {
      // Verificamos si el día actual es uno de los días de la semana que queremos tomar en cuenta
      if (in_array($date->dayOfWeekIso, $diasSemanaArray)) {
        $diferencia++;
      }
    }
    $totalAbonos = $item->abonos->count();
    if ($totalAbonos < $diferencia) {
      $totalRetrasos = $diferencia - $totalAbonos;
    } else {
      $totalRetrasos = 0;
    }
    $retrasos->push([$item->user_id => $totalRetrasos]);
  }
  return $retrasos;
}

function retrasosPrestamoUser($usuario)
{
  $prestamo = Prestamo::where([['user_id', $usuario], ['estado_id', 2]])->first();
  if ($prestamo) {
    $diasSemana = $prestamo->dias_por_semana;
    $fechaCreadoCarbon = Carbon::parse($prestamo->created_at)->addDays(1);
    $diferencia = 0;
    // Creamos un array con los días de la semana que queremos tomar en cuenta
    $diasSemanaArray = range(1, 7);
    $diasSemanaArray = array_slice($diasSemanaArray, 0, $diasSemana);
    // Iteramos por cada día entre las dos fechas
    for ($date = $fechaCreadoCarbon; $date->lte(Carbon::now()); $date->addDay()) {
      // Verificamos si el día actual es uno de los días de la semana que queremos tomar en cuenta
      if (in_array($date->dayOfWeekIso, $diasSemanaArray)) {
        $diferencia++;
      }
    }
    $totalAbonos = $prestamo->abonos->count();
    if ($totalAbonos < $diferencia) {
      $totalRetrasos = $diferencia - $totalAbonos;
    } else {
      $totalRetrasos = 0;
    }
    return $totalRetrasos;
  } else {
    return null;
  }
}
