<?php

namespace App\Http\Controllers;

use App\Models\Hebergement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HebergementReportingController extends Controller
{
    public function index()
    {

        $today = Carbon::today()->format('Y-m-d');
        $today_hbgs = Hebergement::whereRaw('DATE(created_at) = ?', $today)->orderBy('created_at', 'desc')->get();
        $last_hbgs = Hebergement::orderBy('created_at', 'desc')->limit(5)->get();
        $todaycheckin_hbgs = Hebergement::whereRaw('DATE(date_checkin) = ?', $today)->get();
        $todaycheckout_hbgs = Hebergement::whereRaw('DATE(date_checkout) = ?', $today)->get();
//        $last_vols = Vol::orderBy('created_at', 'desc')->limit(5)->get();
//        $todayarrival_vols = Vol::whereRaw('DATE(date_vol) = ?', $today)->where('type_vol', '=', 0)->get();
//        $todaydeparture_vols = Vol::whereRaw('DATE(date_vol) = ?', $today)->where('type_vol', '=', 1)->get();
        return view('hebergements.reporting')->with([
            'today_hbgs' => $today_hbgs,
            'last_hbgs' => $last_hbgs,
            'todaycheckin_hbgs' => $todaycheckin_hbgs,
            'todaycheckout_hbgs' => $todaycheckout_hbgs,
        ]);
    }
}
