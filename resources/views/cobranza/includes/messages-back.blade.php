@if (Session::has('success'))
    @push('footer')
        <script>
            $(document).ready(function() {
                Toast.fire({
                    icon: 'success',
                    title: '{{Session::get("success")}}',
                })
            });
        </script>
    @endpush
@endif
@if (Session::has('warning'))
    @push('footer')
        <script>
            $(document).ready(function() {
                Toast.fire({
                    icon: 'warning',
                    title: '{{Session::get("warning")}}',
                })
            });
        </script>
    @endpush
@endif
@if (Session::has('info'))
    @push('footer')
        <script>
            $(document).ready(function() {
                Toast.fire({
                    icon: 'info',
                    title: '{{Session::get("info")}}',
                })
            });
        </script>
    @endpush
@endif
@if (Session::has('error'))
    @push('footer')
        <script>
            $(document).ready(function() {
                Toast.fire({
                    icon: 'error',
                    title: '{{Session::get("error")}}',
                })
            });
        </script>
    @endpush
@endif
