@extends('ui.dashboard')
@section('title','Detail Pegawai')
@section('content')
<?php
//Buat angka awal
$temp=0;
$now=1;

//Tampilkan 2 angka awal
echo "$temp $now";

for($i=0; $i<=10; $i++)
{
    //hitung angka fibonacci
    $output = $temp +$now;
    echo " $output";

    //siapkan angka untuk perhitungan berikutnya
    $temp = $now;
    $now = $output;
}
?>

{{-- Menampilkan hasil perhitungan --}}
{{ $output }}
@endsection()