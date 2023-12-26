@extends('layouts.main')

@section('konten')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
               <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                     <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                     <h4 class="font-weight-normal mb-3">Jumlah semua produk <i class="mdi mdi-chart-line mdi-24px float-right"></i></h4>
                     <h2 id="totalProducts" class="mb-5">{{ $totalProducts }}</h2>
                     <h6 class="card-text">Increased by 0%</h6>
                  </div>
               </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
               <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                     <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                     <h4 class="font-weight-normal mb-3">Jumlah kategori produk <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i></h4>
                     <h2 id="totalCategories" class="mb-5">{{ $totalCategories }}</h2>
                     <h6 class="card-text">Decreased by 0%</h6>
                  </div>
               </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
               <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                     <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                     <h4 class="font-weight-normal mb-3">Jumlah stok semua produk <i class="mdi mdi-diamond mdi-24px float-right"></i></h4>
                     <h2 id="totalStock" class="mb-5">{{ $totalStock }}</h2>
                     <h6 class="card-text">Increased by 0%</h6>
                  </div>
               </div>
            </div>
         </div>

<!-- Tampilan untuk Jumlah Produk per Kategori (Column Chart) -->
<div class="row">
    <div class="col-md-6 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Jumlah Produk per Kategori</h4>
                <div id="column-chart" style="height: 300px;"></div>
            </div>
        </div>
    </div>

    <!-- Tampilan untuk Jumlah Total Harga per Kategori (Pie Chart) -->
    <div class="col-md-6 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Jumlah Total Harga per Kategori</h4>
                <div id="pie-chart" style="height: 300px;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Tampilan untuk Jumlah Stok per Kategori (Column Chart) -->
<div class="row">
    <div class="col-md-6 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Jumlah Stok per Kategori</h4>
                <div id="stok-chart" style="height: 300px;"></div>
            </div>
        </div>
    </div>
</div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Updates</h4>
                        <div class="d-flex">
                            <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                                <i class="mdi mdi-account-outline icon-sm me-2"></i>
                                <span>Pondok Mak Sati</span>
                            </div>
                            <div class="d-flex align-items-center text-muted font-weight-light">
                                <i class="mdi mdi-clock icon-sm me-2"></i>
                                <span>October 3rd, 2023</span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6 pe-1">
                                <img src="{{ asset('assets/images/dashboard/img_1.jpg') }}"
                                    class="mb-2 mw-100 w-100 rounded" alt="image">
                                <img src="{{ asset('assets/images/dashboard/img_4.jpeg') }}" class="mw-100 w-100 rounded"
                                    alt="image">
                            </div>
                            <div class="col-6 ps-1">
                                <img src="{{ asset('assets/images/dashboard/img_2.jpeg') }}"
                                    class="mb-2 mw-100 w-100 rounded" alt="image">
                                <img src="{{ asset('assets/images/dashboard/img_3.jpeg') }}" class="mw-100 w-100 rounded"
                                    alt="image">
                            </div>
                        </div>
                        <div class="d-flex mt-5 align-items-top">
                            <img src="{{ asset('assets/images/faces/face3.jpg') }}" class="img-sm rounded-circle me-3"
                                alt="image">
                            <div class="mb-0 flex-grow">
                                <h5 class="me-2 mb-2">Purnawan Hengky - Kuliner.</h5>
                                <p class="mb-0 font-weight-light">初めて食べた時驚ました。他のインドネシアの串焼きに比べて大変美味かった。またパレンバンへ行く時また行きます。
                                    <br> I never find satay as good as this place. The staffs are friendly and they have
                                    good price as well. Try when you go to Palembang!
                                </p>
                            </div>
                            <div class="ms-auto">
                                <i class="mdi mdi-heart-outline text-muted"></i>
                            </div>
                            <img src="{{ asset('assets/images/faces/face3.jpg') }}" class="img-sm rounded-circle me-3"
                                alt="image">
                            <div class="mb-0 flex-grow">
                                <h5 class="me-2 mb-2">Maswardi Bustari - Local Guide.</h5>
                                <p class="mb-0 font-weight-light">Alhamdulillah, sudah diberikan kesempatan oleh Allah
                                    untuk bisa menikmati menu masakan yang ada di Pondok Mak Sati, yang menjadi kesukaan ku
                                    adalah SATE dan SOTO. Maknyus, rasanya belum ada lawan.
                                    <br>Semoga Pondok Mak Sati selalu ada melayani selera Wong Palembang. Mantabbb.....
                                </p>
                            </div>
                            <div class="ms-auto">
                                <i class="mdi mdi-heart-outline text-muted"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
