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
@if(isset($today_hbgs))
    <div class="container">
        <center><h1>Les Hébergement Ajoutés Aujourd'hui </h1></center>
        <br/>
        <table>
            <tr>
                <th>Nom & Prenom Participant</th>
                <th>Type Chambre</th>
                <th>Site Hébergement</th>
            </tr>
            @foreach ($today_hbgs as $th)
                <tr>
                    <td>{{ $th->participant->nom_par }} {{ $th->participant->prenom_par }}</td>
                    <td>{{ $th->type_cham==1?'Single':'Double'}}</td>
                    <td>{{ $th->site_heberg }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@elseif(isset($last_hbgs))
    <div class="container">
        <center><h1> Les 5 Derniers Hébergement Ajoutés </h1></center>
        <br/>
        <table>
            <tr style="background-color: aqua">
                <th>Nom & Prenom Participant</th>
                <th>Type Chambre</th>
                <th>Site Hébergement</th>
                <th>Date Ajout</th>
            </tr>
            @foreach ($last_hbgs as $lh)
                <tr>
                    <td>{{ $lh->participant->nom_par }} {{ $lh->participant->prenom_par }}</td>
                    <td>{{ $lh->type_cham==1?'Single':'Double'}}</td>
                    <td>{{ $lh->site_heberg }}</td>
                    <td>{{date('d M Y', strtotime($lh->created_at))}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@elseif(isset($todaycheckin_hbgs))
    <div class="container">
        <center><h1>Les Check In d'Aujourd'hui</h1></center>
        <br/>
        <table>
            <tr style="background-color: aqua">
                <th>Nom & Prenom Participant</th>
                <th>Type Chambre</th>
                <th>Site Hébergement</th>
            </tr>
            @foreach ($todaycheckin_hbgs as $tih)
                <tr>
                    <td>{{ $tih->participant->nom_par }} {{ $tih->participant->prenom_par }}</td>
                    <td>{{ $tih->type_cham==1?'Single':'Double'}}</td>
                    <td>{{ $tih->site_heberg }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@elseif(isset($todaycheckout_hbgs))
    <div class="container">
        <center><h1> Les Check Out d'Aujourd'hui </h1></center>
        <br/>
        <table>
            <tr>
                <th>Nom & Prenom Participant</th>
                <th>Type Chambre</th>
                <th>Site Hébergement</th>
            </tr>
            @foreach ($todaycheckout_hbgs as $toh)
                <tr>
                    <td>{{ $toh->participant->nom_par }} {{ $toh->participant->prenom_par }}</td>
                    <td>{{ $toh->type_cham==1?'Single':'Double'}}</td>
                    <td>{{ $toh->site_heberg }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endif
</body>
</html>
