<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
    {{-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" /> --}}


</head>

<body>
    @include('layouts.navbar')
    <main>
        @yield('content')
    </main>
    @include('layouts.footer')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ asset('js/data_table.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            // $('.owl-carousel').owlCarousel({
            //     loop: true,
            //     margin: 10,
            //     nav: true,
            //     responsive:{
            //         0:{
            //             items: 1
            //         },
            //         600:{
            //             items: 2
            //         },
            //         1000:{
            //             items: 3
            //         }
            //     }
            // });
            @if(session('message'))
                Swal.fire({
                    title: 'Felicitaciones',
                    text: "{{ session('message') }}",
                    icon: 'success',
                    confirmButtonColor: '#1e5f74',
                    confirmButtonText: 'Aceptar'
                });
            @endif
            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "{{ session('error') }}",
                });
            @endif
            $('.btn-delete').click(function(event) {
                Swal.fire({
                    title: 'Está seguro?',
                    text: 'Desea eliminar este registro',
                    icon: 'error',
                    showCancelButton: true,
                    cancelButtonColor: '#e3342f',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#1e5f74',
                    confirmButtonText: 'Aceptar',
                }).then((result) => {
                    if (result.value) {
                        $(this).parent().submit();
                    }
                });
            });
            $('#photo').change(function(event) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('#preview').attr('src', event.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
            /*-- Se asigna al btn-excel la que se comporte como input --*/
            $('.btn-excel').click(function(event) {
                $('#file').click();
            });
            /*--Se crea el envio automatico del archivo cuando el id="file" cambia--*/
            $('#file').change(function(event) {
                $(this).parent().submit();
            });
            /*--Se crea el evento key-up para la busqueda, los id="" llevan númeral--*/
            $('body').on('keyup', '#qsearch', function(event){
                event.preventDefault();
                /*-- alert($(this).val()); lo utilicé para comprobar si mostraba una alerta por cada caracter que se presiona--*/
                $q = $(this).val();
                $t = $('input[name=_token]').val();
                $m = $('#tmodel').val();
                $('.loader').removeClass('d-none');
                $('.table').hide();
                $sto = setTimeout(function(){
                    clearTimeout($sto);
                    $.post($m+'/search', {q: $q, _token: $t}, function(data) {
                        $('.loader').addClass('d-none');
                        $('#content').html(data);
                        $('.table').fadeIn('slow');
                    });
                }, 2000);
            });
        });
    </script>
</body>

</html>
