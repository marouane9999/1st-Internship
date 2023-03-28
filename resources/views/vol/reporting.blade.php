@extends('layout')
@section('header title','Vols / Suivi & Reporting ')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6 ">
                <div class="alert alert-success mb-0 p-1" role="alert">
                    <i class="fas fa-plane "></i> <span class="text-dark font-weight-bold" >Les Vols Aujourd'hui</span>  <span class="text-dark font-italic font-weight-bold">({{date('Y-m-d')}})</span>
                </div>
                <table class="table table-hover  shadow   bg-white rounded ">
                    <thead class="table-borderless">
                    <tr class="text-center">
                        <th class="">Numero Vol</th>
                        <th class="">Type Vol</th>
                        <th class="">Terminal</th>
                    </tr>
                    </thead>
                    <tbody class="">
                    @if($today_vols->count()==0)
                        <tr>
                            <td colspan="3">
                                <div class="text-muted text-center font-weight-bolder m-auto  ">
                                    <i class='fas fa-exclamation-triangle'></i> <span >Aucun Vol n'est Enregistré Aujourd'hui!</span>
                                </div>
                            </td>

                        </tr>
                    @else
                    @foreach($today_vols as $tv)
                            <tr class="text-center">
                                <td class="col-md-1">{{$tv->numero_vol}}</td>
                                <td class="col-md-2">{{$tv->type_vol==1?'Départ':'Arrivée'}}</td>
                                <td class="col-md-3">{{$tv->terminal}}</td>

                            </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <div class="alert alert-danger mb-0 p-1" role="alert">
                    <i class="fas fa-plane"></i> <span class="text-dark font-weight-bold" >Les Derniers Vols ajoutés</span>
                </div>
                <table class="table table-hover  shadow   bg-white rounded">
                    <thead class="table-borderless">
                    <tr>
                        <th class="col-md-2">Numero Vol</th>
                        <th class="col-md-2">Type Vol</th>
                        <th class="col-md-3">Terminal</th>
                        <th class="col-md-3">Date Ajout</th>
                    </tr>
                    </thead >
                    <tbody>
                    @foreach($last_vols as $lv)
                        <tr>
                            <td class="">{{$lv->numero_vol}}</td>
                            <td class="">{{$lv->type_vol==1?'Départ':'Arrivée'}}</td>
                            <td class="">{{$lv->terminal}}</td>
                            <td class="">{{$lv->created_at->todatestring()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3 ">
            <div class="col-6">
                <div class="alert alert-success mb-0 p-1" role="alert">
                    <i class="fas fa-plane "></i> <span class="text-dark font-weight-bold" >Les Vols Aujourd'hui</span>  <span class="text-dark font-italic font-weight-bold">({{date('Y-m-d')}})</span>
                </div>
                <table class="table table-hover  shadow   bg-white rounded">
                    <thead>
                    <tr>
                        <th class="">Numero Vol</th>
                        <th class="">Type Vol</th>
                        <th class="">Terminal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($today_vols->count()==0)
                        <tr>
                            <td colspan="3">
                                <div class="text-muted text-center font-weight-bolder m-auto  ">
                                    <i class='fas fa-exclamation-triangle'></i> <span >Aucun Vol n'est Enregistré Aujourd'hui!</span>
                                </div>
                            </td>

                        </tr>
                    @else
                        @foreach($today_vols as $tv)
                            <tr>
                                <td class="col-md-1">{{$tv->numero_vol}}</td>
                                <td class="col-md-2">{{$tv->type_vol==1?'Départ':'Arrivée'}}</td>
                                <td class="col-md-3">{{$tv->terminal}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <div class="alert alert-success mb-0 p-1" role="alert">
                    <i class="fas fa-plane "></i> <span class="text-dark font-weight-bold" >Les Vols Aujourd'hui</span>  <span class="text-dark font-italic font-weight-bold">({{date('Y-m-d')}})</span>
                </div>
                <table class="table table-hover  shadow   bg-white rounded">
                    <thead>
                    <tr>
                        <th class="">Numero Vol</th>
                        <th class="">Type Vol</th>
                        <th class="">Terminal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($today_vols->count()==0)
                        <tr>
                            <td colspan="3">
                                <div class="text-muted text-center font-weight-bolder m-auto  ">
                                    <i class='fas fa-exclamation-triangle'></i> <span >Aucun Vol n'est Enregistré Aujourd'hui!</span>
                                </div>
                            </td>

                        </tr>
                    @else
                        @foreach($today_vols as $tv)
                            <tr>
                                <td class="col-md-1">{{$tv->numero_vol}}</td>
                                <td class="col-md-2">{{$tv->type_vol==1?'Départ':'Arrivée'}}</td>
                                <td class="col-md-3">{{$tv->terminal}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
