<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Gasto;
use App\Models\CajaSemanal;

class GastoObserver
{
    /**
     * Handle the Gasto "created" event.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return void
     */
    public function creating(Gasto $gasto)
    {
        $gasto->caja_id=getCurrentCaja($gasto->user_id)->id;
        $gasto->fecha= Carbon::parse($gasto->created_at)->format('Y-m-d');
    }
    public function created(Gasto $gasto)
    {
        User::find($gasto->user_id)->decrement('billetera',$gasto->monto);
        CajaSemanal::find(getCurrentCaja($gasto->user_id)->id)->decrement('monto_final', $gasto->monto);
    }
    /**
     * Handle the Gasto "updated" event.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return void
     */
    public function updated(Gasto $gasto)
    {
        //
    }

    /**
     * Handle the Gasto "deleted" event.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return void
     */
    public function deleted(Gasto $gasto)
    {
        //
    }

    /**
     * Handle the Gasto "restored" event.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return void
     */
    public function restored(Gasto $gasto)
    {
        //
    }

    /**
     * Handle the Gasto "force deleted" event.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return void
     */
    public function forceDeleted(Gasto $gasto)
    {
        //
    }
}
