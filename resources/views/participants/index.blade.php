@extends('layout')
@section('content')

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-auto">
            <a class="btn btn-success me-md-2 rounded-pill bg-gradient-success "  href="{{route('participants.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter Participant</a>
        </div>

    <div class="d-flex justify-content-center m-auto w-75">
        <table class="table table-borderless table-bordered table-hover w-100 mt-5 shadow-lg p-3 mb-5 bg-white  ">
            <thead>
            <tr class="text-left" >
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
            <tr class="text-left" id="trParticipant">
                    <th scope="row">{{$ptc->id}}</th>
                    <td>{{ucfirst($ptc->nom_par)}} {{ucfirst($ptc->prenom_par)}}</td>
                    <td>{{{$ptc->genre==1?'H':'F'}}} </td>
                    <td>{{ucfirst($ptc->discipline)}}</td>
                    <td>{{config('custom_arrays.countries.'.$ptc->pays_delg)}}</td>
                    <td>{{ucfirst($ptc->categorie->des_cat)}}</td>
                    <td>{{$ptc->site_compet}}</td>
                    <td>
                        <a class="btn btn-outline-primary rounded-6 mr-2" data-toggle="tooltip" data-placement="top" title="Consulter"  href="{{route('participants.show',$ptc->id)}}" ><i class="fas fa-eye"></i></a>
                        <a class="btn btn-outline-warning rounded-6 mr-2" data-toggle="tooltip" data-placement="top" title="Modifier"  href="{{route('participants.edit',$ptc->id)}}" ><i class="fas fa-edit"></i></a>
                        <a class="btn btn-outline-danger rounded-6 mr-2 delete-participant " data-toggle="tooltip" data-placement="top"  title="Supprimer"  href="{{route('participants.delete',$ptc->id)}}" ><i class="fas fa-trash"></i></a>
                    </td>
            </tr>
            @endforeach


            </tbody>
        </table>

    </div>
        <script>

            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
            $('div.alert').not('.alert-important').delay(1500).fadeOut(350);

        </script>

@endsection


