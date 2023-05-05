<?php

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Abono;
use App\Models\Gasto;
use App\Models\Estado;
use App\Models\Prestamo;
use App\Models\CajaSemanal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



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
function addDays($days, $addSabado = true, $format = "Y-m-d")
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

function retrasosPrestamoUser($usuario, $idPrestamo = null)
{
  if ($idPrestamo) {
    $prestamo = Prestamo::where([['user_id', $usuario], ['estado_id', 2], ['id', $idPrestamo]])->first();
  } else {
    $prestamo = Prestamo::where([['user_id', $usuario], ['estado_id', 2]])->first();
  }

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
function timeago($date)
{
  $timestamp = strtotime($date);
  $strTime = ['segundo', 'minuto', 'hora', 'dia', 'mes', 'año'];
  $length = ['60', '60', '24', '30', '12', '10'];
  $currentTime = time();
  if ($currentTime >= $timestamp) {
    $diff = time() - $timestamp;
    for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
      $diff = $diff / $length[$i];
    }
    $diff = round($diff);
    return 'Hace' . ' ' . $diff . ' ' . $strTime[$i] . '(s)';
  }
}
function fechaFormateada(int $level, $fecha = null)
{
  switch ($level) {
    case 1:
      $formato = 'dddd D';
      break;
    case 2:
      $formato = 'dddd D \d\e MMMM ';
      break;
    case 3:
      $formato = 'dddd D \d\e MMMM \d\e\l Y';
      break;
    case 4:
      $formato = 'D \d\e MMMM';
      break;
    case 5:
      $formato = 'D \d\e MMMM \d\e\l Y';
      break;
    default:
      $formato = 'dddd D \d\e MMMM \d\e\l Y';
      break;
  }
  if ($fecha != null) {
    return ucfirst(Carbon::parse($fecha)->locale('es')->isoFormat($formato));
  } else {
    return ucfirst(Carbon::now()->locale('es')->isoFormat($formato));
  }
}
function getDiasHabiles($fechainicio, $fechafin, $diasferiados = array())
{
  // Convirtiendo en timestamp las fechas
  $fechainicio = strtotime($fechainicio);
  $fechafin = strtotime($fechafin);

  // Incremento en 1 dia
  $diainc = 24 * 60 * 60;

  // Arreglo de dias habiles, inicianlizacion
  $diashabiles = array();

  // Se recorre desde la fecha de inicio a la fecha fin, incrementando en 1 dia
  for ($midia = $fechainicio; $midia <= $fechafin; $midia += $diainc) {
    // Si el dia indicado, no es sabado o domingo es habil
    if (!in_array(date('N', $midia), array(7))) { // DOC: http://www.php.net/manual/es/function.date.php
      // Si no es un dia feriado entonces es habil
      if (!in_array(date('Y-m-d', $midia), $diasferiados)) {
        array_push($diashabiles, date('Y-m-d', $midia));
      }
    }
  }

  return $diashabiles;
}
function validar(array $array)
{
  $arrayItems = [];
  $arrayValidacion = [];
  $mensajesPersonalizados = [];
  foreach ($array as $key => $val) {
    $arrayItems[$key] = $val[0];
    $arrayValidacion[$key] = $val[1];
    if (isset($val[2])) {
      foreach ($val[2] as $llave => $regla) {
        $mensajesPersonalizados[$llave] = $regla;
      }
    }
  }
  $validator = Validator::make($arrayItems, $arrayValidacion, $mensajesPersonalizados);
  if ($validator->fails()) {
    // dd($validator);
    foreach ($validator->errors()->messages() as $key => $mensaje) {
      return $mensaje;
    }
  } else {
    return null;
  }
}

