@extends('layout')
@section('header title','Hébergements ')
@section('content')
    @if($hebergement->count()==0)
        <div class="text-muted text-center font-weight-bolder m-auto  ">
            <div class="row w-25 m-auto mt-5">
                <i class='fas fa-exclamation-triangle'></i> <span>Aucun Hébergement n'est Enregistré!</span>
                <a href="{{route('hebergements.create')}}"
                   class="btn btn-success me-md-2 rounded-pill bg-gradient-success float-right mb-2 create-hebergements "><i
                        class="fa fa-plus mr-2"></i>Ajouter Hébergement</a>
            </div>
        </div>
    @else
        <div class="mt-5 m-auto w-75 ">
            <a href="{{route('hebergements.create')}}"
               class="btn btn-success me-md-2 rounded-pill bg-gradient-success float-right mb-2 create-hebergements "><i
                    class="fa fa-plus mr-2"></i>Ajouter Hébergement</a>
            <table
                class="table table-borderless table-bordered table-hover w-100 mt-5 shadow-lg p-3 mb-5 bg-white rounded">
                <thead class="thead-dark">
                <tr class="text-left">
                    <th scope="col">#</th>
                    <th scope="col">Participant</th>
                    <th scope="col">Site d' hébergement</th>
                    <th scope="col">Type de chambre</th>
                    <th scope="col">Date Check in</th>
                    <th scope="col">Date Check out</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($hebergement as $heberg)
                    <tr class="text-left" id="hebergement">
                        <th scope="row">{{$heberg->id}}</th>
                        <td>{{$heberg->participant->nom_par}}</td>
                        <td>{{$heberg->site_heberg}}</td>
                        <td>{{$heberg->type_cham==1?'Single':'Double'}}</td>
                        <td>{{date('d M Y', strtotime($heberg->date_checkin))}}</td>
                        <td>{{date('d M Y', strtotime($heberg->date_checkout))}}</td>
                        <td>
                            <a class="btn btn-outline-primary rounded-6 mr-2" data-toggle="tooltip" data-placement="top"
                               title="Consulter" href="{{route('hebergements.show',$heberg->id)}}"><i
                                    class="fas fa-eye"></i></a>
                            <a class="btn btn-outline-warning rounded-6 mr-2 create-hebergements" data-toggle="tooltip"
                               data-placement="top" title="Modifier"
                               href="{{route('hebergements.edit',$heberg->id)}}"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-outline-danger rounded-6 mr-2 delete-elm" data-toggle="tooltip"
                               data-placement="top" title="Supprimer"
                               href="{{route('hebergements.delete',$heberg->id)}}"><i class="fas fa-trash"></i></a>

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


