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
@section('PageName','Payment Management Page')
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
                <div class="card-header bg-white">Data Ketua Team</div>
                <div class="card-block cards_section_margin">
                    <div class="row">
                    <div class="cardx m-t-35x">
                            <!--<div class="card-header bg-white">
                                <i class="fa fa-table"></i> List Peserta
                            </div>-->
                            <div class="card-block m-t-35">
                                <table id="example3" class="display table table-stripped table-bordered">
                                    <thead>
                                        <tr>

                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Asal Sekolah</th>
                                            <th>Telp</th>
                                            <th>Lomba</th>
                                            <th>Jenis Peserta</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Asal Sekolah</th>
                                            <th>Telp</th>
                                            <th>Lomba</th>
                                            <th>Jenis Peserta</th>
                                            <th>status</th>
                                        </tr>
                                        </tfoot>
                                    <tbody>
                                    @foreach ($value_join as $item_join)
                                    <tr>

                                        <td>{{$item_join->username}}</td>
                                        <td>{{$item_join->email}}</td>
                                        <td>{{$item_join->asal_sekolah}}</td>
                                        <td>{{$item_join->no_hp}}</td>
                                        <td>{{$item_join->jenis_lomba}}</td>
                                        <td>{{$item_join->jenis_peserta}}</td>
                                        <td>{{$item_join->status}}</td>
                                        <td>
                                            <a href="pembayaran/{{$item_join->id_peserta}}">
                                                <span class="badge badge-danger"><i class="fa fa-eye p-1"></i></span>
                                            </a>
                                            {{-- <a href="pembayaran/accept/{{$item_join->id_peserta}}">
                                                <span class="badge badge-danger"><i class="fa fa-check p-1"></i></span>
                                            </a>
                                            <a href="pembayaran/reject/{{$item_join->id_peserta}}">
                                                <span class="badge badge-danger"><i class="fa fa-close p-1"></i></span>
                                            </a> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
