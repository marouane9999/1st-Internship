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
    public function __construct(ChefMission $chefMission ,Participant $participant)
    {
        $this->participant = $participant;
        $this->chefMission = $chefMission;

    }
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
    public function store(ParticipantRequest $request)

    {
        \DB::beginTransaction();

        try {
            $inputs=$request->all();
            $chefM= $this->chefMission->fill($inputs);
            $chefM->save();
            $inputs['chefM_id']=$chefM->id;
            $particpant=$this->participant->fill($inputs);
            $particpant->save();
            \DB::commit();
            return redirect()->route('participants.index');
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->route('participants.index');
        }


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
