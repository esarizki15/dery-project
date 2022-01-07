@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('penilaian.index') }}">Penilaian</a></li>
<li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">Penilaian</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('penilaian.store') }}">
                    @csrf
                    
                    <x-select globalAttribute="user_id" label="Nama" customAttribute="required">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if(old('user_id') == $user->id) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </x-select>

                    <x-input globalAttribute="kehadiran" type="number" label="Kehadiran" :defaultValue="old('kehadiran')" customAttribute="required min=0 max=100" />

                    <x-input globalAttribute="disiplin" type="number" label="Disiplin" :defaultValue="old('disiplin')" customAttribute="required min=0 max=100" />

                    <x-input globalAttribute="dedikasi" type="number" label="Dedikasi" :defaultValue="old('dedikasi')" customAttribute="required min=0 max=100" />

                    <x-input globalAttribute="komunikasi" type="number" label="Komunikasi" :defaultValue="old('komunikasi')" customAttribute="required min=0 max=100" />

                    <x-input globalAttribute="kerjasama" type="number" label="Kerja Sama" :defaultValue="old('kerjasama')" customAttribute="required min=0 max=100" />

                    <x-input globalAttribute="kepatuhan" type="number" label="Kepatuhan" :defaultValue="old('kepatuhan')" customAttribute="required min=0 max=100" />

                    <x-input globalAttribute="kepuasan_pelanggan" type="number" label="Kepuasan Pelanggan" :defaultValue="old('kepuasan_pelanggan')" customAttribute="required min=0 max=100" />

                    <x-input globalAttribute="pemahaman_tupoksi" type="number" label="Pemahaman Tupoksi" :defaultValue="old('pemahaman_tupoksi')" customAttribute="required min=0 max=100" />

                    <x-submit-button />
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
