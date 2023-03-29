@extends('layout')
@section('header title','Vols / Suivi & Reporting ')
@section('content')

        <div class="container">

            {{--1st row of tables--}}

            <div class="row">
                <div class="col-6 mt-4  ">
                    <div class="alert alert-warning mb-0 p-1" role="alert">
                        <i class="fas fa-plane-circle-exclamation fa-beat-fade "></i> <span class="text-dark font-weight-bold">Les Vols Aujourd'hui</span>
                        <span class="text-dark font-italic font-weight-bold">({{date('d M Y')}})</span>
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
                                        <i class='fas fa-exclamation-triangle fa-flip'></i> <span>Aucun Vol n'est Enregistré Aujourd'hui!</span>
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
                <div class="col-6 mt-4">
                    <div class="alert alert-danger mb-0 p-1" role="alert">
                        <i class="fas fa-plane-circle-check fa-beat-fade"></i> <span
                            class="text-dark font-weight-bold">Les Derniers Vols ajoutés</span>
                    </div>
                    <table class="table table-hover  shadow   bg-white rounded">
                        <thead class="table-borderless">
                        <tr>
                            <th class="col-md-2">Numero Vol</th>
                            <th class="col-md-2">Type Vol</th>
                            <th class="col-md-3">Terminal</th>
                            <th class="col-md-3">Date Ajout</th>
                        </tr>
                        </thead>
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

            {{--2nd row of tables--}}

            <div class="row mt-3 ">
                <div class="col-6">
                    <div class="alert alert-success mb-0 p-1" role="alert">
                        <i class="fas fa-plane-departure fa-beat-fade "></i> <span class="text-dark font-weight-bold">Les Vols Depart Aujourd'hui</span>
                    </div>
                    <table class="table table-hover  shadow   bg-white rounded">
                        <thead>
                        <tr>
                            <th class="">Numero Vol</th>
                            <th class="">Terminal</th>
                            <th class="">Date Vol</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($todayarrival_vols->count()==0)
                            <tr>
                                <td colspan="3">
                                    <div class="text-muted text-center font-weight-bolder m-auto  ">
                                        <i class='fas fa-exclamation-triangle fa-flip '></i> <span>Aucun Vol Depart Aujourd'hui!</span>
                                    </div>
                                </td>

                            </tr>
                        @else
                            @foreach($todayarrival_vols as $tav)
                                <tr>
                                    <td class="col-md-1">{{$tav->numero_vol}}</td>
                                    <td class="col-md-2">{{$tav->type_vol==1?'Départ':'Arrivée'}}</td>
                                    <td class="col-md-3">{{$tav->terminal}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    <div class="alert alert-primary mb-0 p-1" role="alert">
                        <i class="fas fa-plane-arrival fa-beat-fade "></i> <span class="text-dark font-weight-bold">Les Vols Arrivee Aujourd'hui </span>
                    </div>
                    <table class="table table-hover  shadow   bg-white rounded">
                        <thead>
                        <tr>
                            <th class="">Numero Vol</th>
                            <th class="">Terminal</th>
                            <th class="">Date Vol</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($todaydeparture_vols->count()==0)
                            <tr>
                                <td colspan="3">
                                    <div class="text-muted text-center font-weight-bolder m-auto  ">
                                        <i class='fas fa-exclamation-triangle'></i> <span>Aucun Vol Arrivee n'est Enregistré Aujourd'hui!</span>
                                    </div>
                                </td>

                            </tr>
                        @else
                            @foreach($todaydeparture_vols as $tdv)
                                <tr>
                                    <td class="col-md-1">{{$tdv->numero_vol}}</td>
                                    <td class="col-md-3">{{$tdv->terminal}}</td>
                                    <td class="col-md-2">{{$tdv->type_vol==1?'Départ':'Arrivée'}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


@endsection
