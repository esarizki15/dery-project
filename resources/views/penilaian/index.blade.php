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
                <p><a href="{{ route('penilaian.create') }}" class="btn btn-sm btn-primary">Buat</a></p>
                <table class="table table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kehadiran</th>
                        <th scope="col">Disiplin</th>
                        <th scope="col">Dedikasi</th>
                        <th scope="col">Komunikasi</th>
                        <th scope="col">Kerja Sama</th>
                        <th scope="col">Kepatuhan</th>
                        <th scope="col">Kepuasan Pelanggan</th>
                        <th scope="col">Pemahaman Tupoksi</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penilaian as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>{{ $data->kehadiran }}</td>
                                <td>{{ $data->disiplin }}</td>
                                <td>{{ $data->dedikasi }}</td>
                                <td>{{ $data->komunikasi }}</td>
                                <td>{{ $data->kerjasama }}</td>
                                <td>{{ $data->kepatuhan }}</td>
                                <td>{{ $data->kepuasan_pelanggan }}</td>
                                <td>{{ $data->pemahaman_tupoksi }}</td>
                                <td>{{ strtoupper($data->nilai()) }}</td>
                                <td>
                                    <x-action route="penilaian" :object="$data">
                                        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                                        <button id="{{ $data->id }}" type="button" class="btn btn-xs btn-tindak btn-secondary">Tindak</button>
                                        @endif
                                    </x-action>
                                </td>
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
@include('partial.dataTable')
