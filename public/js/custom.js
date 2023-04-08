const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    showCloseButton: true,
    timer: 5000,
    background: '#585858e3',
    color:'white',
    timerProgressBar:true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
