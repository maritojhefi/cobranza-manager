@extends('cobranza.master')

@section('auth')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <main class="container-fluid h-100" style="min-height: 664px;">
        <div class="row h-100 overflow-auto">
            <div class="col-12 text-center mb-auto px-0">
                <header class="header">
                    <div class="row">
                        <div class="col-auto"></div>
                        <div class="col">
                            <div class="logo-small">
                                <img src="assets/img/logo.png" alt="">
                                <h5>FiMobile</h5>
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
                        <input id="email" type="email" class="email form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label class="form-control-label" for="email">Correo Electronico</label>
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
                        <label class="form-control-label" for="password">Contraseña</label>
                        <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="" id="passworderror"
                            data-bs-original-title="Enter valid Password">
                            <i class="bi bi-info-circle"></i>
                        </button>
                    </div>
                    <button type="submit" class="submit btn btn-primary">
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
        $('.submit').click(function(c) {
            c.preventDefault();
            $(this).addClass('disabled');
            $(this).html(
                `<span class="spinner-border spinner-border-sm mt-1" role="status" aria-hidden="true"></span>`
            );
        });


        // $.ajax({
        //     method: "get",
        //     url: url + "?user=" + idUser,
        //     beforeSend: function() {
        //         $('#package-info').html(
        //             `<div class="spinner-border d-block mx-auto" style="width: 5rem; height: 5rem;" role="status"></div>`
        //         );
        //         $('#backk').hide();
        //         $("#logocontainer").hide();
        //         $(".card-pack").removeClass('d-none');
        //     },
        //     success: function(a) {
        //         $("#admin-permission").modal('show')
        //         $(".admin-id").html(a[0]);
        //         myVariable = a[4];
        //         // Definir el array de valores por defecto
        //         valoresPorDefecto = JSON.parse(myVariable);
        //         // Inicializar el Select2 múltiple y establecer los valores por defecto
        //         select2.val(valoresPorDefecto).trigger("change");
        //     }
        // })
    </script>
@endpush
