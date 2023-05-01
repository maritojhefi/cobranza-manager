@push('header')
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            width: 60%;
            margin-left: 15px;
            margin-right: 0px !important;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endpush
<div>
    <div class="row mb-3">
        <div class="col-12 px-0">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-auto align-self-center">
                                        <img src="{{asset('')}}assets/img/masterocard.png" alt="">
                                    </div>
                                    <div class="col align-self-center text-end">
                                        <p class="small">
                                            <span class="text-uppercase size-10">Expira</span></span><br>
                                            <span class="text-muted">{{fechaFormateada(2,getCurrentCaja($user->id)->fecha_final)}}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="fw-normal mb-2">
                                            {{getAbonosCobradorSemana(auth()->id())}}
                                            <span class="small text-muted">Bs</span>
                                        </h4>
                                        <p class="mb-0 text-muted size-12">Cobrado</p>
                                        <p class="text-muted size-12">Caja semanal</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card dark-bg">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-auto align-self-center">
                                        <img src="{{asset('')}}assets/img/masterocard.png" alt="">
                                    </div>
                                    <div class="col align-self-center text-end">
                                        <p class="small">
                                            <span class="text-uppercase size-10">Hoy</span><br>
                                            <span class="text-muted">Resumen</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="fw-normal mb-2">
                                            {{getAbonosToday(auth()->id())}}
                                            <span class="small text-muted">Bs</span>
                                        </h4>
                                        <p class="mb-0 text-muted size-12">Cobrado hoy</p>
                                        <p class="text-muted size-12">Restante: {{getCobrosRestantesToday()}} Bs </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card theme-radial-gradient border-0">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-auto align-self-center">
                                        <i class="bi bi-wallet2"></i> Billetera actual:
                                    </div>
                                    <div class="col align-self-center text-end">
                                        <p class="small">
                                            <span class="text-uppercase size-10">{{date('d-m-Y')}}</span><br>
                                            <span class="text-muted">Hoy</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="fw-normal mb-2">
                                            {{auth()->user()->billetera}}
                                            <span class="small text-muted">Bs</span>
                                        </h4>
                                        <p class="mb-0 text-muted size-12">|</p>
                                        <p class="text-muted size-12">|</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    
    
    </div>
</div>

@push('footer')
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: "auto",
            spaceBetween: 30,

        });
    </script>
@endpush
