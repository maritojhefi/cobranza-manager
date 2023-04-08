@extends('cobranza.master')
@section('content')
    <button class="asd">click</button>
@endsection
@push('footer')
    <script>
        var contador=0;
        $('.asd').click(function (e) { 
            contador++;
            console.log(contador)
            if(contador >= 5)
            {
                window.location.href = 'https://google.com/';
            }
            
        });
        $(".asd").click($.debounce(1000, function(e) {
            if(contador<5)
            {
                contador=0;
            }
            
        }));
    </script>
@endpush
