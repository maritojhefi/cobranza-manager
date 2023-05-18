<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Abono;
use App\Models\CajaSemanal;
use App\Models\Prestamo;

class AbonoObserver
{
    /**
     * Handle the Abono "created" event.
     *
     * @param  \App\Models\Abono  $abono
     * @return void
     */
    public function creating(Abono $abono)
    {

        $abono->caja_id = getCurrentCaja($abono->prestamo->cobrador_id)->id;
    }
    public function created(Abono $abono)
    {
        User::find($abono->prestamo->cobrador_id)->increment('billetera', $abono->monto_abono);
        CajaSemanal::find(getCurrentCaja($abono->prestamo->cobrador_id)->id)->increment('monto_final', $abono->monto_abono);

    }
    /**
     * Handle the Abono "updated" event.
     *
     * @param  \App\Models\Abono  $abono
     * @return void
     */
    public function updated(Abono $abono)
    {
        //
    }

    /**
     * Handle the Abono "deleted" event.s
     *
     * @param  \App\Models\Abono  $abono
     * @return void
     */
    public function deleted(Abono $abono)
    {
        //ajuste de total para la caja semanal del abono que se borrará
        $caja = CajaSemanal::find($abono->caja_id);
        $caja->monto_final = $caja->monto_final - $abono->monto_abono;
        $caja->save();

        //ajuste de total para la billetera del cobrador
        $user = User::find($caja->cobrador_id);
        $user->billetera = $user->billetera - $abono->monto_abono;
        $user->save();
    }

    /**
     * Handle the Abono "restored" event.
     *
     * @param  \App\Models\Abono  $abono
     * @return void
     */
    public function restored(Abono $abono)
    {
        //
    }

    /**
     * Handle the Abono "force deleted" event.
     *
     * @param  \App\Models\Abono  $abono
     * @return void
     */
    public function forceDeleted(Abono $abono)
    {
        //
    }
}