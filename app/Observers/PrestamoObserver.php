<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Prestamo;
use App\Models\CajaSemanal;

class PrestamoObserver
{
    /**
     * Handle the Prestamo "created" event.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return void
     */
    public function creating(Prestamo $prestamo)
    {
        $prestamo->caja_id = getCurrentCaja($prestamo->cobrador_id, $prestamo->created_at)->id;
        $prestamo->fecha = Carbon::parse($prestamo->created_at)->format('Y-m-d');
    }
    public function created(Prestamo $prestamo)
    {
        User::find($prestamo->cobrador_id)->decrement('billetera', $prestamo->monto_inicial);
        CajaSemanal::find(getCurrentCaja($prestamo->cobrador_id)->id)->decrement('monto_final', $prestamo->monto_inicial);
    }
    /**
     * Handle the Prestamo "updated" event.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return void
     */
    public function updated(Prestamo $prestamo)
    {
        //
    }

    /**
     * Handle the Prestamo "deleted" event.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return void
     */
    public function deleted(Prestamo $prestamo)
    {
        //ajuste de total para la caja semanal del prestamo que se borrará
        $caja = CajaSemanal::find($prestamo->caja_id);
        $caja->monto_final = $caja->monto_final + $prestamo->monto_inicial;
        $caja->save();

        //ajuste de total para la billetera del cobrador
        $user = User::find($prestamo->cobrador_id);
        $user->billetera = $user->billetera + $prestamo->monto_inicial;
        $user->save();
    }

    /**
     * Handle the Prestamo "restored" event.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return void
     */
    public function restored(Prestamo $prestamo)
    {
        //
    }

    /**
     * Handle the Prestamo "force deleted" event.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return void
     */
    public function forceDeleted(Prestamo $prestamo)
    {
        //
    }
}