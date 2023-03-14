@extends('layout')
@section('content')

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-3">
            <a class="btn btn-success me-md-2 rounded-pill " type="button" href="{{route('participants.create')}}">Ajouter Participant</a>
        </div>
    <div class="d-flex justify-content-center mt-4 w-100">
        <table class="table table-borderless table-bordered table-hover w-100 ">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nom Participant</th>
                <th scope="col">Prenom Participant</th>
                <th scope="col">Genre</th>
                <th scope="col">Discipline</th>
                <th scope="col">Numero Passport</th>
                <th scope="col">Numero Accreditation</th>
                <th scope="col">Pays Delegation</th>
                <th scope="col">Categorie</th>
                <th scope="col">Site Competition</th>
                <th scope="col">Chef de Mission</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($participants as $ptc )
            <tr class="text-center">
                    <th scope="row">{{$ptc->id}}</th>
                    <td>{{$ptc->nom_par}}</td>
                    <td>{{$ptc->prenom_par}}</td>
                    <td>{{$ptc->genre}}</td>
                    <td>{{$ptc->discipline}}</td>
                    <td>{{$ptc->num_pass}}</td>
                    <td>{{$ptc->num_acc}}</td>
                    <td>{{$ptc->pays_delg}}</td>
                    <td>{{$ptc->cat_particip}}</td>
                    <td>{{$ptc->site_compet}}}</td>
                    <td>{{$ptc->chef_mission->nom_chef}}</td>
                    <td>
                        <a class="btn btn-primary rounded-pill btn-xs" href="#" >CONSULTER</a>
                    </td>
            </tr>
            @endforeach



            </tbody>
        </table>

    </div>

@endsection
