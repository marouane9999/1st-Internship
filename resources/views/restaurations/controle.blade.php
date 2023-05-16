@extends('layout')
@section('header title',' Controle Restaurations ')
@section('content')

    <div class="container">
        <div class="row">
            <div class="float-end">
                <a class="btn btn-success bg-gradient-primary rounded-pill  mb-2"
                   href="{{route('restaurations.controle.edit')}}"><i class="fas fa-clipboard-check"></i>&nbsp;&nbsp;Validation Des Réservations </a></div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-5 text-left ">
                <div class="alert alert-primary mb-0 p-1" role="alert">
                    <i class="fas fa-square-check fa-lg fa-fade mr-1 "></i> <span
                        class="text-dark font-weight-bold">Les Reservations Validés </span>
                </div>
                <table
                    class="table table-borderless table-bordered table-hover w-100 mt-2 shadow-lg mb-5 bg-white rounded">
                    <thead class="table-secondary">
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Numéro de restauration</th>
                        <th scope="col">Participant</th>
                        <th scope="col">Site de restauration</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Prestataire</th>
                        <th scope="col">Catégorie de repas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($restv as $restau)
                        <tr class="text-center">
                            <th scope="row">{{$restau->id}}</th>
                            <td>{{$restau->numero_rest}}</td>
                            <td>{{$restau->participant->nom_par}}  {{$restau->participant->prenom_par}}</td>
                            <td>{{$restau->site_restau}}</td>
                            <td>{{$restau->ville}}</td>
                            <td>{{$restau->prestataire}}</td>
                            <td>{{$restau->repas->des_rep}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $restv->withQueryString()->links() }}
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 mt-2 text-left ">
                <div class="alert alert-danger bg-red text-white mb-0 p-1" role="alert">
                    <i class="fas fa-xmark fa-lg fa-fade mr-1 "></i> <span
                        class="text-light font-weight-bold">Les Reservations Non Validés </span>
                </div>

                <table
                    class="table table-borderless table-bordered table-hover w-100 mt-2 shadow-lg mb-5 bg-white rounded  ">
                    <thead class="table-secondary">
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Numéro de restauration</th>
                        <th scope="col">Participant</th>
                        <th scope="col">Site de restauration</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Prestataire</th>
                        <th scope="col">Catégorie de repas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($restnv as $restau)
                        <tr class="text-center">
                            <th scope="row">{{$restau->id}}</th>
                            <td>{{$restau->numero_rest}}</td>
                            <td>{{$restau->participant->nom_par}}  {{$restau->participant->prenom_par}}</td>
                            <td>{{$restau->site_restau}}</td>
                            <td>{{$restau->ville}}</td>
                            <td>{{$restau->prestataire}}</td>
                            <td>{{$restau->repas->des_rep}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>


@endsection




