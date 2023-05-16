@extends('layout')
@section('header title','Hébergements ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 ml-6 ">
                <form method="get" action="{{route('hebergements.search','site_hbg')}}">
                    @csrf
                    <label>Site Hébergement</label>
                    <select class="form-select form-select mb-1" name="site_hbg" aria-label=".form-select-lg example">
                        <option selected>Chercher par Site Hébergement</option>
                        @foreach($site_heberg as $hbg)
                            <option value="{{$hbg}}">{{{ucfirst($hbg)}}}</option>
                        @endforeach
                    </select>

                    <input type="submit" class="btn btn-danger float-right rounded-pill" value="Chercher">
                </form>
            </div>

            <div class="col-4 ">
                <form method="get" action="{{route('hebergements.search','type_cham')}}">
                    @csrf
                    <label>Type Chambre</label>
                    <select class="form-select form-select mb-1" name="type_cham" aria-label=".form-select-lg example">
                        <option selected>Chercher par Type Chambre</option>
                            <option value=3>Double</option>
                            <option value="1">Single</option>
                    </select>
                    <input type="submit" class="btn btn-danger float-right rounded-pill" value="Chercher">
                </form>
            </div>
        </div>
    </div>
        <div class="mt-5 m-auto w-75 ">
            @if(\Illuminate\Support\Facades\Auth::user()->hasRole(['membre','admin']))
            <a href="{{route('hebergements.create')}}" class="btn btn-success me-md-2 rounded-pill bg-gradient-success float-right mb-2 create-hebergements" ><i class="fa fa-plus mr-2"></i>Ajouter Hébergement</a>
            @endif
                <table class="table table-borderless table-bordered table-hover w-100 mt-5 shadow-lg p-3 mb-5 bg-white rounded">
            <thead class="thead-dark">
            <tr class="text-left" >
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
            @if($hebergement->count()==0)
                <tr>
                    <td colspan="7" class="text-center">
                        <div class="alert alert-warning  mb-0 p-2" role="alert">
                            <i class='fas fa-exclamation-triangle fa-beat-fade mr-2'></i> <span>Aucun Hébergement n'est Enregistré!</span>
                        </div>
                    </td>
                </tr>
            @endif
            @foreach($hebergement as $heberg)
                <tr class="text-left" id="hebergement">
                    <th scope="row">{{$heberg->id}}</th>
                    <td>{{$heberg->participant->nom_par}}</td>
                    <td>{{$heberg->site_heberg}}</td>
                    <td>{{$heberg->type_cham==1?'Single':'Double'}}</td>
                    <td>{{date('d/m/Y', strtotime($heberg->date_checkin))}}</td>
                    <td>{{date('d/m/Y', strtotime($heberg->date_checkout))}}</td>
                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole(['membre','admin']))
                    <td>
                        <a class="btn btn-outline-primary rounded-6 mr-2" data-toggle="tooltip" data-placement="top" title="Consulter"  href="{{route('hebergements.show',$heberg->id)}}" ><i class="fas fa-eye"></i></a>
                        <a class="btn btn-outline-warning rounded-6 mr-2 create-hebergements" data-toggle="tooltip" data-placement="top" title="Modifier"  href="{{route('hebergements.edit',$heberg->id)}}" ><i class="fas fa-edit"></i></a>
                        <a class="btn btn-outline-danger rounded-6 mr-2 delete-elm" data-toggle="tooltip" data-placement="top"  title="Supprimer"  href="{{route('hebergements.delete',$heberg->id)}}" ><i class="fas fa-trash"></i></a>
                    </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
                <div class="d-flex justify-content-center">
                    {{ $hebergement ->withQueryString()->links() }}
                </div>
        </div>
    <script>
        // $(function () {
        //     $('[data-toggle="tooltip"]').tooltip()
        // });
        // $('div.alert').not('.alert-important').delay(1500).fadeOut(350);

    </script>

@endsection


