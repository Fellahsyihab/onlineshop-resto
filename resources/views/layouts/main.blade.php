<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_navbar.html -->
      @include('layouts.navbar')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('layouts.sidebar')

        <!-- partial -->
        <div class="main-panel">
            @yield('konten')
          <!-- content-wrapper ends -->

          <!-- partial:partials/_footer.html -->
          @include('layouts.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js" type="text/javascript') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('ssets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- End custom js for this page -->
    <!-- Sertakan jQuery terlebih dahulu -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Sertakan file Bootstrap Javascript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/highcharts.js') }}"></script> <!-- Sesuaikan dengan lokasi file highcharts.js Anda -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
       // Pastikan statisticsData didefinisikan dan memiliki nilai
       var statisticsData = {!! isset($statisticsData) ? json_encode($statisticsData) : '{}' !!};

       // Update elemen-elemen HTML dengan data statistik
       if (statisticsData.totalProducts !== undefined) {
          document.getElementById('totalProducts').innerText = statisticsData.totalProducts;
       }

       // Pastikan elemen HTML highcharts-container ada di dalam dokumen
       var highchartsContainer = document.getElementById('highcharts-container');
       if (highchartsContainer) {
          // Highcharts: Contoh plot
          Highcharts.chart(highchartsContainer, {
             chart: {
                type: 'bar',
             },
             title: {
                text: 'Statistik Produk',
             },
             xAxis: {
                categories: ['Produk', 'Kategori', 'Stok'],
             },
             yAxis: {
                title: {
                   text: 'Jumlah',
                },
             },
             series: [{
                name: 'Jumlah',
                data: [statisticsData.totalProducts || 0, statisticsData.totalCategories || 0, statisticsData.totalStock || 0],
             }],
          });
       }
    });
 </script>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<!-- Script untuk menginisialisasi dan menggambar chart -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var columnChart = Highcharts.chart('column-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Produk per Kategori'
            },
            xAxis: {
                categories: {!! isset($dataColumnChart['categories']) ? json_encode($dataColumnChart['categories']) : '[]' !!}
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            series: [{
                name: 'Jumlah Produk',
                data: {!! isset($dataColumnChart['data']) ? json_encode($dataColumnChart['data']) : '[]' !!}
            }]
        });

       // Pie Chart: Jumlah Total Harga per Kategori
       var pieChart = Highcharts.chart('pie-chart', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Jumlah Total Harga per Kategori'
            },
            series: [{
                name: 'Total Harga',
                data: {!! isset($dataPieChart) ? json_encode($dataPieChart) : '[]' !!}
            }]
        });

        // Column Chart: Jumlah Stok per Kategori
        var stokChart = Highcharts.chart('stok-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Stok per Kategori'
            },
            xAxis: {
                categories: {!! isset($dataStokChart['categories']) ? json_encode($dataStokChart['categories']) : '[]' !!}
            },
            yAxis: {
                title: {
                    text: 'Jumlah Stok'
                }
            },
            series: [{
                name: 'Jumlah Stok',
                data: {!! isset($dataStokChart['data']) ? json_encode($dataStokChart['data']) : '[]' !!}
            }]
        });
    });
</script>

  </body>
</html>
