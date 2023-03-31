@extends('layout')
@section('header title','Restauration / Consulter Restauration    #' . $restau->id)
@section('content')

    <div class="container shadow-sm p-3 mb-5  rounded">

        <div class="d-flex justify-content-center m-auto w-75">
            <h1 class="display-3 text-black">Restauration<span
                    class="display-2 text-blue font-weight-bolder">&nbsp; #{{$restau->id}}</span></h1>
        </div>
        {{--        Restauration--}}
        <div class="alert alert-default-success shadow-sm mt-3 " role="alert">
            <i class='fas fa-utensils '></i><span class="ml-3 font-weight-bold">Restauration</span>
        </div>
        <div class="shadow-lg p-1 mt-3 mb-3 w-100 d-flex ">
            <div class="row w-100 d-flex justify-content-center ml-5">
                <div class="col-4">
                    <div class="font-weight-bolder">
                        Numéro de restauration: <span class="font-weight-normal">{{$restau->numero_rest}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Site de restauration: <span class="font-weight-normal">{{$restau->site_restau}}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="font-weight-bolder">
                        Ville: <span class="font-weight-normal">{{$restau->ville}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Prestataire: <span class="font-weight-normal">{{$restau->prestataire}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Catégorie de repas: <span class="font-weight-normal">{{$restau->repas->des_rep}}</span>
                    </div>
                </div>


            </div>
        </div>
        {{--            Participant--}}
        <div class="alert alert-dark shadow-sm" role="alert">
            <i class='fas fa-id-badge'></i><span class="ml-3 font-weight-bold">Participant</span>
        </div>
        <div class="shadow-lg p-1 mt-3 mb-3 w-100 d-flex ">
            <div class="row w-100 d-flex justify-content-center ml-5">
                <div class="col-4">
                    <div class="font-weight-bolder">
                        Nom Participant : <span class="font-weight-normal">{{$restau->participant->nom_par}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Prénom Participant : <span
                            class="font-weight-normal">{{$restau->participant->prenom_par}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Sexe : <span
                            class="font-weight-normal">{{{$restau->participant->genre==1?'Homme':'Femme'}}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Discipline : <span
                            class="font-weight-normal">{{{ucfirst($restau->participant->discipline)}}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Categorie : <span
                            class="font-weight-normal">{{{ucfirst($restau->participant->categorie->des_cat)}}}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="font-weight-bolder">
                        Numero Passport : <span class="font-weight-normal">{{$restau->participant->num_pass}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Numero Accreditation : <span class="font-weight-normal">{{$restau->participant->num_acc}}</span>
                    </div>
                    <div class="font-weight-bolder">
                        Pays Delegation : <span class="font-weight-normal">
                    @foreach($countries as $key => $country)
                                @if($restau->participant->pays_delg==$key)
                                    {{$country}}
                                @endif
                            @endforeach
                </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
