@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables/rowReorder.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
<form id="form-status" action="{{ route('status-perpanjang.store') }}" method="POST">
    @csrf
    <input type="hidden" name="penilaian_id" id="penilaian_id">
    <input type="hidden" name="penilai_id" id="penilai_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="status" id="status">
</form>
@section('script')
    <script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('admin-lte/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables/buttons.print.min.js') }}"></script>
    <script>
    $(document).ready( function () {
        $('.table').DataTable({
            responsive:true,
            dom: 'Bfrtip',
            buttons: [
                { extend: 'copyHtml5', footer: true },
                { extend: 'excelHtml5', footer: true },
                { extend: 'csvHtml5', footer: true },
                { extend: 'pdfHtml5', footer: true },
                { extend: 'print', footer: true }
            ],
        });

        $('.btn-tindak').on("click", function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Perpanjang kontrak?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Tidak',
                confirmButtonText: 'Ya'
            }).then((value)=>{
                var penilaianId = $('#penilaian_id');
                var status = $('#status');
                var formStatus = $('#form-status');
                penilaianId.val(e.target.id)
                status.val(value.isConfirmed ? 1 : 0)
                formStatus.submit();
            });
        });
        
    });
    </script>
@endsection