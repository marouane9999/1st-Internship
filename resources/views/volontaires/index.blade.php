@extends('layout')
@section('header title','Volontaires')
@section('content')

    @if($volontaires->count()==0)
        <div class="text-muted text-center font-weight-bolder m-auto w-75  ">
            <div class="row w-25 m-auto mt-5">
                <i class='fas fa-exclamation-triangle'></i> <span>Aucun Volontaire n'est Enregistré!</span>
                <a class="btn btn-success rounded-pill bg-gradient-success float-right mb-2 create-volontaire"
                   href="{{route('volontaires.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un
                    Volontaire</a>
            </div>
        </div>
    @else

        <div class="mt-5 m-auto w-75 ">
            <a class="btn btn-success me-md-2 rounded-pill bg-gradient-success float-right mb-2 create-volontaire"
               href="{{route('volontaires.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un Volontaire</a>
            <table
                class="table table-borderless table-bordered table-hover w-100 mt-2 shadow-lg mb-5 bg-white rounded  ">
                <thead>
                <tr class="text-center">
                    <th scope="col">Reference Cojar</th>
                    <th scope="col">Nom & prenom</th>
                    <th scope="col">Date Debut Contrat</th>
                    <th scope="col">Date Fin Contrat</th>
                    <th scope="col">Site Affectation</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($volontaires as $volontaire)
                    <tr class="text-center">
                        <th scope="row">{{$volontaire->ref_cojar}}</th>
                        <td>{{$volontaire->participant->nom_par}} {{$volontaire->participant->prenom_par}}</td>
                        <td>{{$volontaire->debut_contrat}}</td>
                        <td>{{$volontaire->fin_contrat}}</td>
                        <td>{{$volontaire->site_aff}}</td>
                        <td>{{$volontaire->role}}</td>
                        <td>
                            <a class="btn btn-outline-primary rounded-6 mr-2" data-toggle="tooltip" data-placement="top"
                               title="Consulter" href="{{route('volontaires.show',$volontaire->id)}}"><i
                                    class="fas fa-address-card"></i></a>
                            <a class="btn btn-outline-warning rounded-6 mr-2 create-volontaire" data-toggle="tooltip"
                               data-placement="top" title="Modifier"
                               href="{{route('volontaires.edit',$volontaire->id)}}"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-outline-danger rounded-6 mr-2 delete-elm" data-toggle="tooltip"
                               data-placement="top" title="Supprimer"
                               href="{{route('volontaires.delete',$volontaire->id)}}"><i class="fas fa-trash"></i></a>

                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>


    @endif

@endsection

