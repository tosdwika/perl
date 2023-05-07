@extends('ui.dashboard')
@section('title','Detail Pegawai')
@section('content')
<table class="table table-borderless">
    <tr>
        <th width="150px">NIP</th>
        <th width="30px">:</th>
        <th width="150px">{{ $pegawai->nip }}</th>
    </tr>
    <tr>
        <th width="150px">Nama Pegawai</th>
        <th width="30px">:</th>
        <th>{{ $pegawai->nama_pegawai }}</th>
    </tr>
    <tr>
        <th width="150px">Nomor Whatsapp</th>
        <th width="30px">:</th>
        <th>{{ $pegawai->no_wa }}</th>
    </tr>
    <tr>
        <th width="150px">Foto pegawai</th>
        <th width="30px">:</th>
        <th><img src="{{ url('foto_pegawai/'.$pegawai->foto_pegawai) }}" width="300px" alt=""></th>
    </tr>
    <tr>
        <th width="150px"></th>
        <th width="30px"></th>
        <th width="30px"></th>
        <th>
            <a href="/pegawai" class="btn btn-sm btn-primary">Kembali</a>
        </th>
    </tr>
</table>
@endsection