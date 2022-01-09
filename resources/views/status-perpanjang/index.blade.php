@extends('layouts.admin-lte.main')

@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Penilaian</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @include('partial.alert')
        <div class="card">
            <div class="card-header header-primary">Penilaian</div>

            <div class="card-body">
                <table class="table table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                        <th scope="col">Penilaian ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Status Perpanjang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $data)
                            <tr>
                                <td>{{ $data->penilaian->id }}</td>
                                <td>{{ $data->penilaian->user->name }}</td>
                                <td>{{ strtoupper($data->penilaian->nilai()) }}</td>
                                <td>{{ $data->status == 1 ? "Ya" : "Tidak" }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables/rowReorder.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
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
        });
    });
    </script>
@endsection