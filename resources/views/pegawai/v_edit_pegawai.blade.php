@extends('ui.dashboard')
@section('title','Edit Pegawai')
@section('content')
<form action="/pegawai/update/{{ $pegawai->nip }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="content">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>NIP</label>
                <input name="nip" class="form-control" value="{{ $pegawai->nip }}" readonly>
            </div>
            <div class="form-group">
                <label>Nama Pegawai</label>
                <input name="nama_pegawai" class="form-control" value="{{ $pegawai->nama_pegawai }}">
                <div class="text-danger">
                    @error('nama_pegawai')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Nomor WA</label>
                <input name="no_wa" class="form-control" value="{{ $pegawai->no_wa }}">
                <div class="text-danger">
                    @error('no_wa')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Foto Pegawai</label>
                <div class="col-sm-14">
                    <div class="col-sm-6">
                        <img src="{{ url('foto_pegawai/'.$pegawai->foto_pegawai) }}" width="150px" alt="">
                    </div>
                    <div class="col-sm-8">
                        <input type="file" name="foto_pegawai" class="form-control">
                        
                    </div>
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