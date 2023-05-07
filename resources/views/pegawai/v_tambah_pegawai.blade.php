@extends('ui.dashboard')
@section('title','Tambah Pegawai')
@section('content')
<form action="/pegawai/insert" method="POST" enctype="multipart/form-data">
@csrf

<div class="content">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>NIP</label>
                <input name="nip" class="form-control" value="{{ old('nip') }}">
                <div class="text-danger">
                    @error('nip')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Nama pegawai</label>
                <input name="nama_pegawai" class="form-control" value="{{ old('nama_pegawai') }}">
                <div class="text-danger">
                    @error('nama_pegawai')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Nomor Whatsapp</label>
                <input name="no_wa" class="form-control" value="{{ old('no_wa') }}">
                <div class="text-danger">
                    @error('no_wa')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Foto Pegawai</label>
                <input type="file" name="foto_pegawai" class="form-control">
                <div class="text-danger">
                    @error('foto_pegawai')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </div>
</div>
</form>
@endsection