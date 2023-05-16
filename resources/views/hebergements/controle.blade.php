@extends('layout')
    @section('header title',' Controle Presence des Hébergements')
@section('content')

    <div class="container">
        <div class="row">
            <div class="float-end">
                <a class="btn btn-success bg-gradient-danger rounded-pill  mb-2 "
                   href="{{route('hebergements.controle.edit')}}"><i class="fas fa-clipboard-check mr-2"></i>Enregistrement des absences</a></div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-5 text-left ">
                <div class="alert alert-primary mb-0 p-1" role="alert">
                    <i class="fas fa-user fa-lg  mr-1 "></i> <span
                        class="text-dark font-weight-bold">Les Presences d'Aujourd'hui</span>
                </div>
                <table class="table table-borderless table-bordered table-hover w-100  shadow-lg p-3 mb-5 bg-white rounded">
                    <thead class="thead-dark">
                    <tr class="text-left" >
                        <th scope="col">#</th>
                        <th scope="col">Participant</th>
                        <th scope="col">Site d' hébergement</th>
                        <th scope="col">Type de chambre</th>
                        <th scope="col">Date Check in</th>
                        <th scope="col">Date Check out</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hbgpres as $heberg)
                        <tr class="text-left" id="hebergement">
                            <th scope="row">{{$heberg->id}}</th>
                            <td>{{$heberg->participant->nom_par}}</td>
                            <td>{{$heberg->site_heberg}}</td>
                            <td>{{$heberg->type_cham==1?'Single':'Double'}}</td>
                            <td>{{date('d M Y', strtotime($heberg->date_checkin))}}</td>
                            <td>{{date('d M Y', strtotime($heberg->date_checkout))}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $hbgpres->withQueryString()->links() }}
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 mt-5 text-left ">
                <div class="alert alert-danger mb-0 p-1" role="alert">
                    <i class="fas fa-user-xmark fa-lg  mr-1 "></i> <span
                        class="text-dark font-weight-bold">Les Abscences des Participants</span>
                </div>
                <table class="table table-borderless table-bordered table-hover w-100  shadow-lg p-3 mb-5 bg-white rounded">
                    <thead class="thead-dark">
                    <tr class="text-left" >
                        <th scope="col">#</th>
                        <th scope="col">Participant</th>
                        <th scope="col">Site d' hébergement</th>
                        <th scope="col">Type de chambre</th>
                        <th scope="col">Date Check in</th>
                        <th scope="col">Date Check out</th>
                        <th scope="col">Date Abscence</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hbgabs as $heberg)
                        <tr class="text-left" id="hebergement">
                            <th scope="row">{{$heberg->id}}</th>
                            <td>{{$heberg->participant->nom_par}}</td>
                            <td>{{$heberg->site_heberg}}</td>
                            <td>{{$heberg->type_cham==1?'Single':'Double'}}</td>
                            <td>{{date('d M Y', strtotime($heberg->date_checkin))}}</td>
                            <td>{{date('d M Y', strtotime($heberg->date_checkout))}}</td>
                            <td>{{date('d M Y', strtotime($heberg->updated_at))}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>

        </div>

    </div>


@endsection




