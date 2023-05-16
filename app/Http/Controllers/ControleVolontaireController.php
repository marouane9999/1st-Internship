<?php

namespace App\Http\Controllers;

use App\Models\Volontaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControleVolontaireController extends Controller
{
    public function index(){
        $vltpr = Volontaire::where('presence','=',1)->paginate(7);
        $vltabs = Volontaire::where('presence','=',0)->get();
        return view('volontaires.controle')->with([
            'voltpr' => $vltpr,
            'voltabs'=>$vltabs
        ]);
    }
    public function edit()
    {
        $vltpr = Volontaire::where('presence','=',1)->get();
        return view('volontaires.controle_edit')->with([
            'voltpr'=>$vltpr,
        ]);
    }

    public function update(Request $request)
    {
        if (count($request->ids_participants)>0){
            for ($i=0; $i < count($request->ids_participants) ; $i++) {
                DB::table('volontaires')
                    ->where('id',$request->ids_participants[$i])
                    ->update(['presence'=>0,'updated_at'=>now()])
                ;
            }
            return response()->json([
                'success' => true,
                'msg' => ' TRUE.'], 200);        }
        else
        {
            return response()->json([
                'success' => false,
                'msg' => 'false'], 200);        }


    }
}
