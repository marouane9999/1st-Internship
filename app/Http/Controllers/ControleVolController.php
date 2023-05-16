<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Vol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Doctrine\Common\Cache\Psr6\get;

class ControleVolController extends Controller
{
    public function index(){
//        $participants=DB::table('participants')->select('*')->whereIn('id',function ($query){
//           $query->select('participant_id')->from('vols_participants');
//        })->whereIn('id',function ($query){
//            $query->select('participant_id')->from('vols_participants');
//        })->get();
        $participantsv=DB::table('participants')->select('participants.*','vols.*','vols_participants.statut','vols_participants.id as pivot_id')
            ->join('vols_participants','vols_participants.participant_id','=','participants.id')
            ->join('vols','vols.id','=','vols_participants.vol_id')
            ->where('vols_participants.statut','=',1)
            ->paginate(5);
        $participantsnv=DB::table('participants')->select('participants.*','vols.*','vols_participants.statut','vols_participants.id as pivot_id')
            ->join('vols_participants','vols_participants.participant_id','=','participants.id')
            ->join('vols','vols.id','=','vols_participants.vol_id')
            ->where('vols_participants.statut','=',0)
            ->get();
        return view('vol.controle')->with([
            'participantsv'=>$participantsv,
            'participantsnv'=>$participantsnv,
        ]);
    }
    public function edit()
    {
        $participantsnv=DB::table('participants')->select('participants.*','vols.*','vols_participants.statut','vols_participants.id as pivot_id')
            ->join('vols_participants','vols_participants.participant_id','=','participants.id')
            ->join('vols','vols.id','=','vols_participants.vol_id')
            ->where('vols_participants.statut','=',0)
            ->paginate(5);
        return view('vol.controle_edit')->with([
            'participantsnv'=>$participantsnv,
        ]);
    }

    public function update(Request $request)
    {
        if (count($request->ids_participants)>0){
        for ($i=0; $i < count($request->ids_participants) ; $i++) {
                DB::table('vols_participants')
                ->where('id',$request->ids_participants[$i])
                ->update(['statut'=>1])
            ;
        }
            return response()->json([
                'success' => true,
                'msg' => count($request->ids_participants).' ont été Validé'], 200);        }
        else
        {
            return response()->json([
                'success' => false,
                'msg' => 'Erreur lors de la validation'], 200);
        }


    }

}
