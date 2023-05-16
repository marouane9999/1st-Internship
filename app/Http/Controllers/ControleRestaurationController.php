<?php

namespace App\Http\Controllers;

use App\Models\Restauration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControleRestaurationController extends Controller
{
    public function index(){
        $restv=Restauration::where('statut','=',1)->paginate(7);
        $site_restau = config('custom_arrays.site_restau');
        $restnv=Restauration::where('statut',0)->get();
        return view('restaurations.controle')->with([
            'restv'=>$restv,
            'restnv'=>$restnv,
            'site_restau'=>$site_restau
        ]);
    }
    public function edit()
    {
        $restnv=Restauration::where('statut',0)->get();
        $site_restau = config('custom_arrays.site_restau');
        return view('restaurations.controle_edit')->with([
            'restnv'=>$restnv,
            'site_restau'=>$site_restau
        ]);
    }

    public function update(Request $request)
    {
        if (count($request->ids_participants)>0){
            for ($i=0; $i < count($request->ids_participants) ; $i++) {
                DB::table('restaurations')
                    ->where('id',$request->ids_participants[$i])
                    ->update(['statut'=>1])
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
