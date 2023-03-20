@extends('layout')
@section('content')

{{--    <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-3">--}}
{{--        <a class="btn btn-success me-md-2 rounded-pill " type="button" href="{{route('participants.create')}}">Ajouter Participant</a>--}}
{{--    </div>--}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-3">
        <a href="{{route('vol.create')}}"  class="btn btn-success me-md-2 rounded-pill create-vol">
            Ajouter un vol
        </a>
    </div>
    <div class="d-flex justify-content-center mt-4 w-100">
        <table class="table table-borderless table-bordered table-hover w-100 ">
            <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Numéro de vol</th>
                <th scope="col">Type</th>
                <th scope="col">Date</th>
                <th scope="col">Aéroport</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vols as $vol)
                <tr class="text-center">
                    <th scope="row">{{$vol->id}}</th>
                    <td>{{$vol->numero_vol}}</td>
                    <td>{{$vol->type_vol==1?'Arrivée':'Départ'}}</td>
                    <td>{{$vol->date_vol}}</td>
                    <td>{{$vol->terminal}}</td>

                    <td>
                        <a  class="btn btn-outline-primary rounded-6 mr-2" data-toggle="tooltip" data-placement="top" title="Affecter" href="#" ><i class="fas fa-address-card"></i></a>
                        <a class="btn btn-outline-warning rounded-6 mr-2 create-vol" data-toggle="tooltip" data-placement="top" title="Modifier" href="{{route('vol.edit',$vol->id)}}" ><i class="fas fa-edit"></i></a>
                        <a  class="btn btn-outline-danger rounded-6 mr-2 btn-delete"  data-toggle="tooltip" data-placement="top" title="Supprimer" href="{{route('vol.delete',$vol->id)}}" ><i class="fas fa-trash"></i></a>

                </td>
                </tr>

            @endforeach

            </tbody>
        </table>

    </div>


@endsection

