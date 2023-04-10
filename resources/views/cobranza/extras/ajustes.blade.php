@extends('cobranza.master')
@section('content')
    <p class="text-muted text-center mb-4">Personaliza tu espacio!</p>
    <!-- layout modes selection -->
    <div class="row mb-3">
        <div class="col-12">
            <h6>Modo</h6>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-6 d-grid">
            <input type="radio" class="btn-check" name="layout-mode" checked="" id="btn-layout-modes-light">
            <label class="btn btn-warning shadow-sm text-white" for="btn-layout-modes-light">
                <i class="bi bi-sun fs-4 mb-2 d-block"></i>
                Modo Claro</label>
        </div>
        <div class="col-6 d-grid">
            <input type="radio" class="btn-check" name="layout-mode" id="btn-layout-modes-dark">
            <label class="btn btn-dark shadow-sm" for="btn-layout-modes-dark">
                <i class="bi bi-moon-stars fs-4 mb-2 d-block"></i>
                Modo Oscuro</label>
        </div>
    </div>

    <!-- color scheme selection -->
    <div class="row mb-3">
        <div class="col-12">
            <h6>Paleta de Colores</h6>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">

            <input type="radio" class="btn-check mb-2" name="color-scheme" id="btn-color-blue" data-title="">
            <label class="btn bg-blue shadow-sm avatar avatar-44 p-0 mb-3 me-2 text-white" for="btn-color-blue">BL</label>

            <input type="radio" class="btn-check mb-2" name="color-scheme" id="btn-color-indigo"
                data-title="theme-indigo">
            <label class="btn bg-indigo shadow-sm avatar avatar-44 p-0 mb-3 me-2 text-white"
                for="btn-color-indigo">IN</label>

            <input type="radio" class="btn-check mb-2" name="color-scheme" id="btn-color-purple"
                data-title="theme-purple">
            <label class="btn bg-purple shadow-sm avatar avatar-44 p-0 mb-3 me-2 text-white"
                for="btn-color-purple">PL</label>

            <input type="radio" class="btn-check mb-2" name="color-scheme" checked="" id="btn-color-pink"
                data-title="theme-pink">
            <label class="btn bg-pink shadow-sm avatar avatar-44 p-0 mb-3 me-2 text-white" for="btn-color-pink">PK</label>

            <input type="radio" class="btn-check mb-2" name="color-scheme" id="btn-color-red" data-title="theme-red">
            <label class="btn bg-red shadow-sm avatar avatar-44 p-0 mb-3 me-2 text-white" for="btn-color-red">RD</label>

            <input type="radio" class="btn-check mb-2" name="color-scheme" id="btn-color-orange"
                data-title="theme-orange">
            <label class="btn bg-orange shadow-sm avatar avatar-44 p-0 mb-3 me-2 text-white"
                for="btn-color-orange">OG</label>

            <input type="radio" class="btn-check mb-2" name="color-scheme" id="btn-color-yellow"
                data-title="theme-yellow">
            <label class="btn bg-yellow shadow-sm avatar avatar-44 p-0 mb-3 me-2 text-white"
                for="btn-color-yellow">YL</label>

            <input type="radio" class="btn-check mb-2" name="color-scheme" id="btn-color-green" data-title="theme-green">
            <label class="btn bg-green shadow-sm avatar avatar-44 p-0 mb-3 me-2 text-white" for="btn-color-green">GN</label>

            <input type="radio" class="btn-check mb-2" name="color-scheme" id="btn-color-teal" data-title="theme-teal">
            <label class="btn bg-teal shadow-sm avatar avatar-44 p-0 mb-3 me-2 text-white" for="btn-color-teal">TL</label>

            <input type="radio" class="btn-check mb-2" name="color-scheme" id="btn-color-cyan" data-title="theme-cyan">
            <label class="btn bg-cyan shadow-sm avatar avatar-44 p-0 mb-3 me-2 text-white" for="btn-color-cyan">CN</label>
        </div>
    </div>

    <!-- menu style selection -->
    <div class="row mb-3">
        <div class="col-12">
            <h6 class="mb-2">Menu Lateral</h6>
            <p class="text-muted size-12">Selecciona tu estilo favorito para el menu lateral.</p>
        </div>
    </div>

    <div class="row ">
        <div class="col mb-4">
            <input type="radio" class="btn-check" name="menu-select" id="btn-menu1" data-title="overlay">
            <label class="btn btn-outline-primary background-btn p-1 text-center border-0" for="btn-menu1">
                <img src="{{asset('assets/img/setting-menu-1@2x.png')}}" alt="" class="mw-100 rounded-10"><br><span
                    class="py-2 d-block small">Popover</span>
            </label>
        </div>
        <div class="col mb-4 ps-0">
            <input type="radio" class="btn-check" name="menu-select" checked="" id="btn-menu2"
                data-title="pushcontent">
            <label class="btn btn-outline-primary background-btn p-1 text-center border-0" for="btn-menu2">
                <img src="{{asset('assets/img/setting-menu-2@2x.png')}}" alt="" class="mw-100 rounded-10"><br><span
                    class="py-2 d-block small">Push Page</span>
            </label>
        </div>
        <div class="col mb-4 ps-0">
            <input type="radio" class="btn-check" name="menu-select" id="btn-menu3" data-title="fullmenu">
            <label class="btn btn-outline-primary background-btn p-1 text-center border-0" for="btn-menu3">
                <img src="{{asset('assets/img/setting-menu-3@2x.png')}}" alt="" class="mw-100 rounded-10"><br><span
                    class="py-2 d-block small">Fullscreen</span>
            </label>
        </div>
    </div>

    <!-- background selection -->
    <div class="row mb-3">
        <div class="col-12">
            <h6 class="mb-3">Background Image</h6>
            <p class="text-muted size-12">Background images are visible on <code>dark-bg</code> class used
                in <a href="splash.html">splash screen</a> and the
                <span class="text-color-theme" onclick="event.stopPropagation(); $('body').addClass('menu-open')">Menu
                    sidebar</span>.
            </p>
        </div>
    </div>

    <div class="row ">
        <div class="col mb-4">
            <input type="radio" class="btn-check" name="background-select" checked="" id="btn-bg1"
                data-src="backgorund-image.svg">
            <label class="btn btn-outline-primary background-btn p-1 text-center border-0" for="btn-bg1">
                <img src="{{asset('assets/img/darkbg-1.png')}}" alt="" class="mw-100 rounded-10"><br><span
                    class="py-2 d-block small">Shapes</span>
            </label>
        </div>
        <div class="col mb-4">
            <input type="radio" class="btn-check" name="background-select" id="btn-bg2"
                data-src="backgorund-image2.svg">
            <label class="btn btn-outline-primary background-btn p-1 text-center border-0" for="btn-bg2">
                <img src="{{asset('assets/img/darkbg-2.png')}}" alt="" class="mw-100 rounded-10"><br><span
                    class="py-2 d-block small">Character</span>
            </label>
        </div>
        <div class="col mb-4">
            <input type="radio" class="btn-check" name="background-select" id="btn-bg3"
                data-src="backgorund-image3.svg">
            <label class="btn btn-outline-primary background-btn p-1 text-center border-0" for="btn-bg3">
                <img src="{{asset('assets/img/darkbg-3.png')}}" alt="" class="mw-100  rounded-10"><br><span
                    class="py-2 d-block small">Bubble</span>
            </label>
        </div>
    </div>
@endsection
