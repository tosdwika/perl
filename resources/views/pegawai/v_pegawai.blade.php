@extends('ui.dashboard')
@section('title','Pegawai')
@section('content')
<a href="/pegawai/tambah" class="btn btn-sm btn-primary">Tambah</a>
@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  {{ session('pesan') }}
</div>
@endif
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>NIP</th>
      <th>Nama Pegawai</th>
      <th>Nomor Whatsapp</th>
      <th>Foto pegawai</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    @foreach ($pegawai as $data)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $data->nip }}</td>
      <td>{{ $data->nama_pegawai }}</td>
      <td>{{ $data->no_wa }}</td>
      <td><img src="{{ url('foto_pegawai/'.$data->foto_pegawai) }}" width="150px" alt=""></td>
      <td>
        <a href="/pegawai/detail/{{ $data->nip }}" class="btn btn-sm btn-primary">Detail</a>
        <a href="/pegawai/edit/{{ $data->nip }}" class="btn btn-sm btn-warning">Edit</a>
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_pegawai{{ $data->nip }}">
          Hapus
        </button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@foreach ($pegawai as $data)
<div class="modal fade" id="delete_pegawai{{ $data->nip }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">{{ $data->nama_pegawai }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin meghapus {{ $data->nama_pegawai }}</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
        <a href="/pegawai/delete/{{ $data->nip }}" class="btn btn-sm btn-warning">Ya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach
@endsection