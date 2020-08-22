<!--templatenya-->
@extends('layouts/DashboardAdmin')
<!--/templatenya-->

<!--titlenya-->
@section('title','CITEUP 2019 | Admin')
<!--/titlenya-->

<!--nama page-->
@section('PageName','Main Admin Page')
<!--/nama page-->

<!--breadcrumb-->
@section('breadcrumb')
    <ol class="breadcrumb nav_breadcrumb_top_align">
        <li class="breadcrumb-item">
            <a href="/home">
                <i class="fa fa-home" data-pack="default" data-tags=""></i>
                Dashboard
            </a>
        </li>
        <li class="breadcrumb-item active">Main Page</li>
    </ol>
@endsection
<!--/breadcrumb-->

<!--Isi page-->
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-white">Admin Menu</div>
                <div class="card-block cards_section_margin">
                        <div class="row">
                                <div class="col-lg-4 m-t-35">
                                    <div class="card">
                                        <div class="card-header bg-white"><i class="fa fa-money mr-1"></i><i class="fa fa-gear mr-3"></i>Pembayaran</div>
                                        <div class="card-block">
                                            <p>
                                                Konfigurasi dan Informasi Pembayaran Peserta
                                            </p>
                                        </div>
                                        <div class="card-footer bg-white">
                                        <a class="btn btn-primary" href="admin/pembayaran"><i class="fa fa-check-circle-o" style="font-size:2em;color:white"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 m-t-35">
                                    <div class="card">
                                        <div class="card-header bg-white"><i class="fa fa-users mr-1"></i><i class="fa fa-gear mr-3"></i>Peserta</div>
                                        <div class="card-block">
                                            <p>
                                                Konfigurasi dan Informasi Peserta CiteUp
                                            </p>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <a class="btn btn-primary" href="admin/peserta"><i class="fa fa-check-circle-o" style="font-size:2em;color:white"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 m-t-35">
                                    <div class="card">
                                        <div class="card-header bg-white"><i class="fa fa-flag-checkered mr-3"></i><i class="fa fa-gear mr-3"></i>Lomba/announcement</div>
                                        <div class="card-block">
                                            <p>
                                                Konfigurasi dan Informasi Lomba
                                            </p>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <a class="btn btn-primary" href="admin/lomba"><i class="fa fa-check-circle-o" style="font-size:2em;color:white"></i></a>
                                        </div>
                                    </div>
                                </div><div class="col-lg-4 m-t-35">
                                    <div class="card">
                                        <div class="card-header bg-white"><i class="fa fa-database mr-3"></i><i class="fa fa-gear mr-3"></i>Seminar</div>
                                        <div class="card-block">
                                            <p>
                                                Konfigurasi dan Informasi Seminar
                                            </p>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <a class="btn btn-primary" href="admin/seminar"><i class="fa fa-check-circle-o" style="font-size:2em;color:white"></i></a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!--/Isi page-->
