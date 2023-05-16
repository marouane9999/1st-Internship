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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-4 ml-6 ">
                    <form method="get" action="{{route('volontaires.search','roles')}}">
                        @csrf
                        <label>Par Role</label>
                        <select class="form-select form-select mb-1" name="role" aria-label=".form-select-lg example">
                            <option selected>Chercher par Role</option>
                            @foreach($roles as $role)
                                <option value={{$role}}>{{{ucfirst($role)}}}</option>
                            @endforeach
                        </select>

                        <input type="submit" class="btn btn-danger float-right rounded-pill" value="Chercher">
                    </form>
                </div>

                <div class="col-4 ">
                    <form method="get" action="{{route('volontaires.search','site_aff')}}">
                        @csrf
                        <label>Par Site d'affectation</label>
                        <select class="form-select form-select mb-1" name="site_aff" aria-label=".form-select-lg example">
                            <option selected>Chercher par Site d'affectation</option>
                            @foreach($site_aff as $sa)
                                <option value="{{$sa}}">{{ucfirst($sa)}}
                                </option>
                            @endforeach
                        </select>

                        <input type="submit" class="btn btn-danger float-right rounded-pill" value="Chercher">
                    </form>
                </div>

            </div>
        </div>



        <div class="mt-5 m-auto w-75 ">
            @if(\Illuminate\Support\Facades\Auth::user()->hasRole(['chef_equipe','admin']))
            <a class="btn btn-success me-md-2 rounded-pill bg-gradient-success float-right mb-2 create-volontaire"
               href="{{route('volontaires.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un Volontaire</a>
            @endif
            <table
                class="table table-borderless table-bordered table-hover w-100 mt-2 shadow-lg mb-5 bg-white rounded  ">
                <thead class="thead-dark">
                <tr class="text-left">
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
                @foreach($volontaires as $volontaire)
                    <tr class="text-left">
                        <th scope="row">{{$volontaire->ref_cojar}}</th>
                        <td>{{$volontaire->participant->nom_par}} {{$volontaire->participant->prenom_par}}</td>
                        <td>{{$volontaire->debut_contrat}}</td>
                        <td>{{$volontaire->fin_contrat}}</td>
                        <td>{{$volontaire->site_aff}}</td>
                        <td>{{$volontaire->role}}</td>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole(['chef_equipe','admin']))
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
                        @endif
                    </tr>

                @endforeach

                </tbody>
            </table>

                <div class="d-flex justify-content-center">
                    {{ $volontaires->withQueryString()->links() }}
                </div>
        </div>


    @endif

@endsection

