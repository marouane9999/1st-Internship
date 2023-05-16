@extends('layout')
@section('header title','Volontaires / Suivi & Reporting ')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mt-xl-5">
                <div class="alert alert-warning bg-gradient-lightblue mb-0 p-1" role="alert">
                    <i class="fas fa-user-tag fa-lg fa-beat-fade mr-1" style="color: #160a0d" ></i> <span
                        class="text-dark font-weight-bold">Les Affectations des Volontaires d'Aujourd'hui</span>
                    <span class="text-dark font-italic font-weight-bold">({{date('d M Y')}})</span>
                    <span class="float-right"><a href="{{route('volontaires.download','tv')}}"><i class="fa fa-download fa-lg text-dark" aria-hidden="true"></i></a></span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover  shadow   bg-white rounded ">
                        <thead class="table-borderless">
                        <tr class="text-left">
                            <th class="col-md-5">Nom & Prenom Volontaire</th>
                            <th class="">Role</th>
                            <th class="">Site d'Affectation</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @if($today_volontaires->count()==0)
                            <tr>
                                <td colspan="3">
                                    <div class="text-muted text-center font-weight-bolder m-auto  ">
                                        <i class='fas fa-exclamation-triangle fa-flip'></i> <span>Aucun Volontaire n'est Enregistré Aujourd'hui!</span>
                                    </div>
                                </td>
                            </tr>
                        @else
                            @foreach($today_volontaires as $tv)
                                <tr class="text-left">
                                    <td class="col-md-1"><a href="{{route('volontaires.show',$tv->id)}}"
                                                            class="text-decoration-none  text-dark font-weight-bolder">{{$tv->participant->nom_par}} {{$tv->participant->prenom_par}}</a>
                                    </td>
                                    <td class="col-md-2">{{$tv->role}}</td>
                                    <td class="col-md-3">{{$tv->site_aff}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-6 mt-xl-5">
                <div class="alert alert-danger bg-gradient-lime mb-0 p-1" role="alert">
                    <i class="fas fa-user-tag fa-lg fa-beat-fade" style="color: #160a0d"></i> <span
                        class="text-dark font-weight-bold">Les 5 Derniers Volonraires Ajoutés</span>
                    <span class="float-right"><a href="{{route('volontaires.download','lv')}}"><i class="fa fa-download fa-lg text-dark" aria-hidden="true"></i></a></span>

                </div>
                <div class="table-responsive">
                    <table class="table table-hover  shadow   bg-white rounded">

                        <thead class="table-borderless">
                        <tr>
                            <th class="col-md-4">Nom & Prenom Volontaire</th>
                            <th class="col-md-3">Role</th>
                            <th class="col-md-3">Site Affectation</th>
                            <th class="col-md-3">Date Ajout</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($last_volontaires as $lv)
                            <tr>
                                <td class=""><a href="{{route('volontaires.show',$lv->id)}}"
                                                class="text-decoration-none  text-dark font-weight-bolder">{{$lv->participant->nom_par}} {{$lv->participant->prenom_par}}</a>
                                </td>
                                <td class="">{{$lv->role}}</td>
                                <td class="">{{$lv->site_aff}}</td>
                                <td class="">{{date('d M Y',strtotime($lv->created_at))}}</td>
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
                    <i class="fas fa-user-tag fa-lg fa-beat-fade "></i> <span class="text-dark font-weight-bold">Expiration de contrat d'aujourd'hui</span>
                    <span class="float-right"><a href="{{route('volontaires.download','tfc')}}"><i class="fa fa-download fa-lg text-dark" aria-hidden="true"></i></a></span>
                </div>
                <table class="table table-hover  shadow   bg-white rounded">
                    <thead class="">
                    <tr class="text-left text-dark">
                        <th class="col-md-4">Nom & Prenom Volontaire</th>
                        <th class="col-md-3">Role</th>
                        <th class="col-md-3">Site Affectation</th>
                        <th class="col-md-3">Date Ajout</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($today_fincontrat->count()==0)
                        <tr>
                            <td colspan="4">
                                <div class="text-muted text-center font-weight-bolder m-auto  ">
                                    <i class='fas fa-exclamation-triangle fa-flip '></i> <span>Statistique indisponible!</span>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach($today_fincontrat as $tfc)
                            <tr class="text-left">
                                <td class=""><a href="#"
                                                class="text-decoration-none  text-dark font-weight-bolder">{{$tfc->participant->nom_par}} {{$tfc->participant->prenom_par}}</a>
                                </td>
                                <td class="">{{$tfc->role}}</td>
                                <td class="">{{$tfc->site_aff}}</td>
                                <td class="">{{date('d M Y',strtotime($tfc->created_at))}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col-6 mt-3">
                <div class="alert alert-success mb-0 p-1" role="alert">
                    <i class="fas fa-user-tag fa-lg fa-beat-fade "></i> <span class="text-dark font-weight-bold">Debut de contrat d'aujourd'hui</span>
                    <span class="float-right"><a href="{{route('volontaires.download','tdc')}}"><i class="fa fa-download fa-lg text-dark" aria-hidden="true"></i></a></span>
                </div>
                <table class="table table-hover  shadow   bg-white rounded">
                    <thead class="">
                    <tr class="text-left text-dark">
                        <th class="col-md-4">Nom & Prenom Volontaire</th>
                        <th class="col-md-3">Role</th>
                        <th class="col-md-3">Site Affectation</th>
                        <th class="col-md-3">Date Ajout</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($today_debutcontrat->count()==0)
                        <tr>
                            <td colspan="4">
                                <div class="text-muted text-center font-weight-bolder m-auto  ">
                                    <i class='fas fa-exclamation-triangle fa-flip '></i> <span>Statistique indisponible!</span>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach($today_debutcontrat as $tdc)
                            <tr class="text-left">
                                <td class=""><a href="#"
                                                class="text-decoration-none  text-dark font-weight-bolder">{{$tdc->participant->nom_par}} {{$tdc->participant->prenom_par}}</a>
                                </td>
                                <td class="">{{$tdc->role}}</td>
                                <td class="">{{$tdc->site_aff}}</td>
                                <td class="">{{date('d M Y',strtotime($tdc->created_at))}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
