@extends('layout')
@section('header title','Restaurations / Suivi & Reporting ')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mt-xl-5">
                <div class="alert alert-warning bg-gradient-lightblue mb-0 p-1" role="alert">
                    <i class="fas fa-utensils fa-lg fa-beat-fade mr-1" style="color: #160a0d" ></i> <span
                        class="text-dark font-weight-bold">Les Affectations Restauration d'Aujourd'hui</span>
                    <span class="text-dark font-italic font-weight-bold">({{date('d M Y')}})</span>
                    <span class="float-right"><a href="{{route('restaurations.download','tr')}}"><i class="fa fa-download fa-lg text-dark" aria-hidden="true"></i></a></span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover  shadow   bg-white rounded ">
                        <thead class="table-borderless">
                        <tr class="text-left">
                            <th class="col-md-5">Nom & Prenom Participant</th>
                            <th class="">Type Repas</th>
                            <th class="">Site Restauration</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @if($today_restaurations->count()==0)
                            <tr>
                                <td colspan="3">
                                    <div class="text-muted text-center font-weight-bolder m-auto  ">
                                        <i class='fas fa-exclamation-triangle fa-flip'></i> <span>Aucune Restauration n'est Enregistré Aujourd'hui!</span>
                                    </div>
                                </td>
                            </tr>
                        @else
                            @foreach($today_restaurations as $tr)
                                <tr class="text-left">
                                    <td class="col-md-1"><a href="{{route('restaurations.show',$tr->id)}}"
                                                            class="text-decoration-none  text-dark font-weight-bolder">{{$tr->participant->nom_par}} {{$tr->participant->prenom_par}}</a>
                                    </td>
                                    <td class="col-md-2">{{$tr->repas->des_rep}}</td>
                                    <td class="col-md-3">{{$tr->site_restau}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-6 mt-xl-5">
                <div class="alert alert-danger bg-gradient-lime mb-0 p-1" role="alert">
                    <i class="fas fa-utensils fa-lg fa-beat-fade" style="color: #160a0d"></i> <span
                        class="text-dark font-weight-bold">Les 5 Derniers Restaurations Ajoutés</span>
                    <span class="float-right"><a href="{{route('restaurations.download','lr')}}"><i class="fa fa-download fa-lg text-dark" aria-hidden="true"></i></a></span>

                </div>
                <div class="table-responsive">
                    <table class="table table-hover  shadow   bg-white rounded">

                        <thead class="table-borderless">
                        <tr>
                            <th class="col-md-4">Nom & Prenom Participant</th>
                            <th class="col-md-3">Type Repas</th>
                            <th class="col-md-3">Site Restauration</th>
                            <th class="col-md-3">Date Ajout</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($last_restaurations as $lr)
                            <tr>
                                <td class=""><a href="{{route('restaurations.show',$lr->id)}}"
                                                class="text-decoration-none  text-dark font-weight-bolder">{{$lr->participant->nom_par}} {{$lr->participant->prenom_par}}</a>
                                </td>
                                <td class="">{{$lr->repas->des_rep}}</td>
                                <td class="">{{$lr->site_restau}}</td>
                                <td class="">{{date('d M Y',strtotime($lr->created_at))}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-3 ">
            <div class="col-6 mt-3">
                <div class="alert alert-success mb-0 p-1" role="alert">
                    <i class="fas fa-utensils fa-lg fa-beat-fade "></i> <span class="text-dark font-weight-bold">Le Nombre de repas  Servis par Site de Restauration</span>
                    <span class="float-right"><a href="{{route('restaurations.download','totr')}}"><i class="fa fa-download fa-lg text-dark" aria-hidden="true"></i></a></span>
                </div>
                <table class="table table-hover  shadow   bg-white rounded">
                    <thead class="">
                    <tr class="text-left text-dark">
                        <th class="">Site Restauration</th>
                        <th class="">Total des  Repas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($total_repas->count()==0)
                        <tr>
                            <td colspan="3">
                                <div class="text-muted text-center font-weight-bolder m-auto  ">
                                    <i class='fas fa-exclamation-triangle fa-flip '></i> <span>Statistique indisponible!</span>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach($total_repas as $tr)
                            <tr class="text-left">
                                <td class=""><a href="#"
                                                class="text-decoration-none  text-dark font-weight-bolder">{{$tr->site_restau}}</a>
                                </td>
                                <td class="">{{$tr->repas}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col-6 mt-3">
                <div class="alert alert-warning mb-0 p-1" role="alert">
                    <i class="fas fa-utensils fa-lg fa-beat-fade "></i> <span class="text-dark font-weight-bold">Le Nombre de Repas Servis Aujourd'hui <span class="text-dark font-italic font-weight-bold">({{date('d M Y')}})</span> </span>
                    <span class="float-right"><a href="{{route('restaurations.download','todr')}}"><i class="fa fa-download fa-lg text-dark" aria-hidden="true"></i></a></span>

                </div>
                <table class="table table-hover  shadow   bg-white rounded">
                    <thead class="">
                    <tr class="text-left text-dark">
                        <th class="">Site Restauration</th>
                        <th class="">Total Des Repas</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($today_repas as $tr)
                            <tr class="text-left">
                                <td class=""><a href="#" class="text-decoration-none  text-dark font-weight-bolder">{{$tr->site_restau}}</a>
                                </td>
                                <td class="">{{$tr->repas}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
