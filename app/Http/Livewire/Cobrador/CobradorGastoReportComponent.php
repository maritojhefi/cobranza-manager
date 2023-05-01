<?php

namespace App\Http\Livewire\Cobrador;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Gasto;
use Livewire\Component;

use function PHPSTORM_META\map;

class CobradorGastoReportComponent extends Component
{
    public function render()
    {
        $fecha = Carbon::now();
        $user = User::find(auth()->user()->id);
        $registroSemana = getWeekRecordsGasto($fecha, $user->id);
        return view('livewire.cobrador.cobrador-gasto-report-component');
    }
}
