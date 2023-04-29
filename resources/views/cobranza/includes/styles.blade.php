<link rel="manifest" href="{{asset('manifest.json')}}" />

<!-- Favicons -->
<link rel="apple-touch-icon" href="{{asset('assets/img/favicon180.png')}}" sizes="180x180">
{{-- <link rel="icon" href="{{asset('assets/img/favicon32.png')}}" sizes="32x32" type="image/png">
<link rel="icon" href="{{asset('assets/img/favicon16.png')}}" sizes="16x16" type="image/png"> --}}
<link rel="shortcut icon" href="{{ asset('assets/logos/tic-tac-toe-24.png') }}">
<!-- Google fonts-->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

<!-- bootstrap icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- swiper carousel css -->
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css')}}"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<!-- style css for this template -->
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" id="style">
<script>
    var baseUrl = '/'
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<!-- Or for RTL support -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
<style>
    body{
        -moz-user-select: none; 
        -webkit-user-select: none; 
        -ms-user-select:none; 
        user-select:none;
        -o-user-select:none
    }
 unselectable=on
 onselectstart=return false;
 onmousedown="return false;
</style>
@livewireStyles