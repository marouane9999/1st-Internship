@extends('layout')
@section('header title','Participant / Consulter Participant    #' . $ptc->id)

@section('content')

    <div class="container shadow-sm p-3 mb-5  rounded">

        <div class="d-flex justify-content-center m-auto w-75 mb-3 p-2">
            <h1><span
                    class="shadow-lg p-3 mb-5 bg-gradient-light rounded font-weight-bolder text-dark">{{$ptc->nom_par}} {{$ptc->prenom_par}}</span>
            </h1>
        </div>
        {{--Participant--}}
        <div class="alert alert-primary shadow-sm" role="alert">
            <i class='fas fa-id-badge'></i><span class="ml-3 font-weight-bold">Participant</span>
        </div>
        <div class="shadow-lg p-1 mt-3 mb-3 w-100 d-flex ">
            <div class="row w-100 d-flex justify-content-center ml-5">
                <div class="col-4">
                    <div class="font-weight-bolder mb-2">
                        Nom Participant : <span class="font-weight-normal">{{$ptc->nom_par}}</span>
                    </div>
                    <div class="font-weight-bolder mb-2">
                        Prénom Participant : <span class="font-weight-normal">{{$ptc->prenom_par}}</span>
                    </div>
                    <div class="font-weight-bolder mb-2">
                        Sexe : <span class="font-weight-normal">{{{$ptc->genre==1?'Homme':'Femme'}}}</span>
                    </div>
                    <div class="font-weight-bolder mb-2">
                        Discipline : <span class="font-weight-normal">{{{ucfirst($ptc->discipline)}}}</span>
                    </div>
                    <div class="font-weight-bolder mb-2">
                        Categorie : <span class="font-weight-normal">{{{ucfirst($ptc->categorie->des_cat)}}}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="font-weight-bolder mb-2">
                        Numero Passport : <span class="font-weight-normal">{{$ptc->num_pass}}</span>
                    </div>
                    <div class="font-weight-bolder mb-2">
                        Numero Accreditation : <span class="font-weight-normal">{{$ptc->num_acc}}</span>
                    </div>
                    <div class="font-weight-bolder mb-2">
                        Pays Delegation : <span class="font-weight-normal">
                    @foreach($countries as $key => $country)
                                @if($ptc->pays_delg==$key)
                                    {{$country}}
                                @endif
                            @endforeach
                </span>
                    </div>
                </div>
            </div>
        </div>
        {{--ChefMission--}}
        <div class="alert alert-dark shadow-sm " role="alert">
            <i class='fas fa-user-circle'></i><span class="ml-3 font-weight-bold">Chef Mission</span>
        </div>
        <div class="shadow-lg p-1 mt-3 mb-3 w-100 d-flex justify-content-center">
            <div class="row w-100 d-flex justify-content-center ml-5">
                <div class="col-4">
                    <div class="font-weight-bolder mb-2">
                        Nom Chef mission : <span
                            class="font-weight-normal">{{ucfirst($ptc->chef_mission->nom_chef)}}</span>
                    </div>
                    <div class="font-weight-bolder mb-2">
                        Prénom Chef mission : <span
                            class="font-weight-normal">{{ucfirst($ptc->chef_mission->nom_chef)}}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="font-weight-bolder mb-2">
                        Numero Passport : <span class="font-weight-normal">{{$ptc->num_pass}}</span>
                    </div>
                    <div class="font-weight-bolder mb-2">
                        Telephone Chef Mission : <span class="font-weight-normal">{{$ptc->num_acc}}</span>
                    </div>
                </div>
            </div>
        </div>
        {{--Hebergement--}}
        <div class="alert alert-secondary shadow-sm" role="alert">
            <i class='fas fa-hotel'></i><span class="ml-3 font-weight-bold">Hebergement</span>
        </div>

        <div class="shadow-lg p-1 mt-3 mb-3 w-100 d-flex ">
            <div class="row w-100 d-flex justify-content-center ml-5">
                @foreach($hebergements as $hebergement)
                    @if($hebergement->participant_id==$ptc->id && $hebergement==true)
                        <div class="col-4">
                            <div class="font-weight-bolder mb-2">
                                Site Hebergement : <span class="font-weight-normal">{{$hebergement->site_heberg}}</span>
                            </div>
                            <div class="font-weight-bolder mb-2">
                                Type Chambre : <span
                                    class="font-weight-normal">{{$hebergement->type_cham==1?'Single':'Double'}}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="font-weight-bolder mb-2">
                                Date Check Out : <span class="font-weight-normal">{{$hebergement->date_checkin}}</span>
                            </div>
                            <div class="font-weight-bolder mb-2">
                                Date Check In : <span class="font-weight-normal">{{$hebergement->date_checkout}}</span>
                            </div>
                        </div>
                    @else
                        <div class="text-muted text-center font-weight-bolder m-auto p-3  ">
                            <i class='fas fa-exclamation-triangle fa-flip '></i> <span>Ce Participant n'est affecté à  aucun Hébergement</span>
                        </div>
                        @break
                    @endif
                @endforeach
            </div>
        </div>
        {{--Restauration--}}
        <div class="alert alert-info shadow-sm" role="alert">
            <i class="fas fa-utensils"></i><span class="ml-3 font-weight-bold">Restauration</span>
        </div>
        <div class="shadow-lg p-1 mt-3 mb-3 w-100 d-flex ">
            <div class="row w-100 d-flex justify-content-center ml-5">
                @foreach($restaurations as $restauration)
                    @if($restauration->participant_id==$ptc->id && $restauration==true)
                        <div class="col-4">
                            <div class="font-weight-bolder mb-2">
                                Numero Restauration : <span
                                    class="font-weight-normal">{{$restauration->numero_rest}}</span>
                            </div>
                            <div class="font-weight-bolder mb-2">
                                Site Restauration : <span
                                    class="font-weight-normal">{{$restauration->site_restau}}</span>
                            </div>
                            <div class="font-weight-bolder mb-2">
                                Ville : <span class="font-weight-normal">{{$restauration->ville}}</span>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="font-weight-bolder mb-2">
                                Prestataire : <span class="font-weight-normal">{{$restauration->prestataire}}</span>
                            </div>
                            <div class="font-weight-bolder mb-2">
                                Repas : <span class="font-weight-normal">{{$restauration->repas->des_rep}}</span>
                            </div>
                        </div>
                    @else
                        <div class="text-muted text-center font-weight-bolder m-auto p-3  ">
                            <i class='fas fa-exclamation-triangle fa-flip '></i> <span>Ce Participant n'est affecté à  aucune Restauration</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        {{--Vol--}}
        <div class="row w-100 d-flex justify-content-center m-auto">
            @foreach($ptc->vols as $vol_dep)
                <div class="col-6 {{$vol_dep->type_vol?'pl-0': 'pr-5'}} ">
                    <div class="alert alert-default-{{$vol_dep->type_vol ? 'warning':'success'}} shadow-sm mt-3 "
                         role="alert">
                        <i class='fas fa-plane-{{$vol_dep->type_vol ? 'departure':'arrival'}}'></i><span
                            class="ml-3 font-weight-bold">{{$vol_dep->type_vol ? 'Vol Depart':'Vol Arrive'}}</span>
                    </div>
                    <div class="shadow-lg mt-3 w-100 py-1 px-5">
                        <div class="font-weight-bolder mb-2">
                            Numero de Vol : <span class="font-weight-normal">{{ucfirst($vol_dep->numero_vol)}}</span>
                        </div>
                        <div class="font-weight-bolder mb-2">
                            Date de vol : <span class="font-weight-normal">{{ucfirst($vol_dep->date_vol)}}</span>
                        </div>
                        <div class="font-weight-bolder mb-2">
                            Terminal/Aeroport : <span class="font-weight-normal">{{$vol_dep->terminal}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
