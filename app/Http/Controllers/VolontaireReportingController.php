<?php

namespace App\Http\Controllers;

use App\Models\Volontaire;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VolontaireReportingController extends Controller
{
    public function index()
    {
//        return $vol->created_at->format('Y-m-d') . Carbon::today()->format('Y-m-d');
        $today = Carbon::today()->format('Y-m-d');
        $today_volontaires = Volontaire::whereRaw('DATE(created_at) = ?', $today)->orderBy('created_at', 'desc')->get();
        $last_volontaires = Volontaire::orderBy('created_at', 'desc')->limit(5)->get();
        $today_debutcontrat=Volontaire::whereRaw('DATE(debut_contrat) = ?', $today)->orderBy('debut_contrat', 'desc')->get();
        $today_fincontrat=Volontaire::whereRaw('DATE(fin_contrat) = ?', $today)->orderBy('fin_contrat', 'desc')->get();
        $total_volontaires = Volontaire::select(DB::raw('count(id) as volontaires,site_aff'))->groupBy('site_aff')->get();
        return view('volontaires.reporting')->with([
            'today_volontaires' => $today_volontaires,
            'last_volontaires' => $last_volontaires,
            'total_volontaires' => $total_volontaires,
            'today_debutcontrat' => $today_debutcontrat,
            'today_fincontrat' => $today_fincontrat,
        ]);
    }
    public function download(Request $request) {
        $today = Carbon::today()->format('Y-m-d');
        if($request->has('tv')){
            $pdf=app('dompdf.wrapper');
            $today_volontaires = Volontaire::whereRaw('DATE(created_at) = ?', $today)->orderBy('created_at', 'desc')->get();
            $pdf->loadView('volontaires.pdf',['today_volontaires'=>$today_volontaires]);
            return $pdf->download($today.'today_volontaires.pdf');
        }

        elseif ($request->has('lv')){
            $pdf=app('dompdf.wrapper');
            $last_volontaires = Volontaire::orderBy('created_at', 'desc')->limit(5)->get();
            $pdf->loadView('volontaires.pdf',['last_volontaires'=>$last_volontaires]);
            return $pdf->download($today.'last_volontaires.pdf');
        }

        elseif ($request->has('tfc')){
            $pdf=app('dompdf.wrapper');
            $today_fincontrat=Volontaire::whereRaw('DATE(fin_contrat) = ?', $today)->orderBy('fin_contrat', 'desc')->get();
            $pdf->loadView('volontaires.pdf',['today_fincontrat'=>$today_fincontrat]);
            return $pdf->download($today.'today_fincontrat.pdf');
        }

        elseif ($request->has('tdc')){
            $pdf=app('dompdf.wrapper');
            $today_debutcontrat=Volontaire::whereRaw('DATE(debut_contrat) = ?', $today)->orderBy('debut_contrat', 'desc')->get();
            $pdf->loadView('volontaires.pdf',['today_debutcontrat'=>$today_debutcontrat]);
            return $pdf->download($today.'today_debutcontrat.pdf');
        }
        return dd('allo');
    }

}



