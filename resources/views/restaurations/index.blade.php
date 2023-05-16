@extends('layout')
@section('header title','Restauration')
@section('content')



        <div class="mt-5 m-auto w-75">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-4 ml-6 ">
                        <form method="get" action="{{route('restaurations.search','site_restau')}}">
                            @csrf
                            <label>Site Restauration</label>
                            <select class="form-select form-select mb-1" name="site_restau" aria-label=".form-select-lg example">
                                <option selected>Chercher par Site Restauration</option>
                                @foreach($site_restau as $rst)
                                    <option value="{{$rst}}">{{{ucfirst($rst)}}}</option>
                                @endforeach
                            </select>

                            <input type="submit" class="btn btn-danger float-right rounded-pill" value="Chercher">
                        </form>
                    </div>

                    <div class="col-4 ">
                        <form method="get" action="{{route('restaurations.search','repas')}}">
                            @csrf
                            <label>Repas</label>
                            <select class="form-select form-select mb-1" name="repas" aria-label=".form-select-lg example">
                                <option selected>Chercher par Repas</option>
                                @foreach($repas as $rp)
                                    <option value={{$rp->id}}>{{$rp->desc_rep}}</option>
                                @endforeach
                            </select>
                            <input type="submit" class="btn btn-danger float-right rounded-pill" value="Chercher">
                        </form>
                    </div>
                </div>
            </div>

        @if(\Illuminate\Support\Facades\Auth::user()->hasRole(['membre','admin']))
            <a href="{{route('restaurations.create')}}"
               class="btn btn-success me-md-2 rounded-pill bg-gradient-success float-right mb-2 create-restaurations"><i
                    class="fa fa-plus mr-2"></i>Ajouter Restauration</a>
            @endif



                <table
                class="table table-borderless table-bordered table-hover w-100 mt-5 shadow-lg p-3 mb-5 bg-white rounded">
                <thead class="thead-dark">
                <tr class="text-left">
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
                @if($restaurations->count()==0)
                    <tr>
                        <td colspan="7" class="text-center">
                            <div class="alert alert-warning  mb-0 p-2" role="alert">
                                <i class='fas fa-exclamation-triangle fa-beat-fade mr-2'></i> <span>Aucune Restauration n'est Enregistré!</span>
                            </div>
                        </td>
                    </tr>
                @endif
                @foreach($restaurations as $restau)
                    <tr class="text-left" id="restauration">
                        <th scope="row">{{$restau->id}}</th>
                        <td>{{$restau->numero_rest}}</td>
                        <td>{{$restau->site_restau}}</td>
                        <td>{{$restau->ville}}</td>
                        <td>{{$restau->prestataire}}</td>
                        <td>{{$restau->repas->desc_rep}}</td>
                        <td>{{$restau->participant->nom_par}}  {{$restau->participant->prenom_par}}
                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole(['membre','admin']))
                        <td>
                            <a class="btn btn-outline-primary rounded-6 mr-2" data-toggle="tooltip" data-placement="top"
                               title="Consulter" href="{{route('restaurations.show',$restau->id)}}"><i
                                    class="fas fa-eye"></i></a>
                            <a class="btn btn-outline-warning rounded-6 mr-2 create-restaurations" data-toggle="tooltip"
                               data-placement="top" title="Modifier" href="{{route('restaurations.edit',$restau->id)}}"><i
                                    class="fas fa-edit"></i></a>
                            <a class="btn btn-outline-danger rounded-6 mr-2 delete-elm" data-toggle="tooltip"
                               data-placement="top" title="Supprimer"
                               href="{{route('restaurations.delete',$restau->id)}}"><i class="fas fa-trash"></i></a>

                        </td>
                        @endif
                    </tr>
                @endforeach


                </tbody>
            </table>

                <div class="d-flex justify-content-center">
                    {{ $restaurations->withQueryString()->links() }}
                </div>
        </div>


        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
            $('div.alert').not('.alert-important').delay(1500).fadeOut(350);

        </script>


@endsection


