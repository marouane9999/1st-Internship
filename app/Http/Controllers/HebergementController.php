<?php

namespace App\Http\Controllers;

use App\Http\Requests\HebergementRequest;
use App\Models\Hebergement;
use App\Models\Participant;
use Illuminate\Http\Request;

class HebergementController extends Controller
{
    public function __construct(Hebergement $hebergement)
    {
        $this->hebergement = $hebergement;
    }

    public function index()
    {
        $heberg = Hebergement::all();
        $site_heberg = config('custom_arrays.site_heberg');
        return view('hebergements.index')->with([
            'hebergement'=>$heberg,
            'site_heberg'=>$site_heberg
        ]);
    }
    public function create()
    {
        $site_heberg = config('custom_arrays.site_heberg');
        return response()->json([
            'success' => true,
            'html' => view('hebergements.form')->with([
                'hebergement' => $this->hebergement,
                'participants'=>Participant::all(),
                'title' => 'Ajouter Hébergement',
                'action' => route('hebergements.store'),
                'site_heberg' => $site_heberg,
            ])->render()
        ]);

    }
    public function store(HebergementRequest $request)
    {

        $hebergement = new Hebergement();
        $hebergement->participant_id = $request->participant_id;
        $hebergement->site_heberg = $request->site_heberg;
        $hebergement->type_cham = $request->type_cham == 'true' ? 1 : 0;
        $hebergement->date_checkin = $request->date_checkin;
        $hebergement->date_checkout = $request->date_checkout;
        $hebergement->save();
        return response()->json([
            'success' => true,
            'msg' => 'Hébergement créé avec succès.',
        ]);
    }
    public function edit($id)
    {
        $hebergement = Hebergement::find($id);

        $site_heberg = config('custom_arrays.site_heberg');
        return response()->json([
            'success' => true,
            'html' => view('hebergements.form')->with([
                'hebergement' => $hebergement,
                'participants'=>Participant::all(),
                'title' => 'Modifier un hébergements',
                'action' => route('hebergements.update', $id),
                'site_heberg' => $site_heberg,
            ])->render()
        ]);
    }
    public function update(HebergementRequest $request,$id)
    {
        {
            $hebergement = Hebergement::find($id);
            $hebergement->participant_id = $request->participant_id;
            $hebergement->site_heberg = $request->site_heberg;
            $hebergement->type_cham = $request->type_cham == 'true' ? 1 : 0;
            $hebergement->date_checkin = $request->date_checkin;
            $hebergement->date_checkout = $request->date_checkout;
            $hebergement->save();
        }
        return response()->json([
            'success' => true,
            'msg' => 'Hébergement updated avec succès.',
        ]);
    }
    public function delete($id)
    {
        $hebergement = Hebergement::find($id);
        if ($hebergement) {
            $hebergement->delete();
            return response()->json([
                'success' => true,
                'msg' => 'Hébergement deleted avec succès.',
            ]);
        }
    }
    public function show($id)
    {
        $hebergement = Hebergement::find($id);
        $hebergement->get();
        $site_heberg = config('custom_arrays.site_heberg');
        $countries = config('custom_arrays.countries');
        return view('hebergements.show',['heberg'=>$hebergement,'site_heberg'=>$site_heberg,'countries'=>$countries]);
    }

}
