<!--templatenya-->
@extends('layouts/DashboardAdmin')
<!--/templatenya-->

<!--titlenya-->
@section('title','CITEUP 2019 | Admin')
<!--/titlenya-->

<!--titlenya-->
@section('globalplugin')
<link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/select2/css/select2.min.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/datatables/css/scroller.bootstrap.min.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/datatables/css/colReorder.bootstrap.min.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('/dist/vendors/datatables/css/dataTables.bootstrap.min.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/dataTables.bootstrap.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('/dist/css/pages/tables.css')}}" />
@endsection
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
    @foreach ($value_join as $item_join)
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-white">
                Detail Seminar
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-lg-4">

                            @if ($item_join->bukti_bayar != "")
                                <img src="{{asset('/images/seminar_payments/'.$item_join->bukti_bayar)}}" class="img-fluid img-thumbnail mt-3" alt="Photo of sunset">
                            @else
                                <img src="{{asset('/images/unpaid.png/')}}" class="img-fluid img-thumbnail mt-3" alt="Photo of sunset">
                            @endif

                    </div>

                    <div class="col-lg-6">
                        <p class="list-group-item mt-3 bg-danger"> Info</p>
                        <p class="list-group-item"> Nama : {{$item_join->nama_lengkap}}</p>
                        <p class="list-group-item"> Alamat : {{$item_join->alamat}}</p>
                        <p class="list-group-item"> HP : {{$item_join->no_hp}}</p>
                        <p class="list-group-item"> Email : {{$item_join->email}}</p>
                        {{-- <p>
                            <a href="accept/{{$item_join->id_peserta}}">
                                <span class="badge badge-danger"><i class="fa fa-check p-1"></i></span>
                            </a>
                            <a href="reject/{{$item_join->id_peserta}}">
                                <span class="badge badge-danger"><i class="fa fa-close p-1"></i></span>
                            </a>
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
<!--/Isi page-->

@section('globaljs')
<script type="text/javascript" src="{{asset('/dist/vendors/select2/js/select2.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/datatables/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/js/pluginjs/dataTables.tableTools.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/datatables/js/dataTables.colReorder.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/datatables/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/datatables/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/datatables/js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/datatables/js/dataTables.rowReorder.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/datatables/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/datatables/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/datatables/js/buttons.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/datatables/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/vendors/datatables/js/dataTables.scroller.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/dist/js/pages/simple_datatables.js')}}"></script>
@endsection
