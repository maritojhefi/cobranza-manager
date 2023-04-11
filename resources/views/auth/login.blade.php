@extends('cobranza.master')

@section('auth')
    <main class="container-fluid h-100" style="min-height: 664px;">
        <div class="row h-100 overflow-auto">
            <div class="col-12 text-center mb-auto px-0">
                <header class="header">
                    <div class="row">
                        <div class="col-auto"></div>
                        <div class="col">
                            <div class="logo-small">
                                <img src="{{ logoMacrobyte() }}" alt="">
                                <h5>{{ env('APP_NAME') }}</h5>
                            </div>
                        </div>
                        <div class="col-auto"></div>
                    </div>
                </header>
            </div>
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">
                <h1 class="mb-4 text-color-theme">Inicio de Sesión</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group form-floating mb-3 is-valid">
                        <input id="id" type="number" class="id form-control @error('id') is-invalid @enderror"
                            name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>
                        @error('id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label class="form-control-label" for="email">Ingrese su ID</label>
                    </div>

                    <div class="form-group form-floating is-invalid mb-3">
                        <input id="password" type="password"
                            class="password form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label class="form-control-label" for="password">Ingrese su clave</label>
                        <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="" id="passworderror"
                            data-bs-original-title="Enter valid Password">
                            <i class="bi bi-info-circle"></i>
                        </button>
                    </div>
                    <button type="submit" class="submit btn btn-primary" style="height: 38px; width: 100%; box-sizing: border-box;">
                        {{ __('Iniciar Sesion') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link mt-4" href="{{ route('password.request') }}">
                            <small>{{ __('Olvidaste tu contraseña?') }}
                            </small>
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </main>
@endsection
@push('footer')
    <script>
        $( ".submit" ).click(function() {
            $(this).addClass('disabled');
            $(this).html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
            );
        });
    </script>
@endpush
