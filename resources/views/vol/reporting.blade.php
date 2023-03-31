@extends('layout')
@section('header title','Vols / Suivi & Reporting ')
@section('content')

    <div class="container">

        {{--1st row of tables--}}

        <div class="row">
            <div class="col-6 mt-xl-5  ">
                <div class="alert alert-warning mb-0 p-1" role="alert">
                    <i class="fas fa-plane-circle-exclamation fa-beat-fade "></i> <span
                        class="text-dark font-weight-bold">Les Vols Ajouté  Aujourd'hui</span>
                    <span class="text-dark font-italic font-weight-bold">({{date('d M Y')}})</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover  shadow   bg-white rounded ">
                        <thead class="table-borderless bg-gradient-lime">
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

                                    <td class="col-md-1"><a href="{{route('vols.show',$tv->id)}}"
                                                            class="text-decoration-none  text-dark font-weight-bolder">{{$tv->numero_vol}}</a>
                                    </td>
                                    <td class="col-md-2">{{$tv->type_vol==1?'Départ':'Arrivée'}}</td>
                                    <td class="col-md-3">{{$tv->terminal}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-6 mt-xl-5">
                <div class="alert alert-danger mb-0 p-1" role="alert">
                    <i class="fas fa-plane-circle-check fa-beat-fade"></i> <span
                        class="text-dark font-weight-bold">Les 5 Derniers Vols ajoutés</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover  shadow   bg-white rounded">


                        <thead class="table-borderless bg-gradient-danger">
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
                                <td class=""><a href="{{route('vols.show',$lv->id)}}"
                                                class="text-decoration-none  text-dark font-weight-bolder">{{$lv->numero_vol}}</a>
                                </td>
                                <td class="">{{$lv->type_vol==1?'Départ':'Arrivée'}}</td>
                                <td class="">{{$lv->terminal}}</td>
                                <td class="">{{$lv->created_at->todatestring()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        {{--2nd row of tables--}}
        <div class="row mt-3 ">
            <div class="col-6 mt-3">
                <div class="alert alert-success mb-0 p-1" role="alert">
                    <i class="fas fa-plane-departure fa-beat-fade "></i> <span class="text-dark font-weight-bold">Les Vols Depart Aujourd'hui</span>
                </div>
                <table class="table table-hover  shadow   bg-white rounded">
                    <thead class="bg-gradient-success">
                    <tr class="text-center text-dark">
                        <th class="">Numero Vol</th>
                        <th class="">Terminal</th>
                        <th class="">Horraire Vol</th>
                        <th class="">Statut</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($todaydeparture_vols->count()==0)
                        <tr>
                            <td colspan="3">
                                <div class="text-muted text-center font-weight-bolder m-auto  ">
                                    <i class='fas fa-exclamation-triangle fa-flip '></i> <span>Aucun Vol Depart n'est Effectué Aujourd'hui!</span>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach($todaydeparture_vols as $tdv)
                            <tr class="text-center">
                                <td class=""><a href="{{route('vols.show',$tdv->id)}}"
                                                class="text-decoration-none  text-dark font-weight-bolder">{{$tdv->numero_vol}}</a>
                                </td>
                                <td class="">{{$tdv->terminal}}</td>
                                <td class="">{{date('H:i',strtotime($tdv->date_vol))}}</td>
                                <td class="">
                                    @if(date('H:i',strtotime($tdv->date_vol))>date('H:i'))
                                        <i class="fas fa-spinner fa-spin fa-lg fa-spin-reverse text-orange "></i>
                                    @else
                                        <i class="fas fa-check fa-lg text-green mr-2"></i><span class="font-weight-bold font-italic">Effectué</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col-6 mt-3">
                <div class="alert alert-primary mb-0 p-1" role="alert">
                    <i class="fas fa-plane-arrival fa-beat-fade  "></i> <span class="text-dark font-weight-bold">Les Vols Arrivee Aujourd'hui </span>
                </div>
                <table class="table table-hover  shadow   bg-white rounded">
                    <thead class="bg-gradient-primary">
                    <tr class="text-center">
                        <th class="col-md-3">Numero Vol</th>
                        <th class="">Terminal</th>
                        <th class="">Horraire Vol</th>
                        <th>Statut</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($todayarrival_vols->count()==0)
                        <tr>
                            <td colspan="3">
                                <div class="text-muted text-center font-weight-bolder m-auto  ">
                                    <i class='fas fa-exclamation-triangle fa-flip'></i> <span>Aucun Vol Arrivee n'est Effectué Aujourd'hui!</span>
                                </div>
                            </td>

                        </tr>
                    @else
                        @foreach($todayarrival_vols as $tav)
                            <tr class="text-center">
                                <td class="col-md-1"><a href="{{route('vols.show',$tav->id)}}"
                                                        class="text-decoration-none   text-dark font-weight-bold">{{$tav->numero_vol}}</a>
                                </td>
                                <td class="col-md-3">{{$tav->terminal}}</td>
                                <td class="col-md-2">{{date('H:i',strtotime($tav->date_vol))}}</td>
                                <td>
                                    @if(date('H:i',strtotime($tav->date_vol))>date('H:i'))
                                        <i class="fas fa-spinner fa-spin fa-lg fa-spin-reverse text-orange mr-2 "></i> <span class="font-weight-bold font-italic">Pendant</span>
                                    @else
                                        <i class="fas fa-check fa-lg text-green"></i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .table-responsive {
            max-height: 300px;
        }

        ::-webkit-scrollbar {
            width: 10px;
            height: 5px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            -webkit-border-radius: 10px;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-border-radius: 10px;
            border-radius: 10px;
            background-color: #1d455b;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }

        ::-webkit-scrollbar-thumb:window-inactive {
            background: rgba(255, 255, 255, 0.3);
        }

    </style>


@endsection
