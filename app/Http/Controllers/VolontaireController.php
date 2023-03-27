<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolontaireRequest;
use App\Models\Participant;
use App\Models\Volontaire;
use Illuminate\Http\Request;

class VolontaireController extends Controller
{
    public function __construct(Volontaire $volontaire)
    {
        $this->volontaire = $volontaire;
    }

    public function index()
    {
        $volontaires = Volontaire::all();
        return view('volontaires.index')->with([
            'volontaires' => $volontaires,
        ]);
    }

    public function create()
    {
        $site_heberg = config('custom_arrays.site_heberg');
        $roles = config('custom_arrays.roles');
        $participants = Participant::get();
        return response()->json([
            'success' => true,
            'html' => view('volontaires.form')->with([
                'volontaire' => $this->volontaire,
                'site_aff' => $site_heberg,
                'participants' => $participants,
                'roles' => $roles,
                'title' => 'Ajouter Volontaire',
                'action' => route('volontaires.store'),
            ])->render()
        ]);
    }

    public function store(Request $request)
    {

        $volontaire = new Volontaire();
        $volontaire->participant_id = $request->participant_id;
        $volontaire->role = $request->role;
        $volontaire->site_aff = $request->site_aff;
        $volontaire->debut_contrat = $request->debut_contrat;
        $volontaire->fin_contrat = $request->fin_contrat;
        $volontaire->tel = $request->tel;
        $volontaire->ref_cojar = $request->ref_cojar;
        $volontaire->save();
        return response()->json([
            'success' => true,
            'msg' => 'Volontaire créé avec succès.',
        ]);
    }

    public function edit($id)
    {

        $site_heberg = config('custom_arrays.site_heberg');
        $roles = config('custom_arrays.roles');
        $volontaire = Volontaire::find($id);
        $participants=Participant::all();
        if ($volontaire) {

            return response()->json([
                'success' => true,
                'html'=>view('volontaires.form')->with([
                'volontaire' => $volontaire,
                'participants'=>$participants,
                'roles' => $roles,
                'site_aff' => $site_heberg,
                'action' => route('volontaires.update', $volontaire->id),
                'title'=>'Modifier Volontaire'.$volontaire->id,
            ])->render()



            ]);
        }
    }

    public function update(VolontaireRequest $request, $id)
    {
        $inputs = $request->all();
        $participant = Volontaire::find($id);
        $participant->update($inputs);
        flash()->success('Volontaire est modifié(e) avec succès');
        return response()->json([
            'success' => true,
            'msg' => 'Hébergement updated avec succès.',
        ]);

    }

    public function delete($id)
    {
        $volontaire = Volontaire::find($id);
        if ($volontaire) {
            $volontaire->delete();
            return response()->json([
                'success' => true,
                'msg' => 'Volontaire deleted avec succès.',
            ]);
        }
    }

    public function show($id)
    {
        $volontaire = Volontaire::find($id);
        $site_heberg = config('custom_arrays.site_heberg');
        $countries=config('custom_arrays.countries');
        $volontaire->get();
        return view('volontaires.show',['volontaire'=>$volontaire,'site_aff'=>$site_heberg,'countries'=>$countries]);
    }

}
