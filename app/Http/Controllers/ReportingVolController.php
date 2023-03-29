<?php

namespace App\Http\Controllers;

use App\Models\Vol;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportingVolController extends Controller
{
    public function index()
    {
        $vol=Vol::first();
//        return $vol->created_at->format('Y-m-d') . Carbon::today()->format('Y-m-d');
        $today=Carbon::today()->format('Y-m-d');
        $today_vols = Vol::whereRaw('DATE(created_at) = ?', $today)->get();
        $last_vols = Vol::orderBy('created_at', 'desc')->get();
        $todayarrival_vols=Vol::where('date_vol','=',Carbon::today())->where('type_vol','=',0)->get();
        $todaydeparture_vols=Vol::where('date_vol','=',Carbon::today())->where('type_vol','=',1)->get();
        return view('vol.reporting')->with([
            'today_vols' => $today_vols,
            'last_vols' => $last_vols,
            'todayarrival_vols'=>$todayarrival_vols,
            'todaydeparture_vols'=>$todaydeparture_vols
        ]);
    }

}
