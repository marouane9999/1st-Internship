@extends('layout')
@section('header title','Vol ')
@section('content')

    @if($vols->count()==0)
        <div class="text-muted text-center font-weight-bolder m-auto  ">
            <div class="row w-25 m-auto mt-5">
                <i class='fas fa-exclamation-triangle'></i> <span>Aucun Vol n'est Enregistré!</span>
                <a class="btn btn-success rounded-pill bg-gradient-success float-right mb-2 create-vol "
                   href="{{route('vols.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter Vol</a>
            </div>
        </div>
    @else

        <div class="mt-5 m-auto w-75 ">
            <a class="btn btn-success me-md-2 rounded-pill bg-gradient-success float-right mb-2 create-vol"
               href="{{route('vols.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un Vol</a>
            <table
                class="table table-borderless table-bordered table-hover w-100 mt-2 shadow-lg mb-5 bg-white rounded  ">
                <thead class="thead-dark">
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
                        <td>{{$vol->type_vol==1?'Départ':'Arrivée'}}</td>
                        <td>{{$vol->date_vol}}</td>
                        <td>{{$vol->terminal}}</td>

                        <td>
                            <a class="btn btn-outline-primary rounded-6 mr-2" data-toggle="tooltip" data-placement="top"
                               title="Consulter" href="{{route('vols.show',$vol->id)}}"><i
                                    class="fas fa-address-card"></i></a>
                            <a class="btn btn-outline-warning rounded-6 mr-2 create-vol" data-toggle="tooltip"
                               data-placement="top" title="Modifier" href="{{route('vols.edit',$vol->id)}}"><i
                                    class="fas fa-edit"></i></a>
                            <a class="btn btn-outline-danger rounded-6 mr-2 delete-elm" data-toggle="tooltip"
                               data-placement="top" title="Supprimer" href="{{route('vols.delete',$vol->id)}}"><i
                                    class="fas fa-trash"></i></a>

                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>


    @endif

@endsection


