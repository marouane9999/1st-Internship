@extends('layout')
@section('header title',' Controle Vol ')
@section('content')

    <div class="container">
        <div class="row">
            <div class="float-end">
            <a class="btn btn-success bg-gradient-primary rounded-pill  mb-2"
                              href="{{route('vols.controle.edit')}}"><i class="fas fa-clipboard-check"></i>&nbsp;&nbsp;Validation Des Réservations </a></div>
            </div>
    <div class="row">
        <div class="col-lg-12 mt-5 text-left ">
            <div class="alert alert-primary mb-0 p-1" role="alert">
                <i class="fas fa-square-check fa-lg fa-fade mr-1 "></i> <span
                    class="text-dark font-weight-bold">Les Reservations Validés </span>
            </div>
                <table
                    class="table table-borderless table-bordered table-hover w-100 mt-2 shadow-lg mb-5 bg-white rounded">
                    <thead class="table-secondary">
                    <tr class="text-center">
                        <th scope="col">Nom & Prenom</th>
                        <th scope="col">Numero Passport</th>
                        <th scope="col">Numero Vol</th>
                        <th scope="col">Terminal</th>
                        <th scope="col">Date/Horraire</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($participantsv as $ptcv)
                        <tr class="text-center">
                            <td>{{$ptcv->nom_par}} {{$ptcv->prenom_par}}</td>
                            <td>{{$ptcv->num_pass}}</td>
                            <td>{{$ptcv->numero_vol}}</td>
                            <td>{{$ptcv->terminal}}</td>
                            <td>{{date('d/m/y H:i',strtotime($ptcv->date_vol))}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <div class="d-flex justify-content-center">
                {{ $participantsv->links() }}
            </div>

        </div>

        </div>
    <div class="row">
            <div class="col-lg-12 mt-2 text-left ">
                <div class="alert alert-danger bg-red text-white mb-0 p-1" role="alert">
                    <i class="fas fa-xmark fa-lg fa-fade mr-1 "></i> <span
                        class="text-light font-weight-bold">Les Reservations Non Validés </span>
                </div>

                    <table
                        class="table table-borderless table-bordered table-hover w-100 mt-2 shadow-lg mb-5 bg-white rounded  ">
                        <thead class="table-secondary">
                        <tr class="text-center">
                            <th scope="col">Nom & Prenom</th>
                            <th scope="col">Numero Passport</th>
                            <th scope="col">Numero Vol</th>
                            <th scope="col">Terminal</th>
                            <th scope="col">Date/Horraire</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($participantsnv as $ptcnv)
                            <tr class="text-center">
                                <td>{{$ptcnv->nom_par}} {{$ptcnv->prenom_par}}</td>
                                <td>{{$ptcnv->num_pass}}</td>
                                <td>{{$ptcnv->numero_vol}}</td>
                                <td>{{$ptcnv->terminal}}</td>
                                <td>{{date('d/m/y H:i',strtotime($ptcnv->date_vol))}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


            </div>
        </div>
    </div>


@endsection




