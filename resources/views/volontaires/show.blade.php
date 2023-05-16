@extends('layout')
@section('header title','Restauration / Consulter Volontaire    #' . $volontaire->id)
@section('content')

    <div class="container shadow-sm p-3 mb-5  rounded w-75 mt-5">

        <div class="d-flex justify-content-center m-auto w-75">
            <h1 class="display-3 text-black fw-bolder">Volontaire<span
                    class="display-2 text-blue font-weight-bolder">&nbsp; #{{$volontaire->ref_cojar}}</span></h1>
        </div>
        {{--Volontaire--}}
        <div class="alert alert-default-success shadow-sm mt-3 " role="alert">
            <i class="nav-icon fas fa-user-tag"></i><span class="ml-3 font-weight-bold">Volontaire</span>
        </div>
        <div class="shadow-lg p-1 mt-3 mb-3 w-100 d-flex ">
            <div class="row w-100 d-flex justify-content-center ml-5">
                <div class="col-4">
                    <div class="font-weight-bolder">
                        Nom & Prenom: <span
                            class="font-weight-normal">{{$volontaire->participant->nom_par}} {{$volontaire->participant->prenom_par}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Ref COJAR : <span class="font-weight-normal">{{$volontaire->ref_cojar}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Telephone : <span class="font-weight-normal">{{$volontaire->tel}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Site Affectation : <span class="font-weight-normal">{{$volontaire->site_aff}}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="font-weight-bolder">
                        Date Debut Contrat : <span class="font-weight-normal">{{$volontaire->debut_contrat}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Date Fin contrat : <span class="font-weight-normal">{{$volontaire->fin_contrat}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Role : <span class="font-weight-normal">{{$volontaire->role}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Pays Delegation : <span class="font-weight-normal">
                             @foreach($countries as $key => $country)
                                @if($volontaire->participant->pays_delg==$key)
                                    {{$country}}
                                @endif
                            @endforeach
                        </span>
                    </div>

                </div>


            </div>
        </div>
        {{--Chef Mission--}}
        <div class="alert alert-dark shadow-sm" role="alert">
            <i class='fas fa-id-badge'></i><span class="ml-3 font-weight-bold">Chef Mission</span>
        </div>
        <div class="shadow-lg p-1 mt-3 mb-3 w-100 d-flex ">
            <div class="row w-100 d-flex justify-content-center ml-5">
                <div class="col-4">
                    <div class="font-weight-bolder">
                        Nom : <span
                            class="font-weight-normal">{{$volontaire->participant->chef_mission->nom_chef}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Prenom : <span
                            class="font-weight-normal">{{$volontaire->participant->chef_mission->prenom_chef}}</span>
                    </div>

                </div>
                <div class="col-6">
                    <div class="font-weight-bolder">
                        Telephone : <span
                            class="font-weight-normal">{{$volontaire->participant->chef_mission->tel}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Numero Passport : <span
                            class="font-weight-normal">{{$volontaire->participant->chef_mission->num_passport}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
