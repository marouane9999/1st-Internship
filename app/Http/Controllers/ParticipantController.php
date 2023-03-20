<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantRequest;
use App\Models\Categorie;
use App\Models\ChefMission;
use App\Models\Participant;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ptc=Participant::all();
        return view('participants.index',['participants'=>$ptc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = config('custom_arrays.countries');
        $site_compet = config('custom_arrays.site_compet');
        $discipline=config('custom_arrays.discipline');
        $cat_pr = Categorie::get();
        return view('participants.create')->with([
            'countries'=>$countries,
            'site_compet'=>$site_compet,
            'categories'=>$cat_pr,
            'discipline'=>$discipline
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $chefM=new ChefMission();
        $chefM->nom_chef=$request->nom_chef;
        $chefM->prenom_chef=$request->prenom_chef;
        $chefM->tel=$request->tel;
        $chefM->num_passport=$request->num_passport;
        $chefM->save();
        $particpant=new Participant();
        $particpant->nom_par=$request->nom_par;
        $particpant->prenom_par=$request->prenom_par;
        $particpant->genre=$request->genre=='true' ? 1 : 0 ;
        $particpant->discipline=$request->discipline;
        $particpant->num_pass=$request->num_pass;
        $particpant->num_acc=$request->num_acc;
        $particpant->pays_delg=$request->pays_delg;
        $particpant->cat_id=$request->cat_id;
        $particpant->site_compet=$request->site_compet;
        $particpant->chefM_id=$chefM->id;
        $particpant->save();
        return redirect()->route('participants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }
}
