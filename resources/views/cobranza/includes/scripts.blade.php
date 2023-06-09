<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/ajaxformsubmit.js') }}"></script>
<!-- cookie js -->
<script src="{{ asset('assets/js/jquery.cookie.js') }}"></script>

<!-- Customized jquery file  -->
<script src="{{ asset('assets/js/main.js') }}"></script>
{{-- <script src="{{ asset('assets/js/color-scheme.js') }}"></script> --}}

@include('cobranza.includes.extra.script-background-svg')
<!-- PWA app service registration and works -->
<script src="{{ asset('assets/js/pwa-services.js') }}"></script>
@livewireScripts
<!-- Chart js script -->
<script src="{{ asset('assets/vendor/chart-js-3.3.1/chart.min.js') }}"></script>

<!-- Progress circle js script -->
<script src="{{ asset('assets/vendor/progressbar-js/progressbar.min.js') }}"></script>

<!-- swiper js script -->
{{-- <script src="{{ asset('assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- page level custom script -->
<script src="{{ asset('assets/js/app.js') }}"></script>

{{-- <script src="{{asset('js/sweetalert.min.js')}}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    Livewire.on('toastDispatch', data => {
        console.log('toast')
        Toast.fire({
            icon: data.icon,
            title: data.title,
            text: data.body,
        });
    });
    $(document).on("load", function() {
        console.log('asd')
    });
</script>
