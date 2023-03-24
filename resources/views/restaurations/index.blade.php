@extends('layout')
@section('content')
    @if($restaurations->count()==0)
        <div class="text-muted text-center font-weight-bolder m-auto  ">
            <div class="row w-25 m-auto mt-5">
                <i class='fas fa-exclamation-triangle'></i> <span>Aucune Restauartion n'est Enregistré!</span>
                <a href="{{route('restaurations.create')}}" class="btn btn-success me-md-2 rounded-pill bg-gradient-success float-right mb-2 create-restaurations" ><i class="fa fa-plus mr-2"></i>Ajouter Restauration</a>
            </div>
        </div>
    @else
        <div class="mt-5 m-auto w-75">
            <a href="{{route('restaurations.create')}}" class="btn btn-success me-md-2 rounded-pill bg-gradient-success float-right mb-2 create-restaurations" ><i class="fa fa-plus mr-2"></i>Ajouter Restauration</a>
            <table class="table table-borderless table-bordered table-hover w-100 mt-5 shadow-lg p-3 mb-5 bg-white rounded">
                <thead>
                <tr class="text-left" >
                    <th scope="col">#</th>
                    <th scope="col">Numéro de restauration</th>
                    <th scope="col">Site de restauration</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Prestataire</th>
                    <th scope="col">Catégorie de repas</th>
                    <th scope="col">Participant</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($restaurations as $restau)
                    <tr class="text-left" id="restauration">
                        <th scope="row">{{$restau->id}}</th>
                        <td>{{$restau->numero_rest}}</td>
                        <td>{{$restau->site_restau}}</td>
                        <td>{{$restau->ville}}</td>
                        <td>{{$restau->prestataire}}</td>
                        <td>{{$restau->repas->des_rep}}</td>
                        <td>{{$restau->participant->nom_par}}  {{$restau->participant->prenom_par}}</td>
                        <td>
                            <a class="btn btn-outline-primary rounded-6 mr-2" data-toggle="tooltip" data-placement="top" title="Consulter"  href="{{route('restaurations.show',$restau->id)}}" ><i class="fas fa-eye"></i></a>
                            <a class="btn btn-outline-warning rounded-6 mr-2 create-restaurations" data-toggle="tooltip" data-placement="top" title="Modifier"  href="{{route('restaurations.edit',$restau->id)}}" ><i class="fas fa-edit"></i></a>
                            <a class="btn btn-outline-danger rounded-6 mr-2 delete-elm" data-toggle="tooltip" data-placement="top"  title="Supprimer"  href="{{route('restaurations.delete',$restau->id)}}" ><i class="fas fa-trash"></i></a>

                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    @endif

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $('div.alert').not('.alert-important').delay(1500).fadeOut(350);

    </script>



@endsection


