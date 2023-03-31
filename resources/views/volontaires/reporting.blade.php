@extends('layout')
@section('header title','Volontaires/ Suivi & Reporting ')
@section('content')

    <div class="container">

        {{--1st row of tables--}}

        <div class="row">
            <div class="col-6 mt-xl-5  ">
                <div class="alert alert-default-success mb-0 p-1" role="alert">
                    <i class="fas fa-user-tag fa-beat-fade "></i> <span
                        class="text-dark font-weight-bold">Les Volontaires Ajoutés  Aujourd'hui</span>
                    <span class="text-dark font-italic font-weight-bold">({{date('d M Y')}})</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover  shadow   bg-white rounded ">
                        <thead class="table-borderless bg-gradient-green">
                        <tr class="text-center">
                            <th class="">Nom & prénom</th>
                            <th class="">Site Afféctation</th>
                            <th class="">Rôle</th>
                        </tr>
                        </thead>
                        <tbody class="">
                        @if( $today_volont->count()==0)
                            <tr>
                                <td colspan="3">
                                    <div class="text-muted text-center font-weight-bolder m-auto  ">
                                        <i class='fas fa-exclamation-triangle fa-flip'></i> <span>Aucun Volontaire n'est Enregistré Aujourd'hui!</span>
                                    </div>
                                </td>

                            </tr>
                        @else
                            @foreach( $today_volont as $tvl)
                                <tr class="text-center">

                                    <td class="col-md-1"><a href="{{route('volontaires.show',$tvl->id)}}"
                                                            class="text-decoration-none  text-dark font-weight-bolder">{{$tvl->participant->nom_par}} {{$tvl->participant->prenom_par}}</a>
                                    </td>
                                    <td class="col-md-2">{{$tvl->site_aff}}</td>
                                    <td class="col-md-3">{{$tvl->role}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-6 mt-xl-5">
                <div class="alert alert-default-info mb-0 p-1" role="alert">
                    <i class="fas fa-user-tag fa-beat-fade"></i> <span
                        class="text-dark font-weight-bold">Les 5 Derniers Volontaires ajoutés</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover  shadow   bg-white rounded">


                        <thead class="table-borderless bg-gradient-blue">
                        <tr>
                            <th class="col-md-3">Nom & prénom</th>
                            <th class="col-md-3">Site Afféctation</th>
                            <th class="col-md-3">Rôle</th>
                            <th class="col-md-3">Date d'ajout</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($last_volont as $lvl)
                            <tr>
                                <td class=""><a href="{{route('volontaires.show',$lvl->id)}}"
                                                class="text-decoration-none  text-dark font-weight-bolder">{{$lvl->participant->nom_par}} {{$lvl->participant->prenom_par}}</a>
                                </td>
                                <td class="">{{$lvl->site_aff}}</td>
                                <td class="">{{$lvl->role}}</td>
                                <td class="">{{$lvl->created_at->todatestring()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

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
