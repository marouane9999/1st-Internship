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
        $total_repas = Restauration::select(DB::raw('count(rep_id) as repas,site_restau'))->groupBy('site_restau')->get();
        $today_repas = Restauration::select(DB::raw('DATE(created_at) as date,count(rep_id) as repas,site_restau'))->groupBy('date')->groupBy('site_restau')->having('date', '=', $today)->get();
        return view('restaurations.reporting')->with([
            'today_restaurations' => $today_restaurations,
            'last_restaurations' => $last_restaurations,
            'total_repas' => $total_repas,
            'today_repas' => $today_repas
        ]);
    }
    public function download(Request $request) {
        $today = Carbon::today()->format('Y-m-d');
        if($request->has('tr')){
            $pdf=app('dompdf.wrapper');
            $today_restaurations = Restauration::whereRaw('DATE(created_at) = ?', $today)->orderBy('created_at', 'desc')->get();
            $pdf->loadView('restaurations.pdf',['today_restaurations'=>$today_restaurations]);
            return $pdf->download($today.'today_restaurations.pdf');
        }

        elseif ($request->has('lr')){
            $pdf=app('dompdf.wrapper');
            $last_restaurations = Restauration::orderBy('created_at', 'desc')->limit(5)->get();
            $pdf->loadView('restaurations.pdf',['last_restaurations'=>$last_restaurations]);
            return $pdf->download($today.'last_restaurations.pdf');
        }

        elseif ($request->has('totr')){
            $pdf=app('dompdf.wrapper');
            $total_repas = Restauration::select(DB::raw('count(rep_id) as repas,site_restau'))->groupBy('site_restau')->get();
            $pdf->loadView('restaurations.pdf',['total_repas'=>$total_repas]);
            return $pdf->download($today.'total_repas.pdf');
        }

        elseif ($request->has('todr')){
            $pdf=app('dompdf.wrapper');
            $today_repas = Restauration::select(DB::raw('DATE(created_at) as date,count(rep_id) as repas,site_restau'))->groupBy('date')->groupBy('site_restau')->having('date', '=', $today)->get();
            $pdf->loadView('restaurations.pdf',['today_repas'=>$today_repas]);
            return $pdf->download($today.'today_repas.pdf');
        }
        return dd('allo');
    }

}
