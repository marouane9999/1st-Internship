<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolRequest;
use App\Models\Vol;
use Illuminate\Http\Request;

class VolController extends Controller
{
    public function __construct(Vol $vol)
    {
        $this->vol = $vol;
    }

    public function index()

    {
        $vols = Vol::all();

        return view('vol.index')->with([
            'vols' => $vols,
        ]);


    }

    public function create()
    {
        $aeroport = config('custom_arrays.aeroport');
        return response()->json([
            'success' => true,
            'html' => view('vol.form')->with([
                'vol' => $this->vol,
                'title' => 'Ajouter un vol',
                'action' => route('vols.store'),
                'aeroport' => $aeroport,
            ])->render()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(VolRequest $request)
    {

        $vol = new Vol();
        $vol->numero_vol = $request->numero_vol;
        $vol->type_vol = $request->type_vol == 'true' ? 1 : 0;
        $vol->date_vol = $request->date_vol;
        $vol->terminal = $request->terminal;
        $vol->save();
        return response()->json([
            'success' => true,
            'msg' => 'Vol créé avec succès.',
        ]);
    }

    public function edit($id)
    {
        $vol = Vol::find($id);

        $aeroport = config('custom_arrays.aeroport');
        return response()->json([
            'success' => true,
            'html' => view('vol.form')->with([
                'vol' => $vol,
                'title' => 'Modifier un vol',
                'action' => route('vols.update', $id),
                'aeroport' => $aeroport,
            ])->render()
        ]);
    }

    public function update(VolRequest $request, $id)
    {
        {

            $vol = Vol::find($id);
            $vol->numero_vol = $request->numero_vol;
            $vol->type_vol = $request->type_vol == 'true' ? 1 : 0;
            $vol->date_vol = $request->date_vol;
            $vol->terminal = $request->terminal;
            $vol->save();
        }
        return response()->json([
            'success' => true,
            'msg' => 'Vol updated avec succès.',
        ]);

    }

    public function show($id)
    {
        $vol = Vol::find($id);
        $vol->get();
        $aeroports = config('custom_arrays.aeroport');
        $countries = config('custom_arrays.countries');
        return view('vol.show', ['vol' => $vol, 'aeroports' => $aeroports, 'countries' => $countries]);
    }

    public function delete($id)
    {
        $vol = Vol::find($id);
        if ($vol) {
            $vol->participants()->detach();
            $vol->delete();
            return response()->json([
                'success' => true,
                'msg' => 'Vol deleted avec succès.',
            ]);
        }
    }
}



