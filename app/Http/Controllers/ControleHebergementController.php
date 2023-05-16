<?php

namespace App\Http\Controllers;

use App\Models\Hebergement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControleHebergementController extends Controller
{
    public function index(){
        $hbgpres=Hebergement::where('presence','=',1)->paginate(7);
        $site_heberg = config('custom_arrays.site_heberg');
        $hbgabs=Hebergement::where('presence',0)->paginate(5);
        return view('hebergements.controle')->with([
            'hbgpres'=>$hbgpres,
            'hbgabs'=>$hbgabs,
            'site_heberg'=>$site_heberg
        ]);
    }

    public function edit()
    {
        $hbgabs=Hebergement::where('presence',1)->get();
        $site_heberg = config('custom_arrays.site_heberg');
        return view('hebergements.controle_edit')->with([
            'hbgabs'=>$hbgabs,
            'site_heberg'=>$site_heberg
        ]);
    }



    public function update(Request $request)
    {
        if (count($request->ids_participants)>0){
            for ($i=0; $i < count($request->ids_participants) ; $i++) {
                DB::table('hebergements')
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
