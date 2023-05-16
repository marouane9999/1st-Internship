<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<style type="text/css">
    table{
        width: 100%;
        border-collapse: collapse;
    }
    table td, table th{
        border:1px solid black;
        text-align: center;
    }
    table tr, table td{
        padding: 5px;
    }
</style>
<body style="margin-top: 30px">
@if(isset($today_volontaires))
    <div class="container">
        <center><h1>Les Affectations des Volontaires d'Aujourd'hui</h1><span class="text-dark font-italic font-weight-bold">({{date('d M Y')}})</span>
        </center>
        <br/>
        <table>
            <tr>
                <th>Nom & Prenom Volontaire	</th>
                <th>Role</th>
                <th>Site Affectation</th>
            </tr>
            @foreach($today_volontaires as $tv)
                <tr class="text-left">
                    <td class="col-md-1"><a href="{{route('volontaires.show',$tv->id)}}"
                                            class="text-decoration-none  text-dark font-weight-bolder">{{$tv->participant->nom_par}} {{$tv->participant->prenom_par}}</a>
                    </td>
                    <td class="col-md-2">{{$tv->role}}</td>
                    <td class="col-md-3">{{$tv->site_aff}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@elseif(isset($last_volontaires))
    <div class="container">
        <center><h1>  Les 5 Derniers Volonraires Ajoutés</h1></center>
        <br/>
        <table>
            <tr style="background-color: aqua">
                <th class="col-md-4">Nom & Prenom Volontaire</th>
                <th class="col-md-3">Role</th>
                <th class="col-md-3">Site Affectation</th>
                <th class="col-md-3">Date Ajout</th>
            </tr>
            @foreach($last_volontaires as $lv)
                <tr>
                    <td class="">{{$lv->participant->nom_par}} {{$lv->participant->prenom_par}}
                    </td>
                    <td class="">{{$lv->role}}</td>
                    <td class="">{{$lv->site_aff}}</td>
                    <td class="">{{date('d M Y',strtotime($lv->created_at))}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@elseif(isset($today_fincontrat))
    <div class="container">
        <center><h1>Expirations de contrat d'aujourd'hui</h1></center>
        <br/>
        <table>
            <tr style="background-color: aqua">
                    <th class="col-md-4">Nom & Prenom Volontaire</th>
                    <th class="col-md-3">Role</th>
                    <th class="col-md-3">Site Affectation</th>
                    <th class="col-md-3">Date Ajout</th>
                </tr>
            @foreach($today_fincontrat as $tfc)
                <tr class="text-left">
                    <td class=""><{{$tfc->participant->nom_par}} {{$tfc->participant->prenom_par}}
                    </td>
                    <td class="">{{$tfc->role}}</td>
                    <td class="">{{$tfc->site_aff}}</td>
                    <td class="">{{date('d M Y',strtotime($tfc->created_at))}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@elseif(isset($today_debutcontrat))
    <div class="container">
        <center><h1> Debuts de contrat d'aujourd'hui<span class="text-dark font-italic font-weight-bold">({{date('d M Y')}})</span>  </h1></center>
        <br/>
        <table>
            <tr>
                <th class="col-md-4">Nom & Prenom Volontaire</th>
                <th class="col-md-3">Role</th>
                <th class="col-md-3">Site Affectation</th>
                <th class="col-md-3">Date Ajout</th>
            </tr>
            @foreach($today_debutcontrat as $tdc)
                <tr class="text-left">
                    <td class=""><{{$tdc->participant->nom_par}} {{$tdc->participant->prenom_par}}
                    </td>
                    <td class="">{{$tdc->role}}</td>
                    <td class="">{{$tdc->site_aff}}</td>
                    <td class="">{{date('d M Y',strtotime($tdc->created_at))}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endif
</body>
</html>
