@extends('layout')
@section('content')

    <div class="container shadow-sm p-3 mb-5  rounded">

    <div class="d-flex justify-content-center m-auto w-75">
            <h1 class="display-3 text-black">Participant  <span class="display-2 text-blue font-weight-bolder">&nbsp; #{{$ptc->id}}</span> </h1>
    </div>
            {{--Participant--}}
        <div class="alert alert-dark shadow-sm" role="alert">
            <i class='fas fa-id-badge'></i><span class="ml-3 font-weight-bold">Participant</span>
        </div>
        <div class="shadow-lg p-1 mt-3 mb-3 w-100 d-flex ">
            <div class="row w-100 d-flex justify-content-center ml-5">
                <div class="col-4">
                    <div class="font-weight-bolder">
                        Nom Participant : <span class="font-weight-normal">{{$ptc->nom_par}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Prenom Participant : <span class="font-weight-normal">{{$ptc->prenom_par}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Sexe : <span class="font-weight-normal">{{{$ptc->genre==1?'Homme':'Femme'}}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Discipline : <span class="font-weight-normal">{{{ucfirst($ptc->discipline)}}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Categorie : <span class="font-weight-normal">{{{ucfirst($ptc->categorie->des_cat)}}}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="font-weight-bolder">
                        Numero Passport : <span class="font-weight-normal">{{$ptc->num_pass}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Numero Accreditation : <span class="font-weight-normal">{{$ptc->num_acc}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Pays Delegation : <span class="font-weight-normal">
                    @foreach($countries as $key => $country)
                                @if($ptc->pays_delg==$key)
                                    {{$country}}
                                @endif
                            @endforeach
                </span>
                    </div>
                    <div class="font-weight-bolder">
                        Discipline : <span class="font-weight-normal">{{{ucfirst($ptc->discipline)}}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Categorie : <span class="font-weight-normal">{{{ucfirst($ptc->categorie->des_cat)}}}</span>
                    </div>
                </div>
            </div>
{{--         <div class=" d-flex justify-content-center mt-4">--}}

{{--             <div class="ml-5 float-left">--}}
{{--                 <div class="font-weight-bolder">--}}
{{--                     Nom Participant : <span class="font-weight-normal">{{$ptc->nom_par}}</span>--}}
{{--                 </div>--}}
{{--                 <div class="font-weight-bolder">--}}
{{--                     Prenom Participant : <span class="font-weight-normal">{{$ptc->prenom_par}}</span>--}}
{{--                 </div>--}}
{{--                 <div class="font-weight-bolder">--}}
{{--                     Sexe : <span class="font-weight-normal">{{{$ptc->genre==1?'Homme':'Femme'}}}</span>--}}
{{--                 </div>--}}
{{--                 <div class="font-weight-bolder">--}}
{{--                     Discipline : <span class="font-weight-normal">{{{ucfirst($ptc->discipline)}}}</span>--}}
{{--                 </div>--}}
{{--                 <div class="font-weight-bolder">--}}
{{--                     Categorie : <span class="font-weight-normal">{{{ucfirst($ptc->categorie->des_cat)}}}</span>--}}
{{--                 </div>--}}
{{--             </div>--}}
{{--             <div class="float-right ">--}}
{{--                 <div class="font-weight-bolder">--}}
{{--                     Numero Passport : <span class="font-weight-normal">{{$ptc->num_pass}}</span>--}}
{{--                 </div>--}}
{{--                 <div class="font-weight-bolder">--}}
{{--                     Numero Accreditation : <span class="font-weight-normal">{{$ptc->num_acc}}</span>--}}
{{--                 </div>--}}
{{--                 <div class="font-weight-bolder">--}}
{{--                     Pays Delegation : <span class="font-weight-normal">--}}
{{--                    @foreach($countries as $key => $country)--}}
{{--                             @if($ptc->pays_delg==$key)--}}
{{--                                 {{$country}}--}}
{{--                             @endif--}}
{{--                         @endforeach--}}
{{--                </span>--}}
{{--                 </div>--}}
{{--                 <div class="font-weight-bolder">--}}
{{--                     Discipline : <span class="font-weight-normal">{{{ucfirst($ptc->discipline)}}}</span>--}}
{{--                 </div>--}}
{{--                 <div class="font-weight-bolder">--}}
{{--                     Categorie : <span class="font-weight-normal">{{{ucfirst($ptc->categorie->des_cat)}}}</span>--}}
{{--                 </div>--}}
{{--             </div>--}}
{{--         </div>--}}
        </div>
            {{--ChefMission--}}
        <div class="alert alert-default-primary shadow-sm " role="alert">
            <i class='fas fa-user-circle'></i><span class="ml-3 font-weight-bold">Chef Mission</span>
        </div>
        <div class="shadow-lg p-1 mt-3 mb-3 w-100 d-flex justify-content-center">
            <div class=" d-flex justify-content-center mt-4">
                <div class=" ml-5 float-left">
                    <div class="font-weight-bolder">
                        Nom Chef mission : <span class="font-weight-normal">{{ucfirst($ptc->chef_mission->nom_chef)}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Prenom Chef mission : <span class="font-weight-normal">{{ucfirst($ptc->chef_mission->nom_chef)}}</span>
                    </div>
                </div>
                <div class="float-right mb-2 ">
                    <div class="font-weight-bolder">
                        Numero Passport : <span class="font-weight-normal">{{$ptc->num_pass}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Telephone Chef Mission : <span class="font-weight-normal">{{$ptc->num_acc}}</span>
                    </div>
                </div>
            </div>
        </div>
            {{--Vol Depart--}}
        <div class="alert alert-default-success shadow-sm mt-3 " role="alert">
            <i class='fas fa-plane-departure'></i><span class="ml-3 font-weight-bold">Vol Depart</span>
        </div>
        <div class="shadow-lg p-1 mt-3 w-100 d-flex justify-content-center">
            <div class=" d-flex justify-content-center mt-4">
                <div class="row ml-5 float-left">
                    <div class="font-weight-bolder">
                        Nom Chef mission : <span class="font-weight-normal">{{ucfirst($ptc->chef_mission->nom_chef)}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Prenom Chef mission : <span class="font-weight-normal">{{ucfirst($ptc->chef_mission->nom_chef)}}</span>
                    </div>
                </div>
                <div class="float-right mb-2 ">
                    <div class="font-weight-bolder">
                        Numero Passport : <span class="font-weight-normal">{{$ptc->num_pass}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Telephone Chef Mission : <span class="font-weight-normal">{{$ptc->num_acc}}</span>
                    </div>
                </div>


            </div>
        </div>
            {{--Vol Arrivee--}}
        <div class="alert alert-default-warning shadow-sm mt-3 " role="alert">
            <i class='fas fa-plane-arrival'></i><span class="ml-3 font-weight-bold">Vol Arrivee</span>
        </div>
        <div class="shadow-lg p-1 mt-3 w-100 d-flex justify-content-center">
            <div class=" d-flex justify-content-center mt-4">
                <div class="row ml-5 float-left">
                    <div class="font-weight-bolder">
                        Nom Chef mission : <span class="font-weight-normal">{{ucfirst($ptc->chef_mission->nom_chef)}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Prenom Chef mission : <span class="font-weight-normal">{{ucfirst($ptc->chef_mission->nom_chef)}}</span>
                    </div>
                </div>
                <div class="float-right mb-2 ">
                    <div class="font-weight-bolder">
                        Numero Passport : <span class="font-weight-normal">{{$ptc->num_pass}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Telephone Chef Mission : <span class="font-weight-normal">{{$ptc->num_acc}}</span>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
