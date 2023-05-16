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
        return view('hebergements.reporting')->with([
            'today_hbgs' => $today_hbgs,
            'last_hbgs'=>$last_hbgs,
            'todaycheckin_hbgs'=>$todaycheckin_hbgs,
            'todaycheckout_hbgs'=>$todaycheckout_hbgs,
        ]);
    }

    public function download(Request $request) {
        $today = Carbon::today()->format('Y-m-d');
        if($request->has('th')){
            $pdf=app('dompdf.wrapper');
            $today_hbgs = Hebergement::whereRaw('DATE(created_at) = ?', $today)->orderBy('created_at', 'desc')->get();
            $pdf->loadView('hebergements.pdf',['today_hbgs'=>$today_hbgs]);
            return $pdf->download($today.'todayhbgs.pdf');
        }

        elseif ($request->has('lh')){
            $pdf=app('dompdf.wrapper');
            $last_hbgs = Hebergement::orderBy('created_at', 'desc')->limit(5)->get();
            $pdf->loadView('hebergements.pdf',['last_hbgs'=>$last_hbgs]);
            return $pdf->download($today.'lasthbgs.pdf');
        }

        elseif ($request->has('tih')){
            $pdf=app('dompdf.wrapper');
            $todaycheckin_hbgs = Hebergement::whereRaw('DATE(date_checkin) = ?', $today)->get();
            $pdf->loadView('hebergements.pdf',['todaycheckin_hbgs'=>$todaycheckin_hbgs]);
            return $pdf->download($today.'todaycheckin_hbgs.pdf');
        }

        elseif ($request->has('toh')){
            $pdf=app('dompdf.wrapper');
            $todaycheckout_hbgs = Hebergement::whereRaw('DATE(date_checkout) = ?', $today)->get();
            $pdf->loadView('hebergements.pdf',['todaycheckout_hbgs'=>$todaycheckout_hbgs]);
            return $pdf->download($today.'todaycheckout_hbgs.pdf');
        }
        return dd('allo');
    }
}
