<?php

namespace App\Http\Controllers;

use App\Models\Restauration;
use App\Models\Volontaire;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurationReportingController extends Controller
{
    public function index()
    {
//        return $vol->created_at->format('Y-m-d') . Carbon::today()->format('Y-m-d');
        $today = Carbon::today()->format('Y-m-d');
        $today_restaurations = Restauration::whereRaw('DATE(created_at) = ?', $today)->orderBy('created_at', 'desc')->get();
        $last_restaurations = Restauration::orderBy('created_at', 'desc')->limit(5)->get();
        $total_repas=Restauration::select(DB::raw('count(rep_id) as repas,site_restau'))->groupBy('site_restau')->get();
        $today_repas=Restauration::select(DB::raw('count(rep_id) as repas,site_restau'))->groupBy('site_restau')->get();
        return view('restaurations.reporting')->with([
            'today_restaurations' => $today_restaurations,
            'last_restaurations' => $last_restaurations,
            'total_repas'=>$total_repas,
        ]);
    }
}
