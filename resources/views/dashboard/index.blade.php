@extends('layout')
@section('header title','Dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$count_ptc}}</h3>
                        <p>Total des Participants</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-alt fa-beat-fade"></i>
                    </div>
                    <a href="{{route('participants.index')}}" class="small-box-footer">Plus d'informations <i
                            class="fas fa-arrow-circle-right "></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$count_volontaire}}</h3>
                        <p>Total des Volontaires</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tag fa-beat-fade"></i>
                    </div>
                    <a href="{{route('volontaires.index')}}" class="small-box-footer">Plus d'informations <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="small-box bg-fuchsia">
                    <div class="inner">
                        <h3>{{$count_chefm}}</h3>
                        <p>Total des Chefs Mission</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie fa-beat-fade"></i>
                    </div>
                    <a href="#" class="small-box-footer">Plus d'informations <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{$count_rest}}</h3>
                        <p>Total des Réstaurations</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-utensils fa-beat-fade"></i>
                    </div>
                    <a href="{{route('restaurations.index')}}" class="small-box-footer">Plus d'informations <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="small-box bg-cyan">
                    <div class="inner">
                        <h3>{{$count_hbg}}</h3>
                        <p>Total des Hébergements</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hotel fa-beat-fade"></i>
                    </div>
                    <a href="{{route('hebergements.index')}}" class="small-box-footer">Plus d'informations <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="small-box  bg-gradient-dark">
                    <div class="inner">
                        <h3>{{$count_vol}}</h3>
                        <p>Total des vols</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-plane fa-beat-fade"></i>
                    </div>
                    <a href="{{route('vols.index')}}" class="small-box-footer">Plus d'informations <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 mt-lg-5 ">
                <div class="alert alert-warning mb-0 p-1" role="alert">
                    <i class="fas fa-users fa-fade mr-2 "></i> <span class="text-dark font-weight-bold">Les 5 Dernièrs Participants </span>
                </div>
                <table class="table table-hover  shadow   bg-white rounded">
                    <thead class="bg-gradient-orange text-light">
                    <tr class="text-left">
                        <th class="col-3">Nom & prénom</th>
                        <th class="">Discipline</th>
                        <th class="">Pays Délégation</th>
                    </tr>
                    </thead>
                    <tbody class="text-left">
                    @foreach($participants as $ptc)
                        <tr class="text-left">
                            <td class="col-md-2"><a href="{{route('participants.show',$ptc->id)}}"
                                                    class="text-decoration-none   text-dark font-weight-bold">{{$ptc->nom_par}} {{$ptc->prenom_par}}</a>
                            </td>
                            <td class="col-md-2">{{$ptc->discipline}}</td>
                            <td class="col-md-2">{{config('custom_arrays.countries.'.$ptc->pays_delg)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-6 mt-lg-5 ">
                <div class="alert alert-danger mb-0 p-1" role="alert">
                    <i class="fas fa-user-tag fa-fade mr-2 "></i> <span class="text-dark font-weight-bold">Les 5 Dernièrs Volontaires </span>
                </div>
                <table class="table table-hover  shadow   bg-white rounded">
                    <thead class="bg-gradient-danger">
                    <tr class="text-left">
                        <th class="col-3">Nom & Prenom</th>
                        <th class="">Role</th>
                        <th class="">Site d'affectation</th>
                    </tr>
                    </thead>
                    <tbody class="text-left">
                    @foreach($volontaires as $volontaire)
                        <tr class="text-left">
                            <td class="col-md-2"><a href="{{route('volontaires.show',$volontaire->id)}}"
                                                    class="text-decoration-none   text-dark font-weight-bold">{{$volontaire->participant->nom_par}} {{$volontaire->participant->prenom_par}}</a>
                            </td>
                            <td class="col-md-2">{{$volontaire->role}}</td>
                            <td class="col-md-2">{{$volontaire->site_aff}}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>

    </div>

@endsection
