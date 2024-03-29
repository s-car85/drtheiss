@if(session()->has('flash_message'))
    <script>
        swal({
            title: "{{ session('flash_message.title') }}",
            text: "{{ session('flash_message.message') }}",
            type: "{{ session('flash_message.type') }}",
            timer: 2000,
            showConfirmButton: false,
            html: true
        });
    </script>
@endif
@if(session()->has('flash_message_overlay'))
    <script>
        swal({
            title: "{{ session('flash_message_overlay.title') }}",
            text: "{{ session('flash_message_overlay.message') }}",
            type: "{{ session('flash_message_overlay.type') }}",
            confirmButtonText: 'Zatvori',
            html: true
        });
    </script>
@endif
