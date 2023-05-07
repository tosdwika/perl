@extends('ui.dashboard')
@section('title','Chart Penjualan')
@section('content')
<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
      <div class="iq-header-title">
         <h4 class="card-title"> Grafik Penjualan PT. Hana Star Indonesia</h4>
      </div>
      <div class="iq-header-title">
         <h4 class="card-title"> Grafik Penghasilan PT. Hana Star Indonesia</h4>
      </div>
   </div>
   <div class="iq-card-body d-flex justify-content-between">
            <div class="col-md-6" style="height: 400px;"><canvas id="penjualan" ></canvas></div>
            <div class="col-md-6" style="height: 200px;"><canvas id="penghasilan" ></canvas></div>
   </div>
</div>

 </div>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 {{-- <script src="path/to/chartjs/dist/chart.umd.js"></script> --}}
 <script>
   const ctx = document.getElementById('penjualan');
 
   new Chart(ctx, {
     type: 'pie',
     data: {
       labels: ['Velg', 'Damper', 'Pintu Mobil', 'Rooftop', 'Shock Breaker'],
       datasets: [{
         label: 'Jumlah',
         data: [{{$velg}}, {{$damper}}, {{$pintu_mobil}}, {{$rooftop}}, {{$shock_breaker}}],
         borderWidth: 1
       }]
     },
     options: {
       scales: {
         y: {
           beginAtZero: true
         }
       }
     }
   });
 </script>
 <script>
   const ctr = document.getElementById('penghasilan');
 
   new Chart(ctr, {
     type: 'bar',
     data: {
       labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ],
       datasets: [{
         label: 'Total dalam Rupiah (Rp)',
         data: [{{$jan}}, {{$feb}}, {{$mar}}, {{$apr}}, {{$mei}}, {{$jun}}, {{$jul}}, {{$ags}}, {{$sep}}, {{$okt}}, {{$nov}}, {{$des}}],
         borderWidth: 1
       }]
     },
     options: {
       scales: {
         y: {
           beginAtZero: true
         }
       }
     }
   });
 </script>
@endsection