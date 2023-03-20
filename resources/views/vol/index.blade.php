@extends('layout')

@section('content')
<table class="table text-sm" >
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom participant </th>
        <th scope="col">Prenom participant</th>
        <th scope="col">Genre</th>
        <th scope="col">Discipline</th>
        <th scope="col">Numero Passeport </th>
        <th scope="col">Pays Delegation</th>
        <th scope="col">Catégorie Participant </th>
        <th scope="col">Site compétition </th>
        <th scope="col">Chef de Mission</th>
        <th scope="col">Action </th>

    </tr>
    </thead>
    <tbody>
    <tr>

        <th scope="row"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="col-5"><a href="{{route('vol.create')}}" class="badge badge-success">Affecter un vol</a>


    </tr>

    </tbody>
</table>
@endsection
