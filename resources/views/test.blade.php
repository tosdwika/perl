@extends('ui.dashboard')
@section('title','Detail Pegawai')
@section('content')
<?php
//membuat bilangan 1/100
for($bil = 1; $bil <= 100; $bil++){
    //Memisahkan Bilagan Ganjil dan Genap
    if ($bil % 2 == 0) {
        echo "$bil=";echo "adalah Bilangan Genap <br>";
    }else{
        echo "$bil=";echo " adalah Bilangan Ganjil <br>";
    }
    }
?>

{{-- Memanggil hasil --}}
{{ $bil }}
@endsection()