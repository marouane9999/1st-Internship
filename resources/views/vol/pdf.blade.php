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
    @if(isset($today_vols))
    <div class="container"> 
        <center><h1>Les Vol Ajoutés Aujourd'hui </h1></center>
        <br/>  
            <table>  
                <tr>  
                    <th>Numero Vol</th>  
                    <th>Type Vol</th>  
                    <th>Terminal</th>  
                </tr>  
                @foreach ($today_vols as $tv)  
                    <tr>  
                        <td>{{ $tv->numero_vol }}</td>  
                        <td>{{ $item->type_vol }}</td>  
                        <td>{{ $item->terminal }}</td>  
                    </tr>  
                @endforeach  
            </table>  
        </div> 
    @elseif(isset($todayarrival_vols))
    <div class="container"> 
        <center><h1>Les Vol de Depart Aujourd'hui </h1></center>
        <br/>   
            <table>  
                <tr style="background-color: aqua">  
                    <th>Numero Vol</th>  
                    <th>Terminal</th>  
                    <th>Horraire</th>  
                </tr>  
                @foreach ($todayarrival_vols as $tav)  
                    <tr>  
                        <td>{{ $tav->numero_vol }}</td>  
                        <td>{{ $tav->terminal }}</td>  
                        <td>{{date('H:i',strtotime($tav->date_vol))}}</td>  
                    </tr>  
                @endforeach  
            </table>  
        </div> 
    @elseif(isset($last_vols)) 
    <div class="container"> 
        <center><h1>Les 5 derniers vols</h1></center>
        <br/>   
            <table>  
                <tr style="background-color: aqua">  
                    <th>Numero Vol</th>  
                    <th>Type Vol</th>  
                    <th>Terminal</th>  
                    <th>Date Ajout</th>  
                </tr>  
                @foreach ($last_vols as $lv)  
                    <tr>  
                        <td>{{ $lv->numero_vol }}</td>  
                        <td>{{ $lv->type_vol==1?'Départ':'Arrivée' }}</td>  
                        <td>{{ $lv->terminal }}</td>  
                        <td>{{ $lv->created_at->todatestring() }}</td>  
                    </tr>  
                @endforeach  
            </table>  
        </div> 
    @elseif(isset($todaydeparture_vols))
    <div class="container"> 
        <center><h1>Les Vol d'Arrivées Aujourd'hui </h1></center>
        <br/>   
            <table>  
                <tr>  
                    <th>Numero Vol</th>  
                    <th>Terminal</th>  
                    <th>Horraire</th>  
                </tr>  
                @foreach ($todaydeparture_vols as $tdv)  
                    <tr>  
                        <td>{{ $tdv->numero_vol }}</td>  
                        <td>{{ $tdv->terminal }}</td>  
                        <td>{{date('H:i',strtotime($tdv->date_vol))}}</td>  
                    </tr>  
                @endforeach  
            </table>  
        </div> 
    @endif
</body>
</html>