function getCurrentCaja(int $cobradorId)
{
  $fechas = startEndWeek(Carbon::now());
  $caja = CajaSemanal::whereBetween('created_at', [$fechas[0], $fechas[1]])->where('cobrador_id', $cobradorId)->first();
  if (!$caja) {
    $user = User::find($cobradorId);
    if ($user) {
      $caja = CajaSemanal::create([
        'fecha_inicial' => $fechas[0],
        'monto_inicial' => $user->billetera,
        'fecha_final' => $fechas[1],
        'estado_id' => Estado::ID_ACTIVO,
        'cobrador_id' => $cobradorId
      ]);
    } else {
      return null;
    }
  }
  return $caja;
}

function getGastosCajas($usuario, $caja = null)
{
  $user = User::find($usuario);
  if ($caja == null) {
    $cajas = CajaSemanal::where('cobrador_id', $user->id)->get();
    $collection = collect();
    foreach ($cajas as $item) {
      $gastos = Gasto::whereBetween('created_at', [$item->fecha_inicial, $item->fecha_final])->where([['caja_id', $item->id]])->get();
      $collection->push($gastos);
    }
    return $collection;
  } else {
    $cajas = CajaSemanal::where([['id', $caja], ['cobrador_id', $user->id]])->get();
    $gastos = Gasto::whereBetween('created_at', [$cajas[0]->fecha_inicial, $cajas[0]->fecha_final])->where([['caja_id', $cajas[0]->id]])->get();
    return $gastos;
  }
}

function startEndWeek($date)
{
  $fecha = Carbon::parse($date);
  $inicioSemana = $fecha->startOfWeek(Carbon::MONDAY)->format('Y-m-d H:i:s');
  $finSemana = $fecha->endOfWeek(Carbon::SUNDAY)->format('Y-m-d H:i:s');
  return [
    $inicioSemana,
    $finSemana,
  ];
}
function getWeekRecordsGasto($fecha, $usuario)
{
  $fechas = startEndWeek($fecha);
  $gastos = Gasto::whereBetween('created_at', [$fechas[0], $fechas[1]])->where('user_id', $usuario)->get();
  return $gastos;
}
function getAbonosToday($idCobrador = null)
{
  if ($idCobrador) {
    $abonos = Abono::where('fecha', Carbon::today())->where('caja_id', getCurrentCaja($idCobrador)->id)->sum('monto_abono');
  } else {
    $abonos = Abono::where('fecha', Carbon::today())->sum('monto_abono');
  }

  return floatval($abonos);
}

function getCobroTotalToday()
{
  $sumaAbonosToday = Prestamo::where('estado_id', 2)->where('caja_id', getCurrentCaja(auth()->id())->id)->sum('cuota');
  return floatval($sumaAbonosToday);
}

function getCobrosRestantesToday()
{

  return getCobroTotalToday() - getAbonosToday(auth()->id());
}
function getPorcentajeCobroToday()
{
  $total = getCobroTotalToday();
  if ($total > 0) {
    $abonado = getAbonosToday(auth()->id());
    return floatval((float)$abonado * 100 / (float)$total);
  } else {
    return 0;
  }
}
function getAbonosUser(int $prestamoId, $fecha)
{

  $abonos = Abono::where('fecha', $fecha)->where('prestamo_id', $prestamoId)->sum('monto_abono');
  return floatval($abonos);
}
function getAbonosCobradorSemana(int $idCobrador, $cantidad = false)
{
  if ($cantidad) {
    $abonos = Abono::where('caja_id', getCurrentCaja($idCobrador)->id)->count();
  } else {
    $abonos = Abono::where('caja_id', getCurrentCaja($idCobrador)->id)->sum('monto_abono');
  }

  return floatval($abonos);
}
function getAllAbonosUser(int $userId, $fecha)
{
  $total = 0;
  $prestamos = Prestamo::where('user_id', $userId)->get();
  foreach ($prestamos as $prestamo) {
    foreach ($prestamo->abonos->where('fecha', $fecha) as $abono) {
      $total = $total + $abono->monto_abono;
    }
  }
  return floatval($total);
}
function totalPrestadoToday()
{
  $prestado = Prestamo::where('created_at', Carbon::now())->sum('monto_inicial');
  return $prestado;
}
