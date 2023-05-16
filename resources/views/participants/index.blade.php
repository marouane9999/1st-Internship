@extends('layout')
@section('header title','Participants')
@section('content')


    @if($participants->count()==0)
        <div class="text-muted text-center font-weight-bolder m-auto  ">
            <div class="row w-25 m-auto mt-5">
                <i class='fas fa-exclamation-triangle'></i> <span>Aucun Participant n'est Enregistré!</span>
                <a class="btn btn-success rounded-pill bg-gradient-success float-right mb-1 "
                   href="{{route('participants.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter Participant</a>
            </div>
        </div>
    @else
        <div class="container">
        <div class="row justify-content-center">
                <div class="col-4 ml-6 ">
        <form method="get" action="{{route('participants.search','cat')}}">
            @csrf
                    <label>Par Catégorie</label>
                    <select class="form-select form-select mb-1" name="cat" aria-label=".form-select-lg example">
                        <option selected>Chercher par Catégorie</option>
                        @foreach($categories as $cat)
                        <option value={{$cat->id}}>{{$cat->des_cat}}</option>
                        @endforeach
                    </select>

                    <input type="submit" class="btn btn-danger float-right rounded-pill" value="Chercher">
        </form>
                </div>

                <div class="col-4 ">
                    <form method="get" action="{{route('participants.search','dsc')}}">
                        @csrf
                    <label>Par Discipline</label>
                    <select class="form-select form-select mb-1" name="dsc" aria-label=".form-select-lg example">
                        <option selected>Chercher par Discipline</option>
                        @foreach($disciplines as $dsc)
                            <option value="{{$dsc}}">{{ucfirst($dsc)}}
                            </option>
                        @endforeach
                    </select>

                    <input type="submit" class="btn btn-danger float-right rounded-pill" value="Chercher">
                    </form>
                </div>

            <div class="col-2 ">
                <form method="get" action="{{route('participants.search','sexe')}}">
                    @csrf
                    <label>Par Sexe</label>
                    <select class="form-select form-select mb-1" name="sexe" aria-label=".form-select-lg example">
                            <option selected> Chercher Par Sexe</option>
                            <option value="0">Feminin</option>
                            <option value="1">Masculin</option>
                    </select>

                    <input type="submit" class="btn btn-danger float-right rounded-pill" value="Chercher">
                </form>
            </div>

            </div>
        </div>


        <div class=" mt-5 m-auto w-75 ">
            @if(\Illuminate\Support\Facades\Auth::user()->hasRole(['membre','admin']))
            <a class="btn btn-success rounded-pill bg-gradient-success float-right mb-2 "
               href="{{route('participants.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter Participant</a>
            @endif
            <div>
                <table
                    class="table table-borderless table-bordered table-hover w-100 mt-2 shadow-lg mb-5 bg-white rounded">
                    <thead class="thead-dark">
                    <tr class="">
                        <th scope="col">#</th>
                        <th scope="col">Nom & Prenom</th>
                        <th scope="col">Sexe</th>
                        <th scope="col">Discipline</th>
                        <th scope="col">Pays Delegation</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Site Competition</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($participants as $ptc)
                        <tr class="text-left">
                            <th scope="row">{{$ptc->id}}</th>
                            <td>{{ucfirst($ptc->nom_par)}} {{ucfirst($ptc->prenom_par)}}</td>
                            <td>{{{$ptc->genre==1?'Masculin':'Feminin'}}} </td>
                            <td>{{ucfirst($ptc->discipline)}}</td>
                            <td>{{config('custom_arrays.countries.'.$ptc->pays_delg)}}</td>
                            <td>{{ucfirst($ptc->categorie->des_cat)}}</td>
                            <td>{{$ptc->site_compet}}</td>
                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole(['membre','admin']))
                            <td>
                                <a class="btn btn-outline-primary rounded-6 " data-toggle="tooltip" data-placement="top"
                                   title="Consulter" href="{{route('participants.show',$ptc->id)}}"><i
                                        class="fas fa-eye"></i></a>
                                <a class="btn btn-outline-warning rounded-6 " data-toggle="tooltip" data-placement="top"
                                   title="Modifier" href="{{route('participants.edit',$ptc->id)}}"><i
                                        class="fas fa-edit"></i></a>
                                <a class="btn btn-outline-danger rounded-6 delete-elm" data-toggle="tooltip"
                                   data-placement="top" title="Supprimer"
                                   href="{{route('participants.delete',$ptc->id)}}"><i class="fas fa-trash"></i></a>
                            </td>
                            @endif
                        </tr>
                    @endforeach


                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $participants->withQueryString()->links() }}
                </div>
            </div>
        </div>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $('div.alert').not('.alert-important').delay(1500).fadeOut(350);
    </script>

@endsection


