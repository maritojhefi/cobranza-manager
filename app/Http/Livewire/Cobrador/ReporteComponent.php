<?php

namespace App\Http\Livewire\Cobrador;

use App\Models\CajaSemanal;
use Livewire\Component;

class ReporteComponent extends Component
{
    public $cajaSemanal,$abonos,$prestamos,$gastos,$datos;
    public function mount(CajaSemanal $cajaSemanal)
    {
        $this->cajaSemanal = $cajaSemanal;
        $this->abonos=$this->cajaSemanal->abonos;
        $this->prestamos=$this->cajaSemanal->prestamos;
        $this->gastos=$this->cajaSemanal->gastos;
        $datos=array();
        if($this->abonos->count()>0)
        {
            $datos=$this->abonos->groupBy('fecha');
        }
        if($this->prestamos->count()>0)
        {
            $pres=$this->prestamos->groupBy('fecha');
            foreach ($pres as $fecha=>$valor) {
                $this->datos[$fecha]=$valor;
            }
            
        }
        if($this->gastos->count()>0){
            $gas=$this->gastos->groupBy('fecha');
            foreach ($gas as $fecha=>$valor) {
                $this->datos[$fecha]=$valor;
            }
        }
    }
    public function render()
    {
        
        return view('livewire.cobrador.reporte-component')
            ->extends('cobranza.master')
            ->section('content');
    }
}
