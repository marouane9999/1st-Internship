<?php

namespace App\Http\Controllers;

use App\Models\Vol;
use App\Models\Volontaire;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VolontaireReportingController extends Controller
{
    public function index()
    {

        $today = Carbon::today()->format('Y-m-d');
        $today_volont = Volontaire::whereRaw('DATE(created_at) = ?', $today)->orderBy('created_at', 'desc')->get();
        $last_volont = Volontaire::orderBy('created_at', 'desc')->limit(5)->get();
        return view('volontaires.reporting')->with([
            'today_volont' => $today_volont,
            'last_volont' => $last_volont,

        ]);
    }
}
