<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantRequest;
use App\Models\Categorie;
use App\Models\ChefMission;
use App\Models\Participant;
use Barryvdh\DomPDF\PDF;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use function Symfony\Component\Console\Style\success;

class ParticipantController extends Controller
{
    public function __construct(ChefMission $chefMission, Participant $participant)
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
        $ptc = Participant::all();
        $countries = config('custom_arrays.countries');
        return view('participants.index')->with([
            'participants'=>$ptc,
            'countries'=>$countries
        ]);
    }

//    public function search(Request $request)
////    {
////        $ptc = Participant::all()->where('pays_delg',$request->pays_delg);
////        $countries = config('custom_arrays.countries');
////        return view('participants.index')->with([
////            'participants'=>$ptc,
////            'countries'=>$countries
////        ]);
////
////    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = config('custom_arrays.countries');
        $site_compet = config('custom_arrays.site_compet');
        $discipline = config('custom_arrays.discipline');
        $cat_pr = Categorie::get();
        return view('participants.form')->with([
            'participant' => $this->participant,
            'countries' => $countries,
            'site_compet' => $site_compet,
            'categories' => $cat_pr,
            'discipline' => $discipline,
            'action' => route('participants.store'),
        ]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParticipantRequest $request)

    {
        \DB::beginTransaction();

        try {
            $inputs = $request->all();
            $chefM = $this->chefMission->fill($inputs);
            $chefM->save();
            $inputs['chefM_id'] = $chefM->id;
            $particpant = $this->participant->fill($inputs);
            $particpant->save();
            \DB::commit();
            flash()->success('Participant est ajouté(e) avec succès');
            return redirect()->route('participants.index');
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->route('participants.index');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $countries = config('custom_arrays.countries');
        $site_compet = config('custom_arrays.site_compet');
        $discipline = config('custom_arrays.discipline');
        $cat_pr = Categorie::get();


        $participant = Participant::find($id);

        if($participant){
            return view('participants.form')->with([
                'participant' => $participant,
                'countries' => $countries,
                'site_compet' => $site_compet,
                'categories' => $cat_pr,
                'discipline' => $discipline,
                'action' => route('participants.update',$participant->id)
            ]);
        }

        return redirect()->route('participants.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Participant $participant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participant = Participant::find($id);
        $participant->get();
        $countries = config('custom_arrays.countries');
        return view('participants.show',['ptc'=>$participant,'countries'=>$countries]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Participant $participant
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Participant $participant
     * @return \Illuminate\Http\Response
     */
    public function update(ParticipantRequest $request, $id)
    {
        $inputs=$request->all();
//        $ptc=$this->participant->fill($inputs);
//        $chefM=$this->chefMission->fill($inputs);
        $this->participant->find($id)->update($inputs);
        $this->chefMission->update($inputs);
        flash()->warning('Participant est modifié(e) avec succès');
        return redirect()->route('participants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Participant $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant = Participant::find($id);

        if($participant){
            $participant->delete();
            return response()->json([
                'success'=>true,
                'msg'=>'Participant '.$id.' supprimé avec succès'
            ],200);
            redirect()->route('participants.index');
        }
        return response()->json([
            'success' => false,
            'msg' => 'Impossible de retrouver ce Participant.'], 200);
    }

}
