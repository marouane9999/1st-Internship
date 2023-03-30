@extends('layout')
@section('header title','Vol / Consulter Vol    #' . $vol->numero_vol)

@section('content')

    <div class="container shadow-sm p-3 mb-5  rounded mt-4">
        <div class="d-flex justify-content-center m-auto w-75 mb-2 mt-4">
            <h1 class="shadow-lg p-3 mb-5 bg-gradient-light rounded font-weight-bolder text-dark">Vol  #{{$vol->numero_vol}}</span></h1>
        </div>
        {{--Vol--}}
        <div class="alert alert-primary shadow-sm" role="alert">
            <i class='fas fa-plane'></i><span class="ml-3 font-weight-bold">Vol</span>
        </div>
        <div class="shadow-lg p-1 mt-3  mb-3 w-100 d-flex ">
            <div class="row w-100 d-flex justify-content-center ml-5">
                <div class="col-4">
                    <div class="font-weight-bolder mb-2">
                        Numero de vol : <span class="font-weight-normal">{{$vol->numero_vol}}</span>
                    </div>
                    <div class="font-weight-bolder mb-2">
                        Terminal/Aeoroport : <span class="font-weight-normal">{{$vol->terminal}}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="font-weight-bolder mb-2">
                        Type Vol : <span
                            class="font-weight-normal">{{$vol->type_vol ? 'Vol Depart':'Vol Arrive'}}</span>
                    </div>
                    <div class="font-weight-bolder mb-2">
                        Date Vol : <span class="font-weight-normal">{{$vol->date_vol}}</span>
                    </div>
                </div>
            </div>
        </div>
        {{--Participants--}}

        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
           aria-controls="collapseExample" class="text-decoration-none">
            <div class="alert alert-success shadow-sm" role="alert">
                <i class='fas fa-users'></i><span class="ml-3 font-weight-bold">Participants</span>
            </div>
        </a>
        @if($vol->participants->count()==0)
            <p class="text-muted text-center font-weight-bolder">
                <i class='fas fa-exclamation-triangle fa-flip'></i> Aucun Participant est Affecté à Ce vol !
            </p>
        @else
            <div class="collapse show" id="collapseExample">
                <div class="d-flex justify-content-center">
                    <table class=" table table-light table-hover w-50 text-left border-7">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom & Prenom</th>
                            <th scope="col">Numero Passport</th>
                            <th scope="col">Pays Delegation</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vol->participants as $ptc)
                            <tr>
                                <th scope="row">{{$ptc->id}}</th>
                                <td>{{ucfirst($ptc->prenom_par)}} {{ucfirst($ptc->prenom_par)}}</td>
                                <td>{{$ptc->num_pass}}</td>
                                @foreach($countries as $key => $country)
                                    @if($ptc->pays_delg == $key )
                                        <td>{{ucfirst($country)}}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

@endsection



