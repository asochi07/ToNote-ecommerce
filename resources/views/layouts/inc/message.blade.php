<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>
@endif