<div>
    @if ($role_id->id == 3)
        @include('cobranza.includes.views.cobrador-list')
    @elseif($role_id->id == 4)
        @include('cobranza.includes.views.cliente-list')
    @endif
</div>
