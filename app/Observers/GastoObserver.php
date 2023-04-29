<?php

namespace App\Observers;

use App\Models\Gasto;

class GastoObserver
{
    /**
     * Handle the Gasto "created" event.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return void
     */
    public function created(Gasto $gasto)
    {
        //
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