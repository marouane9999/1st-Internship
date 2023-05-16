@extends('layout')
@section('header title',' Controle Vol ')
@section('content')

    <div class="container">
        <div class="row">
            <div class="float-end">
                <a class="btn btn-success bg-danger rounded-pill  mb-2"
                   href="{{route('volontaires.controle.edit')}}"><i class="fas fa-clipboard-check"></i>&nbsp;&nbsp;Enregistrement des Abscences </a></div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-5 text-left ">
                <div class="alert alert-primary mb-0 p-1" role="alert">
                    <i class="fas fa-user-xmark fa-lg fa-fade mr-1 "></i> <span
                        class="text-dark font-weight-bold">Les Volontaires Present</span>
                </div>
                <table
                    class="table table-borderless table-bordered table-hover w-100 mt-2 shadow-lg mb-5 bg-white rounded">
                    <thead class="table-secondary">
                    <tr class="text-center">
                        <th scope="col">Reference Cojar</th>
                        <th scope="col">Nom & prenom</th>
                        <th scope="col">Date Debut Contrat</th>
                        <th scope="col">Date Fin Contrat</th>
                        <th scope="col">Site Affectation</th>
                        <th scope="col">Role</th>
                    <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($voltpr as $volontaire)
                        <tr class="text-center">
                            <th scope="row">{{$volontaire->ref_cojar}}</th>
                            <td>{{$volontaire->participant->nom_par}} {{$volontaire->participant->prenom_par}}</td>
                            <td>{{$volontaire->debut_contrat}}</td>
                            <td>{{$volontaire->fin_contrat}}</td>
                            <td>{{$volontaire->site_aff}}</td>
                            <td>{{$volontaire->role}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $voltpr->withQueryString()->links() }}
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 mt-2 text-left ">
                <div class="alert alert-danger bg-red text-white mb-0 p-1" role="alert">
                    <i class="fas fa-xmark fa-lg fa-fade mr-1 "></i> <span
                        class="text-light font-weight-bold">Les Abscences des Volontaires </span>
                </div>

                <table
                    class="table table-borderless table-bordered table-hover w-100 mt-2 shadow-lg mb-5 bg-white rounded">
                    <thead class="table-secondary">
                    <tr class="text-center">
                        <th scope="col">Reference Cojar</th>
                        <th scope="col">Nom & prenom</th>
                        <th scope="col">Date Debut Contrat</th>
                        <th scope="col">Date Fin Contrat</th>
                        <th scope="col">Site Affectation</th>
                        <th scope="col">Role</th>
                        <th scope="col">Date D'Abscence</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($voltabs as $volontaire)
                        <tr class="text-center">
                            <th scope="row">{{$volontaire->ref_cojar}}</th>
                            <td>{{$volontaire->participant->nom_par}} {{$volontaire->participant->prenom_par}}</td>
                            <td>{{$volontaire->debut_contrat}}</td>
                            <td>{{$volontaire->fin_contrat}}</td>
                            <td>{{$volontaire->site_aff}}</td>
                            <td>{{$volontaire->role}}</td>
                            <td>{{date('d M Y', strtotime($volontaire->updated_at))}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>


@endsection




