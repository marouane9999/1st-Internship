{{--@extends('layout')--}}
{{--@section('content')--}}

{{--    <div class="container shadow-sm p-3 mb-5  rounded">--}}

{{--    <div class="d-flex justify-content-center m-auto w-75">--}}
{{--            <h1 class="display-3 text-black">Hébergement<span class="display-2 text-blue font-weight-bolder">&nbsp; #{{$heberg->id}}</span> </h1>--}}
{{--    </div>--}}
{{--        --}}{{--Hebergement--}}
{{--        <div class="alert alert-default-success shadow-sm mt-3 " role="alert">--}}
{{--            <i class='fas fa-bed'></i><span class="ml-3 font-weight-bold">Hébergement</span>--}}
{{--        </div>--}}
{{--        <div class="shadow-lg p-1 mt-3 mb-3 w-100 d-flex ">--}}
{{--            <div class="row w-100 d-flex justify-content-center ml-5">--}}
{{--                <div class="col-4">--}}
{{--                    <div class="font-weight-bolder">--}}
{{--                        Site d' hébergement: <span class="font-weight-normal">{{$heberg->site_heberg}}</span>--}}
{{--                    </div>--}}
{{--                    <div class="font-weight-bolder">--}}
{{--                        Type de chambre : <span class="font-weight-normal">{{$heberg->type_cham==1?'Single':'Double'}}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-6">--}}
{{--                    <div class="font-weight-bolder">--}}
{{--                        Date Check in : <span class="font-weight-normal">{{$heberg->date_checkin}}</span>--}}
{{--                    </div>--}}
{{--                    <div class="font-weight-bolder">--}}
{{--                        Date Check out : <span class="font-weight-normal">{{$heberg->date_checkout}}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--        </div>--}}
{{--            --}}{{--Participant--}}
{{--        <div class="alert alert-dark shadow-sm" role="alert">--}}
{{--            <i class='fas fa-id-badge'></i><span class="ml-3 font-weight-bold">Participant</span>--}}
{{--        </div>--}}
{{--        <div class="shadow-lg p-1 mt-3 mb-3 w-100 d-flex ">--}}
{{--            <div class="row w-100 d-flex justify-content-center ml-5">--}}
{{--                <div class="col-4">--}}
{{--                    <div class="font-weight-bolder">--}}
{{--                        Nom Participant : <span class="font-weight-normal">{{$heberg->participant->nom_par}}</span>--}}
{{--                    </div>--}}
{{--                    <div class="font-weight-bolder">--}}
{{--                        Prenom Participant : <span class="font-weight-normal">{{$heberg->participant->prenom_par}}</span>--}}
{{--                    </div>--}}
{{--                    <div class="font-weight-bolder">--}}
{{--                        Sexe : <span class="font-weight-normal">{{{$heberg->participant->genre==1?'Homme':'Femme'}}}</span>--}}
{{--                    </div>--}}
{{--                    <div class="font-weight-bolder">--}}
{{--                        Discipline : <span class="font-weight-normal">{{{ucfirst($heberg->participant->discipline)}}}</span>--}}
{{--                    </div>--}}
{{--                    <div class="font-weight-bolder">--}}
{{--                        Categorie : <span class="font-weight-normal">{{{ucfirst($heberg->participant->categorie->des_cat)}}}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-6">--}}
{{--                    <div class="font-weight-bolder">--}}
{{--                        Numero Passport : <span class="font-weight-normal">{{$heberg->participant->num_pass}}</span>--}}
{{--                    </div>--}}
{{--                    <div class="font-weight-bolder">--}}
{{--                        Numero Accreditation : <span class="font-weight-normal">{{$heberg->participant->num_acc}}</span>--}}
{{--                    </div>--}}
{{--                    <div class="font-weight-bolder">--}}
{{--                        Pays Delegation : <span class="font-weight-normal">--}}
{{--                    @foreach($countries as $key => $country)--}}
{{--                                @if($heberg->participant->pays_delg==$key)--}}
{{--                                    {{$country}}--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                </span>--}}
{{--                    </div>--}}
{{--                    <div class="font-weight-bolder">--}}
{{--                        Discipline : <span class="font-weight-normal">{{{ucfirst($heberg->participant->discipline)}}}</span>--}}
{{--                    </div>--}}
{{--                    <div class="font-weight-bolder">--}}
{{--                        Categorie : <span class="font-weight-normal">{{{ucfirst($heberg->participant->categorie->des_cat)}}}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
