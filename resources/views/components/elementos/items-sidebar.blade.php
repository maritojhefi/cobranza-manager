<li class="nav-item  @if (count($lista)>0)dropdown @endif">
    <a class="nav-link @if (count($lista)>0)dropdown-toggle @endif {{ request()->segment(2)==$segmentoLink ? 'active show' : '' }}"  @if (count($lista)>0)data-bs-toggle="dropdown" @endif href="{{route($ruta)}}" role="button"
        aria-expanded="false">
        <div class="avatar avatar-40 rounded icon">{{$slot}}</div>
        <div class="col">{{$titulo}}</div>
        @if (count($lista)>0)
        <div class="arrow"><i class="bi bi-plus plus"></i> <i class="bi bi-dash minus"></i>
        </div>
        @endif
        
    </a>
    @if (count($lista)>0)
    <ul class="dropdown-menu {{ request()->segment(2)==$segmentoLink ? 'show' : '' }}">
        @foreach ($lista as $nombre=>$link)
        <li><a class="dropdown-item nav-link" href="{{route($link[0])}}">
            <div class="avatar avatar-40 rounded icon"><i class="{{$link[1]}}"></i></div>
            <div class="col">{{$nombre}}</div>
            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
        </a></li>
        @endforeach
    </ul>
    @endif
    
</li>