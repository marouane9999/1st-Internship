<?php

namespace App\Http\Controllers;

use App\Models\Vol;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportingVolController extends Controller
{
    public function index()
    {
        $vol = Vol::first();
//        return $vol->created_at->format('Y-m-d') . Carbon::today()->format('Y-m-d');
        $today = Carbon::today()->format('Y-m-d');
        $today_vols = Vol::whereRaw('DATE(created_at) = ?', $today)->orderBy('created_at','desc')->get();
        $last_vols = Vol::orderBy('created_at', 'desc')->limit(5)->get();
        $todayarrival_vols = Vol::whereRaw('DATE(date_vol) = ?', $today)->where('type_vol', '=', 0)->get();
        $todaydeparture_vols = Vol::whereRaw('DATE(date_vol) = ?', $today)->where('type_vol', '=', 1)->get();
        return view('vol.reporting')->with([
            'today_vols' => $today_vols,
            'last_vols' => $last_vols,
            'todayarrival_vols' => $todayarrival_vols,
            'todaydeparture_vols' => $todaydeparture_vols
        ]);
    }

}
