<?php

namespace App\Observers;

use App\Models\Abono;

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
        
        $abono->caja_id=getCurrentCajaId($abono->prestamo->cobrador_id);
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
     * Handle the Abono "deleted" event.
     *
     * @param  \App\Models\Abono  $abono
     * @return void
     */
    public function deleted(Abono $abono)
    {
        //
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
