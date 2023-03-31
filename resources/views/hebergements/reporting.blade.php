@extends('layout')
@section('header title','Hébergements / Suivi & Reporting ')
@section('content')

    <div class="container">

        {{--1st row of tables--}}
        <div class="row">
            <div class="col-6 mt-xl-5">
                <div class="alert alert-warning bg-gradient-lightblue mb-0 p-1" role="alert">
                    <i class="fas fa-building-user fa-lg fa-beat-fade mr-1" style="color: #160a0d"></i> <span
                        class="text-dark font-weight-bold">Les Affectations Héberegemt d'Aujourd'hui</span>
                    <span class="text-dark font-italic font-weight-bold">({{date('d M Y')}})</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover  shadow   bg-white rounded">
                        <thead class="table-borderless">
                        <tr class="text-left alert alert-primary">
                            <th class="col-md-5">Nom & Prénom Participant</th>
                            <th class="">Type Chambre</th>
                            <th class="">Site Hébergement</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @if($today_hbgs->count()==0)
                            <tr>
                                <td colspan="3">
                                    <div class="text-muted text-center font-weight-bolder m-auto  ">
                                        <i class='fas fa-exclamation-triangle fa-flip'></i> <span>Aucun Hébergement n'est Enregistré Aujourd'hui!</span>
                                    </div>
                                </td>

                            </tr>
                        @else
                            @foreach($today_hbgs as $hbg)
                                <tr class="text-left">
                                    <td class="col-md-1"><a href="{{route('hebergements.show',$hbg->id)}}"
                                                            class="text-decoration-none  text-dark font-weight-bolder">{{$hbg->participant->nom_par}} {{$hbg->participant->prenom_par}}</a>
                                    </td>
                                    <td class="col-md-2">{{$hbg->type_cham==1?'Double':'Single'}}</td>
                                    <td class="col-md-3">{{$hbg->site_heberg}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-6 mt-xl-5">
                <div class="alert alert-danger bg-gradient-green mb-0 p-1" role="alert">
                    <i class="fas fa-building-circle-exclamation fa-lg fa-beat-fade" style="color: #160a0d"></i> <span
                        class="text-dark font-weight-bold">Les 5 Derniers Hébergement Ajoutés</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover  shadow   bg-white rounded">


                        <thead class="table-borderless">
                        <tr class="alert alert-success">
                            <th class="col-md-4">Nom & Prénom Participant</th>
                            <th class="col-md-3">Type Chambre</th>
                            <th class="col-md-3">Site Hébergement</th>
                            <th class="col-md-3">Date Ajout</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($last_hbgs as $lh)
                            <tr>
                                <td class=""><a href="{{route('hebergements.show',$lh->id)}}"
                                                class="text-decoration-none  text-dark font-weight-bolder">{{$lh->participant->nom_par}} {{$lh->participant->prenom_par}}</a>
                                </td>
                                <td class="">{{$lh->type_cham==1?'Single':'Double'}}</td>
                                <td class="">{{$lh->site_heberg}}</td>
                                <td class="">{{date('d M Y', strtotime($lh->created_at))}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{--    2nd row of tables--}}
        <div class="row mt-3 ">
            <div class="col-6 mt-3">
                <div class="alert alert-success bg-gradient-teal mb-0 p-1" role="alert">
                    <i class="fas fa-building-circle-check fa-lg fa-beat-fade" style="color: #160a0d"></i> <span
                        class="text-dark font-weight-bold">Les Check In d'Aujourd'hui</span>
                </div>
                <table class="table table-hover  shadow   bg-white rounded">
                    <thead class="alert alert-default-success">
                    <tr class="">
                        <th class="col-md-4">Nom & Prénom Participant</th>
                        <th class="col-md-3">Type Chambre</th>
                        <th class="col-md-3">Site Hébergement</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($todaycheckin_hbgs->count()==0)
                        <tr>
                            <td colspan="3">
                                <div class="text-muted text-center font-weight-bolder m-auto  ">
                                    <i class='fas fa-exclamation-triangle fa-flip '></i> <span>Aucun Check In n'est Effectué Aujourd'hui!</span>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach($todaycheckin_hbgs as $cih)
                            <tr class="">
                                <td class=""><a href="{{route('hebergements.show',$cih->id)}}"
                                                class="text-decoration-none  text-dark font-weight-bolder">{{$cih->participant->nom_par}} {{$cih->participant->prenom_par}}</a>
                                </td>
                                <td class="">{{$cih->type_cham==1?'Single':'Double'}}</td>
                                <td class="">{{$cih->site_heberg}}</td>

                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col-6 mt-3">
                <div class="alert alert-danger bg-gradient-red " role="alert">
                    <i class="fas fa-building-circle-xmark fa-lg fa-beat-fade "></i> <span
                        class="text-dark font-weight-bold">Les Check Out d'Aujourd'hui</span>
                </div>
                <table class="table table-hover  shadow   bg-white rounded">
                    <thead>
                    <tr class="alert alert-danger ">
                        <th class="col-md-4">Nom & Prénom Participant</th>
                        <th class="col-md-3">Type Chambre</th>
                        <th class="col-md-3">Site Hébergement</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($todaycheckout_hbgs->count()==0)
                        <tr>
                            <td colspan="3">
                                <div class="text-muted text-center font-weight-bolder m-auto  ">
                                    <i class='fas fa-exclamation-triangle fa-flip '></i> <span>Aucun Check Out n'est Effectué Aujourd'hui!</span>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach($todaycheckout_hbgs as $coh)
                            <tr class="">
                                <td class=""><a href="{{route('hebergements.show',$coh->id)}}"
                                                class="text-decoration-none  text-dark font-weight-bolder">{{$coh->participant->nom_par}} {{$coh->participant->prenom_par}}</a>
                                </td>
                                <td class="">{{$coh->type_cham==1?'Single':'Double'}}</td>
                                <td class="">{{$coh->site_heberg}}</td>

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
            width: 5px;
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
            background: rgba(255, 255, 255, 0.3);
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }

        ::-webkit-scrollbar-thumb:window-inactive {
            background: rgba(255, 255, 255, 0.3);
        }

    </style>
@endsection
