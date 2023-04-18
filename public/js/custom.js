//debounce jquery
(function(b, c) {
    var $ = b.jQuery || b.Cowboy || (b.Cowboy = {}),
        a;
    $.throttle = a = function(e, f, j, i) {
        var h, d = 0;
        if (typeof f !== "boolean") {
            i = j;
            j = f;
            f = c
        }

        function g() {
            var o = this,
                m = +new Date() - d,
                n = arguments;

            function l() {
                d = +new Date();
                j.apply(o, n)
            }

            function k() { h = c }
            if (i && !h) { l() }
            h && clearTimeout(h);
            if (i === c && m > e) { l() } else { if (f !== true) { h = setTimeout(i ? k : l, i === c ? e - m : e) } }
        }
        if ($.guid) { g.guid = j.guid = j.guid || $.guid++ }
        return g
    };
    $.debounce = function(d, e, f) { return f === c ? a(d, e, false) : a(d, f, e !== false) }
})(this);


const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    showCloseButton: true,
    timer: 5000,
    background: '#585858e3',
    color: 'white',
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    beforeSend: function(xhr, options) {
        console.log('Ajax iniciado')
            // options.url = baseUrl + options.url;
    },
    complete: function(xhr, status) {
        console.log('Ajax completado')
    }

});
// Livewire.on('toastDispatch', data => {
//     console.log('toast')
//     Toast.fire({
//         icon: data.icon,
//         title: data.title,
//         text: data.body,
//     });
// });

window.addEventListener('alert', ({ detail: { type, message } }) => {
    Toast.fire({
        icon: type,
        title: message
    })
})