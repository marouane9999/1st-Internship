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
@if(isset($today_restaurations))
    <div class="container">
        <center><h1>Les Restaurations Ajoutés Aujourd'hui </h1></center>
        <br/>
        <table>
            <tr>
                <th>Nom & Prenom Participant</th>
                <th>Type Repas</th>
                <th>Site Restauration</th>
            </tr>
            @foreach ($today_restaurations as $tr)
                <tr>
                    <td class="col-md-1">{{$tr->participant->nom_par}} {{$tr->participant->prenom_par}}
                    </td>
                    <td class="col-md-2">{{$tr->repas->des_rep}}</td>
                    <td class="col-md-3">{{$tr->site_restau}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@elseif(isset($last_restaurations))
    <div class="container">
        <center><h1> Les 5 Derniers Restauration Ajoutés </h1></center>
        <br/>
        <table>
            <tr style="background-color: aqua">
                <th class="col-md-4">Nom & Prenom Participant</th>
                <th class="col-md-3">Type Repas</th>
                <th class="col-md-3">Site Restauration</th>
                <th class="col-md-3">Date Ajout</th>
            </tr>
            @foreach($last_restaurations as $lr)
                <tr>
                    <td class=""><a href="{{route('restaurations.show',$lr->id)}}"
                                    class="text-decoration-none  text-dark font-weight-bolder">{{$lr->participant->nom_par}} {{$lr->participant->prenom_par}}</a>
                    </td>
                    <td class="">{{$lr->repas->des_rep}}</td>
                    <td class="">{{$lr->site_restau}}</td>
                    <td class="">{{date('d M Y',strtotime($lr->created_at))}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@elseif(isset($total_repas))
    <div class="container">
        <center><h1> Le Nombre de repas Servis par Site de Restauration</h1></center>
        <br/>
        <table>
            <tr style="background-color: aqua">
                <th>Site Restauration</th>
                <th>Total Repas</th>
            </tr>
            @foreach($total_repas as $tr)
                <tr class="text-left">
                    <td class=""><a href="#"
                                    class="text-decoration-none  text-dark font-weight-bolder">{{$tr->site_restau}}</a>
                    </td>
                    <td class="">{{$tr->repas}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@elseif(isset($today_repas))
    <div class="container">
        <center><h1> Le Nombre de Repas Servis Aujourd'hui <span class="text-dark font-italic font-weight-bold">({{date('d M Y')}})</span>  </h1></center>
        <br/>
        <table>
            <tr>
                <th>Site Restauration</th>
                <th>Total Repas</th>
            </tr>
            @foreach($today_repas as $tr)
                <tr class="text-left">
                    <td class=""><a href="#" class="text-decoration-none  text-dark font-weight-bolder">{{$tr->site_restau}}</a>
                    </td>
                    <td  class="">{{$tr->repas}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endif
</body>
</html>
