@extends('ui.dashboard')
@section('title','Barang')
@section('content')
<a href="/barang/tambah" class="btn btn-sm btn-primary">Tambah</a>
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
      <th>ID Barang</th>
      <th>Nama Barang</th>
      <th>Harga Barang</th>
      <th>Jumlah Barang</th>
      <th>Foto Barang</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    @foreach ($barang as $data)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $data->id_barang }}</td>
      <td>{{ $data->nama_barang }}</td>
      <td>{{ $data->harga_barang }}</td>
      <td>{{ $data->jumlah_barang }}</td>
      <td><img src="{{ url('foto/'.$data->foto_barang) }}" width="150px" alt=""></td>
      <td>
        <a href="/barang/detail/{{ $data->id_barang }}" class="btn btn-sm btn-primary">Detail</a>
        <a href="/barang/edit/{{ $data->id_barang }}" class="btn btn-sm btn-warning">Edit</a>
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_barang }}">
          Hapus
        </button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@foreach ($barang as $data)
<div class="modal fade" id="delete{{ $data->id_barang }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">{{ $data->nama_barang }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin meghapus {{ $data->nama_barang }}</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
        <a href="/barang/delete/{{ $data->id_barang }}" class="btn btn-sm btn-warning">Ya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach
@endsection