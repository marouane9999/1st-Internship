<?php

namespace App\Http\Controllers;

use App\Models\ChefMission;
use App\Models\Hebergement;
use App\Models\Participant;
use App\Models\Restauration;
use App\Models\Vol;
use App\Models\Volontaire;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $count_rest = Restauration::all()->count();
        $count_hbg = Hebergement::all()->count();
        $count_ptc = Participant::all()->count();
        $count_vol = Vol::all()->count();
        $count_chefm = ChefMission::all()->count();
        $count_volontaire = Volontaire::all()->count();
        $participants = Participant::all()->where('created_at', '>=', Carbon::today())->all();
        return view('dashboard.index')->with([
            'count_ptc' => $count_ptc,
            'count_rest' => $count_rest,
            'count_hbg' => $count_hbg,
            'count_vol' => $count_vol,
            'count_chefm' => $count_chefm,
            'count_volontaire' => $count_volontaire,
            'participants' => $participants,
        ]);
    }
}
