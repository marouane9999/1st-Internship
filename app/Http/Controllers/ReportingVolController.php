<?php

namespace App\Http\Controllers;

use App\Models\Vol;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportingVolController extends Controller
{
    public function index()
    {
        $today_vols = Vol::where('date_vol', '>=', Carbon::today())->get();
        $last_vols = Vol::orderBy('created_at', 'desc')->get();
        return view('vol.reporting')->with([
            'today_vols' => $today_vols,
            'last_vols' => $last_vols
        ]);
    }

}
